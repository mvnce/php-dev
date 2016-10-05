<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/15/16
 * Time: 23:32
 */

namespace Felis;


class StaffView extends View {
    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct() {
        $this->setTitle("Felis Staff");
        $this->addLink("post/logout.php", "Log out");
    }
}