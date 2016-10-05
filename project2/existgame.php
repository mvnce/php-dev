<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 16:03
 */

require __DIR__ . '/lib/game.inc.php';
$view = new Steampunked\ExistGameView($site, $_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>
<body>

<div class="existgame">
    <?php
    echo $view->header();
    echo $view->present();
    ?>
</div>

</body>
</html>