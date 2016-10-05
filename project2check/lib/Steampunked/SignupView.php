<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 4/2/16
 * Time: 04:03
 */

namespace Steampunked;


class SignupView extends View {

    public function __construct() {
        $this->setTitle("Sign Up");
        $this->addLink("login.php", "Log In");
    }

    public function present() {
        $html = <<<HTML
<form method="post" action="post/signup.php">
    <fieldset>
        <legend>Sign Up</legend>
        <p>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Email">
        </p>
        <p>
            <input class="button2" type="submit" name="submit" value="Sign Up">
        </p>

    </fieldset>
</form>
HTML;
        return $html;
    }

}