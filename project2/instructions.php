<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 3/29/16
 * Time: 14:46
 */
$open = true;
require __DIR__ . '/lib/game.inc.php';
$view = new Steampunked\InstructionView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>
<body>

<div class="instructions">
    <?php
    echo $view->header();
    echo $view->present();
    ?>
</div>

</body>
</html>