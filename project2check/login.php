<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 14:46
 */
require 'lib/game.inc.php';
$view = new Steampunked\LoginView($_SESSION, $_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>

<div class="login">
    <?php
    echo $view->header();
    echo $view->present();
    ?>
</div>

</body>
</html>
