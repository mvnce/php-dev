<?php
/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 3/2/2016
 * Time: 10:56 PM
 */
require __DIR__ . '/lib/game.inc.php';
$view = new \Steampunked\SteampunkedView($steampunked);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="project1.css" type="text/css" rel="stylesheet" />
    <title>Instructions</title>
</head>
<body>

<?php echo $view->displayInstruction();?>

</body>
</html>