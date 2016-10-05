<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 4/2/2016
 * Time: 1:21 AM
 */

namespace Steampunked;


class HomeView extends View {

    public function __construct() {
        $this->setTitle("Welcome to Steampunked Game");
    }

    public function present() {
        $html =<<<HTML
<div class="welcome">Welcome to<br>The Steampunked Game Online</div>

<div class="link-button">
    <a href="instructions.php"><button class="button1">How to Play</button></a>
    <br>
    <a href="login.php"><button class="button2">Sign In</button></a>
    <br>
    <a href="signup.php"><button class="button2">Sign Up</button></a>
    <br>
</div>
HTML;
        return $html;
    }

}