<?php
/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 3/2/2016
 * Time: 10:56 PMm
 */
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