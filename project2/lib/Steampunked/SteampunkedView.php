<?php

/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 2/16/2016
 * Time: 6:35 AM
 */

namespace Steampunked;


class SteampunkedView extends View {
    /**
     * Constructor
     * @param game $steampunked The game object
     */
    public function __construct($site, Steampunked $steampunked) {
        $this->site = $site;
        $this->steampunked = $steampunked;
        $this->setTitle("Game");
    }

    /**
     * @return game|Steampunked
     */
    public function getSteampunked()
    {
        return $this->steampunked;
    }

    public function displayGrid() {
        $html = '<p></p>';
        $html .= '<div class="game">';

        $pipes0 = $this->steampunked->getPlayers()[0]->getPerfectPipes(); //perfectpipes include pipes and steam
        $pipes1 = $this->steampunked->getPlayers()[1]->getPerfectPipes(); //to call to print out in view

        $turn = $this->steampunked->getCurrPlayerId();
        $value = $this->steampunked->getValve();
        $gauge = $this->steampunked->getGauge();

        for ($i = 0; $i < count($pipes0); $i++) {
            $html .='<div class="row">';

            if ( $i == $this->steampunked->getSize()/2-3 ) {
                if ($value and $turn === 0) {
                    $html .= '<div class="cell"><img src="images/valve-open.png" alt="valve open"></div>';
                } else {
                    $html .= '<div class="cell"><img src="images/valve-closed.png" alt="valve closed"></div>';
                }

            } else {
                $html .='<div class="cell"></div>';
            }

            for($j = 0; $j < $this->steampunked->getSize(); $j++) {
                $html .= '<div class="cell">';

                if ($turn == 0 and $pipes0[$i][$j] != null and $pipes0[$i][$j]->getName() === 'leak') {
                    $html .= '<form method="post" action="game-post.php">';
                    $html .= '<input type="hidden" name="place" value="' . $i . ' ' . $j . '">';
                    $html .= '<input class="highlight" type="image" src="images/';
                    $html .= $pipes0[$i][$j]->getName() . '-' . $pipes0[$i][$j]->getDirection();
                    $html .= '.png" width="50" height="50" alt="leak button">';
                    $html .= '</form>';

                }
                elseif ($pipes0[$i][$j] != null) {
                    $html .= '<img src="images/';
                    $html .= $pipes0[$i][$j]->getName() . '-' . $pipes0[$i][$j]->getDirection();
                    $html .= '.png" alt="straight h">';
                }

                $html .= '</div>';
            }

            if ($i == $this->steampunked->getSize()/2-3) {
                if ($turn === 0 and $gauge) {
                    $html .='<div class="cell"><img src="images/gauge-top-190.png" alt="Player 1 top"></div>';
                } else {
                    $html .='<div class="cell"><img src="images/gauge-top-0.png" alt="Player 1 top"></div>';
                }
            }
            elseif ($i == $this->steampunked->getSize()/2-2) {
                if ($turn === 0 and $gauge) {
                    $html .= '<div class="cell"><img src="images/gauge-190.png" alt="Player 1 top"></div>';
                } else {
                    $html .= '<div class="cell"><img src="images/gauge-0.png" alt="Player 1 top"></div>';
                }
            }
            else {
                $html .='<div class="cell"></div>';
            }
            $html .= '</div>';
        }

        for ($i = 0; $i < count($pipes1); $i++) {
            $html .='<div class="row">';

            if ($i === 2) {
                if ($value and $turn === 1) {
                    $html .= '<div class="cell"><img src="images/valve-open.png" alt="valve open"></div>';
                } else {
                    $html .= '<div class="cell"><img src="images/valve-closed.png" alt="valve closed"></div>';
                }
            } else {
                $html .='<div class="cell"></div>';
            }

            for($j = 0; $j < $this->steampunked->getSize(); $j++) {
                $html .= '<div class="cell">';

                if ($turn == 1 and $pipes1[$i][$j] != null and $pipes1[$i][$j]->getName() === 'leak') {
                    $html .= '<form method="post" action="game-post.php">';
                    $html .= '<input type="hidden" name="place" value="' . $i . ' ' . $j . '">';
                    $html .= '<input class="highlight" type="image" src="images/';
                    $html .= $pipes1[$i][$j]->getName() . '-' . $pipes1[$i][$j]->getDirection();
                    $html .= '.png" width="50" height="50" alt="leak button">';
                    $html .= '</form>';

                }
                elseif ($pipes1[$i][$j] != null) {
                    $html .= '<img src="images/';
                    $html .= $pipes1[$i][$j]->getName() . '-' . $pipes1[$i][$j]->getDirection();
                    $html .= '.png" alt="straight h">';
                }

                $html .= '</div>';
            }

            if ($i === 0) {
                if ($turn === 1 and $gauge) {
                    $html .='<div class="cell"><img src="images/gauge-top-190.png" alt="Player 1 top"></div>';
                } else {
                    $html .='<div class="cell"><img src="images/gauge-top-0.png" alt="Player 1 top"></div>';
                }
            }
            elseif ($i == 1) {
                if ($turn === 1 and $gauge) {
                    $html .= '<div class="cell"><img src="images/gauge-190.png" alt="Player 1 top"></div>';
                } else {
                    $html .= '<div class="cell"><img src="images/gauge-0.png" alt="Player 1 top"></div>';
                }
            }
            else {
                $html .='<div class="cell"></div>';
            }
            $html .= '</div>';
        }

        $html .= '</div>';
        return $html;
    }

