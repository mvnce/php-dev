<?php
$open = true;
require __DIR__ . '/lib/game.inc.php';
$view = new Steampunked\HomeView($_SESSION, $_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>
<body>

<div class="homepage">
    <?php
    echo $view->header();
    echo $view->present();
    ?>
</div>

</body>
</html>