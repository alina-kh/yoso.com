<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>
  <meta name="keywords" content="<?= $keywords?>"/>
  <meta name="description" content="<?= $description?>"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../templates/css/style.min.css">
</head>
<?=$menu?>
<body>
	<div class="container">
		<h1 class="title"><?= $header?></h1>

    <?php if(!empty($_SESSION['slim.flash']['error'])) :?>
      <?= $flash['error']?>
    <?php endif;?>

    <?php if(!empty($_SESSION['slim.flash']['msg'])) :?>
      <?= $_SESSION['slim.flash']['msg']?>
    <?php endif;?>

    <?=$block?>
    
	</div>
</body>

</html>