<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 2/6/16
 * Time: 00:07
 */

namespace Wumpus;


class WumpusView {

    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     */
    public function __construct(Wumpus $wumpus) {
        $this->wumpus = $wumpus;
    }

    /** Generate the HTML for the number of arrows remaining */
    public function presentArrows() {
        $a = $this->wumpus->numArrows();
        return "You have $a arrows remaining.";
    }

    public function presentStatus() {
        $roomNum = $this->wumpus->getCurrent()->getNum();
        $out = "";
        $out .= "<p class=\"text-format\">You are in room $roomNum</p>";
        $this->wumpus->hearBirds() ? $out .= "<p class=\"hear text-format\" >You hear birds!</p>" : $out .= "<p class=\"hear text-format\" >&nbsp;</p>";
        $this->wumpus->feelDraft() ? $out .= "<p class=\"hear text-format\" >You feel a draft!</p>" : $out .= "<p class=\"hear text-format\" >&nbsp;</p>";
        $this->wumpus->smellWumpus() ? $out .= "<p class=\"hear text-format\" >You smell a wumpus!</p>" : $out .= "<p class=\"hear text-format\" >&nbsp;</p>";
        $carriedToRoom = $this->wumpus->getCurrent()->getNum();
        $this->wumpus->wasCarried() ? $out .= "<p class=\"hear text-format\" >You were carried by the birds to room $carriedToRoom!</p>" : $out .= "<p class=\"hear text-format\" >&nbsp;</p>";
        return $out;
    }

    /** Present the links for a room
     * @param $ndx An index 0 to 2 for the three rooms */
    public function presentRoom($ndx) {
        $room = $this->wumpus->getCurrent()->getNeighbors()[$ndx];
        $roomnum = $room->getNum();
        $roomndx = $room->getNdx();
        $roomurl = "game-post.php?m=$roomndx";
        $shooturl = "game-post.php?s=$roomndx";

        $html = <<<HTML
<div class="room">
    <img src="images/cave2.jpg" width="180" height="135" alt="cave2" />
    <p><a href="$roomurl">$roomnum</a></p>
    <p><a href="$shooturl">Shoot Arrow</a></p>
</div>
HTML;

        return $html;
    }

    private $wumpus;    // The Wumpus object
}