<?php
/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 2/16/2016
 * Time: 2:44 PM
 */
require __DIR__ . '/lib/game.inc.php';

if ($_GET['l'] == 0) {
    $winner = 1;
}
elseif ($_GET['l'] == 1) {
    $winner = 0;
}
if($_GET['c']=='g') {    $condition = 'g'; }
elseif($_GET['c']=='o'){ $condition = 'o'; }
else {
    header('Location: index.php');
    exit;
}
$view = new \Steampunked\SteampunkedView($steampunked);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="project1.css" type="text/css" rel="stylesheet" />
    <title>Game Over!</title>
</head>
<body>
    <p class="index-banner"><img src="images/title.png" width="600" height="104" alt="Steampunked Logo"</p>
    <?php
        echo $view->displayGrid();
        echo $view->displayWin($winner, $condition);
    ?>

</body>
</html>