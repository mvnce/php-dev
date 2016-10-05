<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 10:35
 */

namespace Felis;


class NewCaseController {
    public function __construct(Site $site, User $user, $post) {
        $this->site = $site;

        $this->user = $user;

        $root = $site->getRoot();
        if(!isset($post['ok'])) {
            $this->redirect = "$root/cases.php";
            return;
        }

        $cases = new Cases($site);
        $id = $cases->insert(strip_tags($post['client']),
            $user->getId(),
            strip_tags($post['number']));

        if($id === null) {
            $this->redirect = "$root/newcase.php?e";
        } else {
            $this->redirect = "$root/case.php?id=$id";
        }
    }

    public function getRedirect() {
        return $this->redirect;
    }

    private $site;
    private $user;
    private $redirect;
}