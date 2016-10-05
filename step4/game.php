<?php
require 'format.inc.php';
require 'lib/game.inc.php';
$view = new Wumpus\WumpusView($wumpus);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stalking the Wumpus</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php echo present_header("Stalking the Wumpus"); ?>

<div id="content">
    <div class="box">
        <img src="images/cave.jpg" width="600" height="325" alt="cave" />
    </div>

    <div id="hear-message">
        <?php echo $view->presentStatus(); ?>
    </div>

    <div class="rooms">
        <?php
        echo $view->presentRoom(0);
        echo $view->presentRoom(1);
        echo $view->presentRoom(2);
        ?>
    </div>

    <p id="arrow-remain" class="text-format"> <?php echo $view->presentArrows(); ?> </p>
</div>

</body>
</html>