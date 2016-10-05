<?php
/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 2/16/2016
 * Time: 2:43 PM
 */
require __DIR__ . '/lib/game.inc.php';
$steampunked = new \Steampunked\Steampunked();
$steampunked->create(6, 'Player1', 'Player2');
$view = new \Steampunked\SteampunkedView($site, $steampunked);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php  echo $view->head() ?>
</head>
<body>
<div class="game">
    <figure><img src="images/title.png" alt="Steampunked Logo"</figure>
    <?php  echo $view->displayGrid()?>
    <?php echo $view->displayTurns()?>
    <?php echo $view->displayButtons()?>
</div>

</body>
</html>

