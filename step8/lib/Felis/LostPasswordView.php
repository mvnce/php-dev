<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 22:49
 */

namespace Felis;


class LostPasswordView extends View {

    public function __construct(Site $site, $get) {
        $this->site = $site;

        $this->setTitle("Felis Lost Password");
        $this->addLink("login.php", "Log in");
    }

    public function present() {
        $html =<<<HTML
<form method="post" action="post/lostpassword.php">
	<fieldset>
		<legend>Lost password</legend>
		<p>
			<label for="email">Email</label><br>
			<input type="email" id="email" name="email" placeholder="Email">
		</p>
		<p><input type="submit" name="submit" value="submit"></p>
	</fieldset>
</form>
HTML;
        return $html;
    }

    private $site;
}