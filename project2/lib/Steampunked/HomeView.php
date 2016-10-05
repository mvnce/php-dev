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
<form method="post" action="post/home.php">
    <div class="link-button">
        <input class="buttons" type="submit" name="submit" value="Instructions">
        <input class="buttons" type="submit" name="submit" value="Log In">
        <input class="buttons" type="submit" name="submit" value="Play as Guest">
        <input class="buttons" type="submit" name="submit" value="Sign Up">
    </div>
</form>
HTML;
        return $html;
    }

}