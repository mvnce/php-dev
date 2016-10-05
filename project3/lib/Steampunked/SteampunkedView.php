<?php



namespace Steampunked;

class SteampunkedView {

    private $steampunked;
    private $selectedPipe;
    private $winner;
    private $gaveUp;

    public function __construct(Steampunked $steampunked) {
        $this->steampunked = $steampunked;
        $this->selectedPipe = $this->steampunked->getActivePlayer()->getSelectedPipe();
        $this->winner = $this->steampunked->isWinner();
        $this->gaveUp = $this->steampunked->isGivingUp();
    }

    public function present() {
        $player1 = $this->steampunked->getPlayer1()->getName();
        $player2 = $this->steampunked->getPlayer2()->getName();
        $activePlayerName = $this->steampunked->getActivePlayer()->getName();
        $errorMessage = $this->steampunked->getErrorMessage();

        $html  = '<div id="game">';
        $html .= '<p><img src="assets/title.png" alt="Steam punked logo"></p>';
        $html .= '<p class="large-text">Player 1: '.$player1.'&nbsp;Player 2: '.$player2.'</p>';
        if ($this->winner || $this->gaveUp) {
            $html .= '<p id="alert-info" class="large-text-alert">'.$activePlayerName .' won!</p>';
        } else {
            $html .= '<p id="alert-info" class="large-text-alert">'.$activePlayerName.' it\'s your move.</p>';
        }

        $html .= '<p class="large-text-error">'.$errorMessage.'</p>';

        $activePlayer = $this->steampunked->getActivePlayer();
        $gridSize = $this->steampunked->getGridSize();
        $pipes = $this->steampunked->getPipes();

        $html .= '<div id="game-pipes" class="game"><div class="row">';

        $row = $pipes[0];

        for ($x = 0, $y = 1; $x < ($gridSize + 2); $x++) {
            $pipe = $row[$x];

            if ($pipe !== null) {
                if ($pipe instanceof Leak) {
                    if ($pipe->getPlayer() == $activePlayer) {
                        $html .= '<div class="cell add-pipe"><form method="POST" action="post/steampunked-post.php">';
                        $html .= '<input class="position" type="hidden" name="addPipe" value="'.$pipe->getXandY().'">';
                        $html .= '<input type="hidden" name="pipe" value="'.$this->selectedPipe.'">';
                        $html .= '<input class="highlight" type="image" src="'.$pipe->getUri().'" width="50" height="50" alt="leak button"></form></div>';
                    } else {
                        $html .= '<div class="cell"><img src="'.$pipe->getUri().'" width="50" height="50" alt="leak"></div>';
                    }
                } else {
                    $html .= '<div class="cell"><img src="'.$pipe->getUri().'" width="50" height="50" alt="pipe image"></div>';
                }
            } else {
                $html .= '<div class="cell"></div>';
            }

            if ($x == ($gridSize + 1) && $y <= ($gridSize - 1)) {
                $html .= '</div><div class="row">';
                $row = $pipes[$y];
                $x = -1;
                $y++;
            }
        }

        $html .= '</div></div>';


        $activePlayer = $this->steampunked->getActivePlayer();
        $pipes = $this->steampunked->getActivePlayer()->getPipes();

        if (!$this->gaveUp && !$this->winner) {
            $html .= '<p><form>';

            for ($i = 0; $i < count($pipes); $i++) {
                $html .= '<img src="'.$pipes[$i]->getUri().'" width="50" height="50" alt="pipe option">';
                if ($i == $activePlayer->getSelectedPipe()) {
                    $html .= '<input class="radio-buttons" type="radio" name="select" value="'.$i.'" checked>';
                } else {
                    $html .= '<input class="radio-buttons" type="radio" name="select" value="'.$i.'">';
                }
            }

            $html .= '</p></form><p><form>';
            $html .= '<input id="pipe-id" type="hidden" name="pipe" value="'.$this->selectedPipe.'">';
            $html .= '<input class="control-buttons" type="submit" name="rotate" value="Rotate">';
            $html .= '<input class="control-buttons" type="submit" name="discard" value="Discard">';
            $html .= '<input class="control-buttons" type="submit" name="open" value="Open Valve">';
            $html .= '<input id="give-up" type="submit" name="quit" value="Give Up"></form></p></div>';
        } else {
            $html .= <<<HTML
            <p>
                <form method="POST" action="login-post.php">
                    <input type="submit" name="new" value="New Game">
                </form>
            </p>
        </div>
HTML;
        }
        return $html;
    }
}