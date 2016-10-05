<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 4/14/16
 * Time: 01:59
 */

namespace Steampunked;


class WaitView extends View {

    public function __construct() {
        $this->setTitle("Waiting for other player...");
    }

    public function present() {
        $html =<<<HTML
<p class="text-mid">Waiting for other player...</p>
<form action="post/wait.php" method="post">
    <input class="buttons" type="submit" name="submit" value="Cancel">
</form>
HTML;
        return $html;
    }
}