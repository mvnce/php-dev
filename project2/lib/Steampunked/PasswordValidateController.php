<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/11/16
 * Time: 19:50
 */

namespace Steampunked;

class PasswordValidateController {

    public function __construct(Site $site, array $post) {
        $root = $site->getRoot();
        $this->redirect = "$root/login.php";

        if(isset($post['submit']) and strip_tags($post['submit']) == "Cancel") {
            return;
        }

        //
        // 1. Ensure the validator is correct! Use it to get the user ID.
        // 2. Destroy the validator record so it can't be used again!
        //
        $validators = new Validators($site);

        $userid = $validators->getOnce($post['validator']);
        if($userid === null) {
            $this->redirect = "$root";
            return;
        }

        $users = new Users($site);
        $editUser = $users->get($userid);
        if($editUser === null) {
            // User does not exist!
            $this->redirect = "$root";
            return;
        }
        $email = trim(strip_tags($post['email']));
        if($email !== $editUser->getEmail()) {
            // Email entered is invalid
            $new_validator= $validators->newValidator($userid);
            $this->redirect = "$root/password-validate.php?e=1&v=$new_validator";
            return;
        }

        $password1 = trim(strip_tags($post['password']));
        $password2 = trim(strip_tags($post['password2']));
        if($password1 !== $password2) {
            // Passwords do not match
            $new_validator = $validators->newValidator($userid);
            $this->redirect = "$root/password-validate.php?e=2&v=$new_validator";
            return;
        }

        if(strlen($password1) < 8) {
            // Password too short
            $new_validator = $validators->newValidator($userid);
            $this->redirect = "$root/password-validate.php?e=3&v=$new_validator";
            return;
        }

        $users->setPassword($userid, $password1);
    }

    /**
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    private $redirect;
}