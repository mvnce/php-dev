<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 22:42
 */

namespace Felis;


class DeleteCaseView extends View {

    public function __construct(Site $site, $get) {
        $this->site = $site;

        $this->setTitle("Felis Delete?");
        $this->addLink("staff.php", "Staff");
        $this->addLink("cases.php", "Cases");
        $this->addLink("./", "Log out");

        if(isset($_GET['id'])) {
            $this->userid .= intval(strip_tags($_GET['id']));
        }
    }

    public function present() {
        $cases = new Cases($this->site);
        $clientcase = $cases->get($this->userid);
        $number = $clientcase->getNumber();
        $id = $this->userid;

        $html =<<<HTML
<form method="post" action="post/deletecase.php">
	<fieldset>
		<legend>Delete?</legend>
		<p>Are you sure absolutely certain beyond a shadow of
			a doubt that you want to delete case $number</p>

		<p>Speak now or forever hold your peace.</p>

		<p><input type="hidden" name="id" value=$id>
		<input type="submit" name="submit"  value="Yes"> <input type="submit" name="submit" value="No"></p>

	</fieldset>
</form>
HTML;
        return $html;
    }

    private $site;
    private $userid;
}