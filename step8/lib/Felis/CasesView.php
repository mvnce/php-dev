<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/28/16
 * Time: 01:35
 */

namespace Felis;


class CasesView extends View {

    public function __construct(Site $site) {
        $this->site = $site;

        $this->setTitle("Felis New Case");
        $this->addLink("staff.php", "Staff");
    }

    public function present() {
        $html =<<<HTML
<form class="table" method="post" action="post/cases.php">
	<p>
	<input type="submit" name="add" id="add" value="Add">
	<input type="submit" name="delete" id="delete" value="Delete">
	</p>

	<table>
		<tr>
			<th>&nbsp;</th>
			<th>Case Number</th>
			<th>Client</th>
			<th>Agent In Charge</th>
			<th class="desc">Description</th>
			<th>Most Recent Report</th>
			<th>Status</th>
		</tr>
HTML;

        $cases = new Cases($this->site);
        $clientCases = $cases->getCases();

        if (count($clientCases) != null) {
            foreach ($clientCases as $clientCase) {
                $html .= '<tr>';
                $html .= '<td><input type="radio" name="user" value="'. $clientCase->getId(). '"></td>';
                $html .= '<td><a href="case.php?id=' . $clientCase->getId() . '">' . $clientCase->getNumber() . '</a></td>';
                $html .= '<td>' . $clientCase->getClientName() . '</td>';
                $html .= '<td>' . $clientCase->getAgentName() . '</td>';
                $html .= '<td class="desc"><div>' . $clientCase->getSummary() . '</div></td>';
                $html .= '<td></td>';
                $html .= '<td>' .  ( $clientCase->getStatus() == "O" ? "Open" : "Closed") . '</td>';
                $html .= '</tr>';
            }
        }

        $html .=<<<HTML
	</table>
</form>
HTML;
        return $html;
    }

    private $site;
}