    //return html for buttons
    //when give up is clicked goes to win page, generates the new game button
    public function displayButtons() {
        $currPlayerId = $this->steampunked->getCurrPlayerId();
        $pipeChoices = $this->steampunked->getPlayers()[$currPlayerId]->getPipeChoices();

        $html = '<p>';
        $html .= '<form method="post" action="game-post.php">';

        for ($i = 0; $i < 5; $i++) {
            $html .= '<img src="images/';
            $html .= $pipeChoices[$i]->getName() . '-' . $pipeChoices[$i]->getDirection();
            $html .= '.png" alt="Piece">';
            $html .= '<input type="radio" name="chosen" value="' . $i . '" id="piece"';
            if($this->steampunked->getChoice() != -1 and $this->steampunked->getChoice() === $i) {
                $html .= ' checked="checked" ';
            }
            $html .= 'onclick="this.form.submit();">';
        }

        $html .= '</form>';
        $html .= '</p>';

        $html .= '<form method="post" action="game-post.php">';
        $html .= '<p><input type="submit" name="rotate" value="Rotate">';
        $html .= '<input type="submit" name="discard" value="Discard">';
        $html .= '<input type="submit" name="open" value="Open Valve">';
        $html .= '<input type="submit" name="giveup" value="Give Up"></p>';
        $html .= '</form>';
        return $html;
    }

    public function displayTurns() {
        $currPlayerId = $this->steampunked->getCurrPlayerId();
        $name = $this->steampunked->getPlayers()[$currPlayerId]->getName();
        $html = '<p id="turns">' . $name . ', it is your turn!</p>';
        return $html;
    }

    public function displayWin($winner, $condition) {
        $html="";
        if($condition=='g'){
            $html = '<p class="win">' . $this->steampunked->getPlayers()[!$winner]->getName() . " has given up!</p>";
        }
        elseif ($condition=='o'){
            $html = '<p class="win">' . $this->steampunked->getPlayers()[$this->steampunked->getCurrPlayerId()]->getName() . " has opened their valve";
            if($winner!=$this->steampunked->getCurrPlayerId()){
                $html .= " but still had a leak!</p>";
            }
            else{
                $html .= " and has no leaks!</p>";
            }
        }
        $html.="<p class='win'>" . $this->steampunked->getPlayers()[$winner]->getName() . " is the winner!</p>";
        $html.='<form method="post" action="game-post.php"><p class="index-submit"><input type="submit" name="reset" value="Start Game"></p>';
        return $html;
    }

    public function displayIndex(){
        $html = <<<HTML
<p class="index-banner"><img src="images/title.png" width="600" height="104" alt="Steampunked Logo"</p>
<form method="post" action="game-post.php">
    <p class="index-text">
        <label for="name1">Player 1's Name:</label>
        <input type="text" name="name1" id="name1"></p>
    <p class="index-text">
        <label for="name2">Player 2's Name:</label>
        <input type="text" name="name2" id="name2"></p>
    <p class="index-select">
        <label for="size">Board Size:</label>
        <select name="size" id="size">
            <option value="6">6 by 6</option>
            <option value="10">10 by 10</option>
            <option value="20">20 by 20</option>
        </select></p>
    <p class="index-submit"><input type="submit" name="newgame" value="Start Game"></p>
</form>
<form action="instructions.php">
    <p class="index-submit"><input type="submit" value="How To Play"></p>
</form>
HTML;
        return $html;
    }

    private $steampunked; //game object
    private $site;
}