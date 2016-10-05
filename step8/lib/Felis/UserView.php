<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 02:09
 */

namespace Felis;


class UserView extends View {

    public function __construct(Site $site, $get) {
        $this->site = $site;

        $this->setTitle("Felis User");
        $this->addLink("staff.php", "Staff");
        $this->addLink("./", "Log out");

        $this->data = array(
        'email' => null,
        'name' => null,
        'phone' => null,
        'address' => null,
        'notes' => null);

        $this->userid = null;

        if (isset($get['id'])) {
            $Users = new Users($this->site);

            $user = $Users->get(intval($get['id']));

            $this->userid = $get['id'];

            $this->data['email'] = $user->getEmail();
            $this->data['name'] = $user->getName();
            $this->data['phone'] = $user->getPhone();
            $this->data['address'] = $user->getAddress();
            $this->data['notes'] = $user->getNotes();
        }
    }

    public function present() {
        $html = <<<HTML
<form method="POST" action="post/user.php">
HTML;
        if ($this->userid != null) {
            $html .= '<input type="hidden" name="id" value='. $this->userid  . '>';
        }
        $html .=<<<HTML

	<fieldset>
		<legend>User</legend>
		<p>
			<label for="email">Email</label><br>
			<input type="email" id="email" name="email" placeholder="Email"
HTML;

        if ($this->data['email'] != null) {
            $html .= ' value="' . $this->data['email'] . '"';
        }

        $html .= <<<HTML
>
		</p>
		<p>
			<label for="name">Name</label><br>
			<input type="text" id="name" name="name" placeholder="Name"
HTML;

        if ($this->data['name'] != null) {
            $html .= ' value="' . $this->data['name'] . '"';
        }

        $html .= <<<HTML
>
		</p>
		<p>
			<label for="phone">Phone</label><br>
			<input type="text" id="phone" name="phone" placeholder="Phone"
HTML;

        if ($this->data['phone'] != null) {
            $html .= ' value="' . $this->data['phone'] . '"';
        }

        $html .= <<<HTML
>
		</p>
		<p>
			<label for="address">Address</label><br>
			<textarea id="address" name="address" placeholder="Address">
HTML;

        if ($this->data['address'] != null) {
            $html .= $this->data['address'];
        }

        $html .= <<<HTML
</textarea>
		</p>
		<p>
			<label for="notes">Notes</label><br>
			<textarea id="notes" name="notes" placeholder="Notes">
HTML;

        if ($this->data['notes'] != null) {
            $html .= $this->data['notes'];
        }

        $html .= <<<HTML
</textarea>
		</p>
		<p>
			<label for="role">Role: </label>
			<select id="role" name="role">
				<option value="admin">Admin</option>
				<option value="staff">Staff</option>
				<option value="client">Client</option>
			</select>
		</p>
		<p>
			<input type="submit" name="OK" value="OK"> <input type="submit" name="Cancel" value="Cancel">
		</p>

	</fieldset>
</form>

	<p>
		Admin users have complete management of the system. Staff users are able to view and make
		reports for any client, but cannot edit the users. Clients can only view the cases
		they have contracted for.
	</p>
HTML;

        return $html;
    }

    private $site;
    private $data;
    private $userid;
}