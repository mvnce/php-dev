<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 02:21
 */

namespace Felis;


class UsersController {
    public function __construct(Site $site, User $user, array $post) {
        $root = $site->getRoot();
        $this->redirect = "$root/users.php";


        if (isset($post['add'])) {
            $this->redirect = "$root/user.php";
        }
        else if (isset($post['edit']) and isset($post['user'])) {
            $this->redirect = "$root/user.php?id=" . $post['user'];
        }
        else if (isset($post['delete']) and isset($post['user'])) {
            $this->redirect = "$root/deleteuser.php?id=" . $post['user'];
        }
    }

    /**
     * @return mixed
     */
    public function getRedirect() {
        return $this->redirect;
    }

    private $redirect;	///< Page we will redirect the user to.
}