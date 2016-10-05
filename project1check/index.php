<?php
/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 2/16/2016
 * Time: 2:44 PM
 */
require __DIR__ . '/lib/game.inc.php';
$view = new \Steampunked\SteampunkedView($steampunked);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="project1.css" type="text/css" rel="stylesheet" />
    <title>Start Game</title>
</head>
<body>

<?php echo $view->displayIndex();?>

</body>
</html>