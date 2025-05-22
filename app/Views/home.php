<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
    <h1>Página principal</h1>
    <?php echo $nome; ?>
        <br>
    <?php echo "Número: ".$idade; ?>

    <br>
    <?php foreach($posts as $post): ?>
  <h3>  <?php echo $post['titulo']; ?></h3>
   <h5><?php echo $post['corpo']; ?> </h5> 
    <?php endforeach; ?>


</body>
</html>
