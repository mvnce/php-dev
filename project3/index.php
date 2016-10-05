<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Steampunked</title>
    <link href="steampunked.css" type="text/css" rel="stylesheet" />

</head>
<body id="login">
    <div id="player-login">
        <p><img src="assets/title.png" width="600" height="104" alt="Steam Punked Logo"></p>
        <form method="POST" action="login-post.php">
            <p><input type="text" name="player1" id="player1" placeholder="Player 1 Name"></p>
            <p><input type="text" name="player2" id="player2" placeholder="Player 2 Name"></p>
            <p>
                <label for="six">6 x 6</label>
                <input type="radio" name="gridSize" value="6" id="six" checked="checked">

                <label for="ten">10 x 10</label>
                <input type="radio" name="gridSize" value="10" id="ten">

                <label for="twenty">20 x 20</label>
                <input type="radio" name="gridSize" value="20" id="twenty">
            </p>
            <p><input type="submit" name="start" id="start" value="Start"></p>
        </form>
    </div>
</body>
</html>
