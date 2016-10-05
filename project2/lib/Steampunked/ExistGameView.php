<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/11/16
 * Time: 21:53
 */

namespace Steampunked;


class ExistGameView extends View {

    public function __construct(Site $site,array &$session) {
        $this->setTitle("Active Games");
        $this->addLink("./", "Log out");

        $this->session = $session;
        $this->site = $site;
    }

    public function present() {
        $name = $this->session['user']->getName();
        $id = intval($this->session['user']->getId());

        $games = new Games($this->site);
        $currentGames = $games->getGames($id);
        $currentOtherGames = $games->getOtherGames();

        $html = <<<HTML
<form method="post" action="post/existgame.php">
    <div class="content">
        <input class="buttons" type="submit" name="submit" value="Create Game">
        <hr>
HTML;
        $html .= 'My Games';
        if ($currentGames) {
            foreach ($currentGames as $currentGame) {
                $html .= '<input class="buttons" type="submit" name="submit" value="Game #' . $currentGame['id'] . '">';
            }
        }
        $html .= '<hr>';
        $html .= 'Other\'s Games';
        if ($currentOtherGames) {
            foreach ($currentOtherGames as $currentOtherGame) {
                $html .= '<input class="buttons" type="submit" name="submit" value="Game #' . $currentOtherGame['id'] . '">';
            }
        }

        $html .= <<<HTML
        <hr>
        <a href="post/logout.php"><button class="buttons">Log Out</button></a>
    </div>
</form>
HTML;
        $html .= '<p id="username">Current User: ' . $name . '</p>';
        return $html;
    }

    private $session;
    private $site;
}