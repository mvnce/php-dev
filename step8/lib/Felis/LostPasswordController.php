<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 23:04
 */

namespace Felis;


class LostPasswordController {

    public function __construct(Site $site, $post) {
        $this->site = $site;

        $root = $site->getRoot();

        if (isset($post['submit']) and strlen($post['email']) > 0) {

            $users = new Users($site);

            $mailer = new Email();
            $users->resetPassword($post['email'], $mailer);
            $this->redirect = "$root/";
        }
        else {
            $this->redirect = "$root/lostpassword.php";
        }


    }

    /**
     * @return mixed
     */
    public function getRedirect() {
        return $this->redirect;
    }

    private $site;
    private $redirect;
}