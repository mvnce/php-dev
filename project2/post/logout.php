<?php
$open = true;		// Can be accessed when not logged in
require '../lib/game.inc.php';


unset($_SESSION['user']);
header("location: " . "../index.php");
exit;