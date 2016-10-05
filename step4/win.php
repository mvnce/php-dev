<?php
require 'format.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>You Killed the Wumpus</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php echo present_header("Stalking the Wumpus"); ?>

<div id="content">
    <div>
        <div class="box">
            <img src="images/dead-wumpus.jpg" width="600" height="325" alt="cave" />
        </div>
        <p class="text-format">You Killed the Wumpus</p>
    </div>

    <div id="bottom-links">
        <p class="welcome-link text-format"><a href="welcome.php">New Game</a></p>
    </div>
</div>

</body>
</html>