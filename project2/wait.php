<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/13/16
 * Time: 22:53
 */

require __DIR__ . '/lib/game.inc.php';
$view = new Steampunked\WaitView();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
    <script>
        /**
         * Initialize monitoring for a server push command.
         * @param key Key we will receive.
         */
        function pushInit(key) {
            var conn = new WebSocket('ws://webdev.cse.msu.edu:8079');
            conn.onopen = function (e) {
                console.log("Connection to push established!");
                conn.send(key);
            };

            conn.onmessage = function (e) {
                try {
                    var root = "/~masiyan/project2";

                    var msg = JSON.parse(e.data);
                    if (msg.cmd === "reload") {
                        location.reload();
                    }

                    if (msg.cmd === "joined") {
                        location.replace(root + "/steampunked.php");
                    }
                } catch (e) {
                }
            };
        }

        var gameid = <?php echo $_SESSION['gameId']; ?>;
//        var userid = "12";
        pushInit('happysteampunkedgame' + gameid);
    </script>
</head>
<body>

<div class="wait">
    <?php
    echo $view->header();
    echo $view->present();
    ?>
</div>

</body>
</html>
