<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/13/16
 * Time: 19:28
 */

namespace Steampunked;

class HomeController {
    public function __construct(Site $site, array &$session, array $post) {
        $this->site = $site;
        $root = $site->getRoot();
        $this->redirect = "$root/";

        if (isset($post['submit'])) {

            if (strip_tags($post['submit']) == 'Instructions') {
                $this->redirect = "$root/instructions.php";
            }
            elseif (strip_tags($post['submit']) == 'Log In') {
                $this->redirect = "$root/login.php";
            }
            elseif (strip_tags($post['submit']) == 'Play as Guest') {

                $users = new Users($site);
                $guest = $users->createGuest();

                $session[User::SESSION_NAME] = $guest;
                $this->redirect = "$root/existgame.php";
            }
            elseif (strip_tags($post['submit']) == 'Sign Up') {
                $this->redirect = "$root/signup.php";
            }
        }
    }

    public function getRedirect() {
        return $this->redirect;
    }

    private $site;
    private $redirect;
}