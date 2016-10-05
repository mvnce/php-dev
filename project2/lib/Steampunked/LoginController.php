<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/11/16
 * Time: 17:10
 */

namespace Steampunked;

class LoginController {

    public function __construct(Site $site, array &$session, array $post) {
        $root = $site->getRoot();

        $email = strip_tags($post['email']);
        $password = strip_tags($post['password']);

        $users = new Users($site);
        $user = $users->login($email, $password);

        if($user === null) {
            $this->redirect = "$root/login.php?e";
        } else {
            $session[User::SESSION_NAME] = $user;
            $this->redirect = "$root/existgame.php";
        }
    }

    public function getRedirect() {
        return $this->redirect;
    }

    private $redirect;
}