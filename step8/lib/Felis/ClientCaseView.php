<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 17:22
 */

namespace Felis;


class ClientCaseView extends View {
    public function __construct(Site $site) {
        $this->site = $site;

        $this->setTitle("Felis Case");
        $this->addLink("staff.php", "Staff");
        $this->addLink("cases.php", "Cases");
        $this->addLink("./", "Log out");

        if(isset($_GET['id'])) {
            $this->caseId = intval(strip_tags($_GET['id']));
        }
    }

    public function present() {

        $cases = new Cases($this->site);
        $clientCase = $cases->get($this->caseId);

        $html = '<form method="post" action="post/clientcase.php"><fieldset><legend>Case</legend>';
        $html .= '<p>Client: ' . $clientCase->getClientName() . '</p>';

        $html .= '<p><label for="number">Case Number: </label>';
        $html .= '<input type="hidden" name="id" value=' . $this->caseId . '>';
        $html .= '<input type="text" id="number" name="number" placeholder="Case Number"';
        $html .= ' value=' .  $clientCase->getNumber() . '></p>';

        $html .= '<p><label for="summary">Summary</label><br>';
        $html .= '<input type="text" id="summary" name="summary" placeholder="Summary"';
        $html .= ' value="' . $clientCase->getSummary() . '"></p>';

        $html .='<p><label for="agent">Agent in Charge: </label>';


        $users = new Users($this->site);
        $agents = $users->getAgents();

        $html .= '<select id="agent" name="agent">';

        foreach ($agents as $agent) {
            $html .= '<option value="' . $agent["id"] . '">' . $agent["name"] . '</option>';
        }

        $html .=<<<HTML
			</select>
		</p>


		<p>
			<label for="status">Status: </label>
HTML;

        $html .=<<<HTML
			<select id="status" name="status">
				<option selected>Open</option>
				<option>Closed</option>
			</select>
		</p>
		<p>
			<input type="submit" value="Update">
		</p>

		<div class="notes">
		<h2>Notes</h2>

		<div class="timelist">
			<div class="report">
				<div class="info">
					<p class="time">2/10/2016 11:35am</p>
					<p class="agent">Martin, Harvey</p>
				</div>
				<p>Initial meeting with client. He's very concerned
					Felix will just not shut up at night. It's not like him to caterwaul so much, so there
					must be something going on in the neighborhood.</p>

			</div>

			<div class="report">
				<div class="info">
					<p class="time">2/14/2016 2:15pm</p>
					<p class="agent">Martin, Harvey</p>
				</div>
				<p>Met with the client to discuss the case.</p>
			</div>
		</div>

		<p>
			<label for="note">Notes</label><br>
			<textarea id="note" name="note" placeholder="Note"></textarea>
		</p>
		<p>
			<input type="submit" value="Add Note">
		</p>
		</div>

		<div class="reports">
			<h2>Reports</h2>

			<div class="timelist">
				<div class="report">
					<div class="info">
						<p class="time"><a href="report.php">2/12/2016 1:35am</a></p>
						<p class="agent">Martin, Harvey</p>
					</div>
					<p>Surveillance of neighborhood for three hours. Nothing untoward spotted.</p>

				</div>
			</div>

			<div class="timelist">
				<div class="report">
					<div class="info">
						<p class="time"><a href="report.php">2/13/2016 2:15am</a></p>
						<p class="agent">Martin, Harvey</p>
					</div>
					<p>Surveillance of neighborhood for two hours. Spotted a very attractive
						Siamese cat wandering though. Caterwauling commenced.</p>

				</div>
			</div>

			<p>
				<input type="submit" value="Add Report">
			</p>
		</div>

	</fieldset>
</form>
HTML;
        return $html;
    }

    private $site;
    private $caseId;
}