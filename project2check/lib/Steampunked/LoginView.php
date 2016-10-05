<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 15:47
 */

namespace Steampunked;


class LoginView extends View {

    public function __construct() {
        $this->setTitle("Sign In");
        $this->addLink("signup.php", "Sign Up");
    }

    public function present() {
        $html = <<<HTML
<form method="post" action="post/login.php">
    <fieldset>
        <legend>Login</legend>
        <p>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Email">
        </p>
        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="Password">
        </p>
        <p>
            <input class="button2" type="submit" value="Log in">
        </p>
    </fieldset>
</form>
HTML;
        return $html;
    }

}