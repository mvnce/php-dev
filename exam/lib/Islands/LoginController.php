<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/26/16
 * Time: 10:39
 */

namespace Islands;


class LoginController {
    public function __construct(Islands $islands, $post) {
        $this->islands = $islands;

        //trim($str)

        if (isset($post['name']) && strlen(trim(strip_tags($post['name']))) !== 0) {
            $this->islands->setName($post['name']);

            if (isset($post['game'])) {
                intval(strip_tags($post['game'])) == 1?
                    $this->islands->setId(1) : $this->islands->setId(2);
                $this->islands->create();
            }

            $this->redirect = "/~masiyan/exam/islands.php";
        }
        else {
            $this->redirect = "/~masiyan/exam/index.php";
        }
    }

    public function getRedirect() {
        return $this->redirect;
    }

    private $islands = null;
    private $redirect;
}