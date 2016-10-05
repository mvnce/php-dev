<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 4/2/16
 * Time: 03:16
 */

namespace Steampunked;


class InstructionView extends View {

    public function __construct() {
        $this->setTitle("Instructions");
    }

    public function present() {
        $html = <<<HTML
<div class="content">
    <div class="title">Instructions</div>

    <div class="text-content">
        <p>The objective of this game is to place pipes that will connect a steam source to a steam engine so it can power up your airship.</p>
        <p>You are competing against an opponent to see who can successfully connect the pipes without any leaks to the end. Starting the game, players' enter their names and choose from 3 options of game sizes
             (6x6, 10x10, and 20x20), then click "Start Game".</p>
        <p>The first player will then be able choose any of the pipes below the playing field by clicking the radio button next to the pipe.
             From those pieces he may choose to place the piece on the board, rotate, or discard.</p>
        <p>Pipe pieces can only be placed where steam is showing. To allow better placement of pipes players' can use the rotate option.</p>
        <p>The rotate option will rotate the pipe 90 degrees for better position placing.
             If the rotate does not help you with any of your current pipe pieces you may choose the discard option.</p>
        <p>The discard option will remove (discard) the current chosen pipe. Once you discard a pipe that ends your turn.
        When it is your turn again you will no longer have that pipe piece to use instead a new pipe will be given to you.</p>
        <p>Note: Discarding a pipe does not guarantee that the new pipe will not be the same type of pipe that you just discarded.</p>
        <p>If a player has connected his/her steam source to the engine, he/she may choose the option "Open Valve" to see if he/she is the winner.</p>
        <p>If you no longer want to player there is the give up option, in which the player who clicks it will automatically lose and the other player wins.</p>
            <p>That's all you need to know! Now go on, click the button below to start playing Steampunked!</p>
    </div>
</div>
HTML;
        $html .=<<<HTML
<div class="link-button">
    <a href="index.php"><button class="buttons">Back</button></a>
    <br>
</div>
HTML;
        return $html;
    }

}