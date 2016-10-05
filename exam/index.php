<?php
require __DIR__ . '/lib/islands.inc.php';
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Islands Signin</title>
    <script type="text/javascript" src="jquery-2.2.3.min.js"></script>
    <link href="islands.css" type="text/css" rel="stylesheet" />

</head>
<body>
<form id="signin" action="post/login.php" method="POST">
    <fieldset>
        <p><img src="images/banner.png" width="521" height="346" alt="Islands Banner"></p>
        <p>Welcome to Islands</p>
        <p><label for="name">Your Name: </label>
        <input type="text" name="name" id="name"></p>
        <p><input type="radio" name="game" id="game1" value="1" checked> 
        	<label for="game1">Game 1</label><br>
        <input type="radio" name="game" id="game2" value="2"> 
        	<lable for="game2">Game 2</lable></p>
        <p><input type="submit" value="Start Game"></p>
    </fieldset>
</form>
</body>
</html>