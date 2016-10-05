<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 4/11/16
 * Time: 17:47
 */

namespace Steampunked;


class SignupController {
    public function __construct(Site $site, array $post) {
        $root = $site->getRoot();
        $this->redirect = "$root/login.php";

        $email = strip_tags($post['email']);
        $name = strip_tags($post['name']);
        $id = null;
        $joined = null;

        $row = array(
            'name' => $name,
            'email' => $email,
            'id' => $id,
            'joined' => $joined,
        );
        $newUser = new User($row);

        $users = new Users($site);
        $mailer = new Email();
        $users->add($newUser, $mailer);
    }


    /**
     * @return mixed
     */
    public function getRedirect() {
        return $this->redirect;
    }

    private $redirect;	///< Page we will redirect the user to.
}
