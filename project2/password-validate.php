<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/11/16
 * Time: 18:09
 */

$open = true;
require 'lib/game.inc.php';
$view = new Steampunked\PasswordValidateView($site, $_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="validate">

    <?php
    echo $view->header();
    ?>

    <?php
    echo $view->present();
    ?>

</div>

</body>
</html>