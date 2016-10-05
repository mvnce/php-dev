<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/12/16
 * Time: 16:31
 */

namespace Steampunked;


class ExistGameController
{
    public function __construct(Site $site, array &$session, array $post) {
        $root = $site->getRoot();
        $this->redirect = "$root/";

        if (isset($post['submit'])) {
            if (strip_tags($post['submit']) == 'Create Game') {
                $this->redirect = "$root/wait.php";

                $id = intval($session['user']->getId());
                $games = new Games($site);
                $gameId = $games->add($id);

                $session['gameId'] = $gameId;
            }
            else {
                $game_str = strip_tags($post['submit']);
                $gameId = intval(explode("#",$game_str)[1]);

                /*
                 * PHP code to cause a push on a remote client.
                 */

                $key = 'happysteampunkedgame' . $gameId;
                $msg = json_encode(array('key'=>$key, 'cmd'=>'joined'));

                $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

                $sock_data = socket_connect($socket, '127.0.0.1', 8078);
                if(!$sock_data) {
                    echo "Failed to connect";
                    $this->redirect = "$root/error.php";
                } else {
                    socket_write($socket, $msg, strlen($msg));
                    $this->redirect = "$root/steampunked.php";
                }
                socket_close($socket);
            }
        }
    }

    public function getRedirect() {
        return $this->redirect;
    }

    private $redirect;	///< Page we will redirect the user to.
}