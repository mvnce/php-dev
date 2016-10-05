<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/26/16
 * Time: 23:04
 */

namespace Islands;


class IslandsController {

    public function __construct(Islands $islands, array &$session, $post) {
        $this->islands = $islands;
        $islands->setMessage(null);
        $islands->setCheck(false);

        if (isset($post['newgame'])) {
            $this->redirect = "/~masiyan/exam/";
            unset($session['ISLANDS_SESSION']);
        }
        elseif (isset($post['check'])) {
            $this->redirect = "/~masiyan/exam/islands.php";
            $this->islands->setCheck(true);
        }
        elseif (isset($post['giveup'])) {
            $this->redirect = "/~masiyan/exam/islands.php";
            $this->islands->giveUp();
        }
        elseif (isset($post['island'])) {
            $this->redirect = "/~masiyan/exam/islands.php";
            $parts = explode(',', strip_tags($post['island']));
            $this->islands->select(intval($parts[0]), intval($parts[1]));
        }
    }

    public function getRedirect() {
        return $this->redirect;
    }

    private $islands = null;
    private $redirect;
}