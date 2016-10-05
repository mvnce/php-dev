<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 23:15
 */

namespace Felis;


class DeleteUserController {

    public function __construct(Site $site, $post) {
        $this->site = $site;
        $root = $site->getRoot();

        $Users = new Users($site);

        if (isset($post['submit']) and strip_tags($post['submit']) == "Yes") {
            $id = strip_tags($post['id']);
            $Users->delete($id);
        }
        $this->redirect = "$root/users.php";
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