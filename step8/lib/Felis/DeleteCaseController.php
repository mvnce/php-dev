<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 23:15
 */

namespace Felis;


class DeleteCaseController {

    public function __construct(Site $site, $post) {
        $this->site = $site;
        $root = $site->getRoot();

        $cases = new Cases($site);

        if (isset($post['submit'])) {
            $id = strip_tags($post['id']);
            $cases->delete($id);
        }
        $this->redirect = "$root/cases.php";
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