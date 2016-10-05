<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 02:07
 */

namespace Felis;


class CaseController {
    public function __construct(Site $site, $get) {
        $this->site = $site;
        $root = $site->getRoot();

        if (isset($get['id'])) {
            echo $get['id'];
        }
    }

    public function getRedirect() {
        return $this->redirect;
    }

    private $site;
    private $redirect;
}