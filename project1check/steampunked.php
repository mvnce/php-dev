<?php
/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 2/16/2016
 * Time: 2:43 PM
 */
require __DIR__ . '/lib/game.inc.php';
$view = new \Steampunked\SteampunkedView($steampunked);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="project1.css" type="text/css" rel="stylesheet" />
    <title>Game</title>
</head>
<body>

    <figure><img src="images/title.png" alt="Steampunked Logo"</figure>
    <?php  echo $view->displayGridS()?>

    <?php echo $view->displayTurns()?>

    <?php echo $view->displayButtons()?>

</body>
</html>

