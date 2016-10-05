<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/29/16
 * Time: 02:09
 */

namespace Felis;


class UsersView extends View {

    public function __construct(Site $site) {
        $this->site = $site;

        $this->setTitle("Felis Users");
        $this->addLink("staff.php", "Staff");
        $this->addLink("./", "Log out");
    }

    public function present() {

        $Users = new Users($this->site);
        $users = $Users->getUsers();

        $html =<<<HTML
<form class="table" method="POST" action="post/users.php">
	<p>
	<input type="submit" name="add" id="add" value="Add">
	<input type="submit" name="edit" id="edit" value="Edit">
	<input type="submit" name="delete" id="delete" value="Delete">
	</p>

	<table>
		<tr>
			<th>&nbsp;</th>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
		</tr>
HTML;
        foreach ($users as $user) {
            $html .= "<tr>";
            $html .= '<td><input type="radio" name="user" value="' . $user["id"] . '"></td>';
            $html .= '<td>' . $user["name"] . '</td>';
            $html .= '<td>' . $user["email"] . '</td>';
            $html .= '<td>' . ($user["role"] == "A" ? "Admin" : ($user["role"] == "S" ? "Staff" : "Client")) . '</td>';
            $html .= "</tr>";
        }
        $html .=<<<HTML
	</table>
</form>
HTML;
        return $html;
    }

    private $site;
}