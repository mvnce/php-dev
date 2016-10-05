<?php
require 'format.inc.php';
require 'wumpus.inc.php';
$room = 1;    // The room we are in.
$birds = 7;  // Room with the birds
$pits = array(3, 10, 13);    // Rooms with a bottomless pit
$wumpus = 16; // Room with the Wumpus
$arrow = 3;

$cave = cave_array(); // Get the cave
if(isset($_GET['r']) && isset($cave[$_GET['r']])) {
    // We have been passed a room number
    if ($_GET['r'] == 7) {
        $room = 10;
    }
    else {
        $room = $_GET['r'];
    }
}

if(isset($_GET['a']) && isset($cave[$_GET['a']])) {
    if ($_GET['a'] == 16 && in_array($room, $cave[$wumpus])) {
        header("Location: win.php");
        exit;
    }
}

if (in_array($room, $pits) || $room == 16) {
    header("Location: lose.php");
    exit;
}
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
    <div>
        <div class="box">
            <img src="images/cave.jpg" width="600" height="325" alt="cave" />
        </div>
        <div id="pic-message">
            <?php
            echo "<p class=\"text-format\">" . date("g:ia l, F j, Y") . '</p>';
            ?>
            <p class="text-format">You are in room <?php echo $room; ?></p>
        </div>
    </div>

    <div id="hear-message">
        <?php
        if (in_array($room, $cave[$birds])) {
            echo "<p class=\"hear text-format\" >You hear birds!</p>";
        }
        else {
            echo "<p class=\"hear text-format\" >&nbsp;</p>";
        }
        if ((in_array($room, $cave[3]) || in_array($room, $cave[10]) || in_array($room, $cave[13]))
            && in_array($room, $pits)) {
            echo "<p class=\"hear text-format\" >You feel a draft!</p>";
        }
        else {
            echo "<p class=\"hear text-format\" >&nbsp;</p>";
        }
        $wumpus_flag = false;
        foreach ($cave[$wumpus] as $item) {
            if (in_array($room, $cave[$item])) {
                $wumpus_flag = true;
            }
        }
        if (in_array($room, $cave[$wumpus])) {
            $wumpus_flag = true;
        }
        if ($wumpus_flag) {
            echo "<p class=\"hear text-format\" >You smell a wumpus!</p>";
        }
        else {
            echo "<p class=\"hear text-format\" >&nbsp;</p>";
        }
        ?>
    </div>

    <div class="rooms">
        <div class="room">
            <img src="images/cave2.jpg" width="180" height="135" alt="cave2" />
            <p><a href="game.php?r=<?php echo $cave[$room][0]; ?>">
                    <?php echo $cave[$room][0]; ?></a></p>

            <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][0]; ?>">Shoot Arrow</a></p>
        </div>
        <div class="room">
            <img src="images/cave2.jpg" width="180" height="135" alt="cave2" />
            <p><a href="game.php?r=<?php echo $cave[$room][1]; ?>">
                    <?php echo $cave[$room][1]; ?></a></p>
            <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][1]; ?>">Shoot Arrow</a></p>
        </div>
        <div class="room">
            <img src="images/cave2.jpg" width="180" height="135" alt="cave2" />
            <p><a href="game.php?r=<?php echo $cave[$room][2]; ?>">
                    <?php echo $cave[$room][2]; ?></a></p>
            <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][2]; ?>">Shoot Arrow</a></p>
        </div>
    </div>
    <p id="arrow-remain" class="text-format">You have <?php echo $arrow; ?> arrows remaining.</p>
</div>

</body>
</html>