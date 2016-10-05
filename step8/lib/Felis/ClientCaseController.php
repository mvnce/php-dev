<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 21:06
 */

namespace Felis;


class ClientCaseController {

    public function __construct(Site $site, $post) {
        $this->site = $site;
        $root = $site->getRoot();

        $cases = new Cases($site);

        $id = strip_tags($post['id']);

        $number = strip_tags($post['number']);
        $summary = strip_tags($post['summary']);
        $agent = strip_tags($post['agent']);
        $status = strip_tags($post['status']);

        $cases->update($number, $summary, $agent, $status, $id);
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