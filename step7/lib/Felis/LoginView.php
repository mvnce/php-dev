<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/20/16
 * Time: 22:34
 */

namespace Felis;


class LoginView extends View {
    public function __construct($session, $get) {
        if(isset($_GET['e'])) {
            $this->message .= '<p class="error-message">You entered an invalid ID and password.</p>';
        }
    }

    public function get_message() {
        return $this->message;
    }

    private $message = "";
}