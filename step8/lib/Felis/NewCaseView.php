<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 02:40
 */

namespace Felis;


class NewCaseView extends View {

    public function __construct(Site $site) {
        $this->site = $site;

        $this->setTitle("Felis New Cases");
        $this->addLink("staff.php", "Staff");
        $this->addLink("cases.php", "Cases");
        $this->addLink("./", "Log out");
    }

    public function present() {
        $html = <<<HTML
<form method="post" action="post/newcase.php">
	<fieldset>
		<legend>New Case</legend>
		<p>Client:
			<select name="client" >
HTML;
        $users = new Users($this->site);
        $clients = $users->getClients();

        if ($clients != null) {
            foreach($clients as $client) {
                $id = $client['id'];
                $name = $client['name'];
                $html .= '<option  value="' . $id . '">' . $name . '</option>';
            }
        }
		$html .= <<<HTML
			</select>
		</p>

		<p>
			<label for="number">Case Number: </label>
			<input type="text" id="number" name="number" placeholder="Case Number">
		</p>

		<p><input type="submit" name="ok" value="OK"> <input type="submit" value="Cancel"></p>

	</fieldset>
</form>
HTML;

        return $html;
    }

    private $site;	///< The Site object
}
