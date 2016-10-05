<?php
/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 2/16/2016
 * Time: 2:44 PM
 */
require __DIR__ . '/lib/game.inc.php';
$view = new Steampunked\HomeView();
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