<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 02:07
 */

namespace Felis;


class CasesController {
    public function __construct(Site $site, $post) {
        $this->site = $site;
        $root = $site->getRoot();

        if (isset($post['add'])) {
            $this->redirect = "$root/newcase.php";
        }
        else if (isset($post['user']) and isset($post['delete'])) {
            $userid = strip_tags($post['user']);
            $this->redirect = "$root/deletecase.php?id=" . $userid;
        }
        else {
            $this->redirect = "$root/cases.php";
        }
    }

    public function getRedirect() {
        return $this->redirect;
    }

    private $site;
    private $redirect;
}