<?php
require 'format.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Stalking the Wumpus</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php echo present_header("Stalking the Wumpus"); ?>

<div id="content">
    <div>
        <div class="box">
            <img src="images/cave-wumpus.jpg" width="600" height="325" alt="cave" />
        </div>
        <p class="text-format" id="welcome">Welcome to <span id="italic">Stalking the Wumpus</span></p>
    </div>

    <div id="bottom-links">
        <p class="welcome-link text-format"><a href="instructions.php">Instruction</a></p>
        <p class="welcome-link text-format"><a href="game-post.php?n">Start Game</a></p>
    </div>
</div>
</body>
</html>