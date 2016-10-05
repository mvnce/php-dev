<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 4/14/16
 * Time: 03:08
 */

namespace Steampunked;


class WaitController {
    public function __construct(Site $site, array &$session, array $post) {
        $root = $site->getRoot();
        $this->redirect = "$root/";

        if (isset($post['submit'])) {
            if (strip_tags($post['submit']) == 'Cancel') {
                $games = new Games($site);
                $gameId = intval($session['gameId']);
                $games->remove($gameId);
                unset($session['gameId']);
                $this->redirect = "$root/existgame.php";
            }
        }
    }

    public function getRedirect() {
        return $this->redirect;
    }

    private $redirect;	///< Page we will redirect the user to.
}