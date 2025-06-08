<?php

namespace app\Models;

use PDO;

class Model
{
    protected static $db;
    protected static $query;
    protected static $params = [];
    protected static $table;

    protected static function getDB()
    {
        if (!self::$db) {
            $config = require __DIR__ . "/../../config/database.php";
            self::$db = new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
                $config['user'],
                $config['password']
            );
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }

    protected static function getTable()
    {
        if (isset(static::$table)) {
            return static::$table;
        }
        return strtolower((new \ReflectionClass(get_called_class()))->getShortName());
    }

    public static function select($columns = '*')
    {
        $table = static::getTable();
        self::$query = "SELECT $columns FROM `$table`";
        self::$params = [];
        return new static;
    }

    public function where($column, $value)
    {
        self::$query .= " WHERE `$column` = ?";
        self::$params[] = $value;
        return $this;
    }

    public function andWhere($column, $value)
    {
        self::$query .= " AND `$column` = ?";
        self::$params[] = $value;
        return $this;
    }

    public function orWhere($column, $value)
    {
        self::$query .= " OR `$column` = ?";
        self::$params[] = $value;
        return $this;
    }

    public function execute()
    {
        $db = static::getDB();
        
        try {
            $stmt = $db->prepare(self::$query);
            $stmt->execute(self::$params);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            self::$query = '';
            self::$params = [];

            return $result;
        } catch (\Exception $e) {
            echo "Erro SQL: " . $e->getMessage();
            self::$query = '';
            self::$params = [];
            return [];
        }
    }

    public static function insert($data)
    {
        $db = static::getDB();
        $table = static::getTable();
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $values = array_values($data);

        $sql = "INSERT INTO `$table` ($columns) VALUES ($placeholders)";
        
        try {
            $stmt = $db->prepare($sql);
            return $stmt->execute($values);
        } catch (\Exception $e) {
            echo "Erro SQL: " . $e->getMessage();
            return false;
        }
    }

    public static function update($data, $whereColumn, $whereValue)
    {
        $db = static::getDB();
        $table = static::getTable();
        $set = implode(", ", array_map(fn($col) => "`$col` = ?", array_keys($data)));
        $values = array_values($data);
        $values[] = $whereValue;

        $sql = "UPDATE `$table` SET $set WHERE `$whereColumn` = ?";
        
        try {
            $stmt = $db->prepare($sql);
            return $stmt->execute($values);
        } catch (\Exception $e) {
            echo "Erro SQL: " . $e->getMessage();
            return false;
        }
    }

    public static function delete($whereColumn, $whereValue)
    {
        $db = static::getDB();
        $table = static::getTable();
        $sql = "DELETE FROM `$table` WHERE `$whereColumn` = ?";
        
        try {
            $stmt = $db->prepare($sql);
            return $stmt->execute([$whereValue]);
        } catch (\Exception $e) {
            echo "Erro SQL: " . $e->getMessage();
            return false;
        }
    }

    public static function all()
    {
        $db = static::getDB();
        $table = static::getTable();
        $sql = "SELECT * FROM `$table`";
        
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Erro SQL: " . $e->getMessage();
            return [];
        }
    }
    
    public static function find( $name_column, $id_value){
        $db = static::getDB();
        $table = static::getTable();
        $sql = "SELECT *  FROM `$table` WHERE `$name_column` = $id_value";
        
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Erro SQL: " . $e->getMessage();
            return [];
        }
    }
}