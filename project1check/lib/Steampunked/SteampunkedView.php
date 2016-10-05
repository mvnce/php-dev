<?php

/**
 * Created by PhpStorm.
 * User: Amy
 * Date: 2/16/2016
 * Time: 6:35 AM
 */

namespace Steampunked;


class SteampunkedView {
    private $steampunked; //game object

    /**
     * Constructor
     * @param game $steampunked The game object
     */
    public function __construct(Steampunked $steampunked) {
        $this->steampunked = $steampunked;
    }

    //displays 8x8 but a 6x6 playable grid
    public function displayGridS() {
        $html = '<form method="post" action="">';
            $html .= '<div class="game">';
                $html .='<div class="row">';
                    $html .='<div class="cell"><img src="images/valve-closed.png" alt="valve closed"></div>';
                    $html .='<div class="cell"><img src="images/straight-h.png" alt="straight h"></div>';
                    $html .='<div class="cell"><img src="images/ninety-sw.png" alt="ninety sw"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"><img src="images/gauge-top-0.png" alt="Player 1 top"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"><img src="images/ninety-ne.png" alt="ninety ne"></div>';
                    $html .='<div class="cell"><img src="images/straight-h.png" alt="straight h"></div>';
                    $html .='<div class="cell"><img src="images/straight-h.png" alt="straight h"></div>';
                    $html .='<div class="cell"><img src="images/straight-h.png" alt="straight h"></div>';
                    $html .='<div class="cell"><img src="images/straight-h.png" alt="straight h"></div>';
                    $html .='<div class="cell"><img src="images/gauge-0.png" alt="Player 1 gauge"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"><img src="images/gauge-top-190.png" alt="Player 2 top"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"><img src="images/gauge-190.png" alt="Player 2 gauge"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"><img src="images/valve-closed.png" alt="valve closed"></div>';
                    $html .='<div class="cell"><img src="images/leak-w.png" alt="leak w"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
            $html .= '</div>';
        $html .= '</form>';

        return $html;
    }

    //displays 12x12 but a 10x10 playable grid
    public function displayGridM() {
        $html = '<form method="post" action="">';
            $html .= '<div class="game">';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
            $html .= '</div>';
        $html .= '</form>';

        return $html;
    }

    //displays 22x22 but a 20x20
    public function displayGridL() {
        $html = '<form method="post" action="">';
            $html .= '<div class="game">';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
                $html .='<div class="row">';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                    $html .='<div class="cell"></div>';
                $html .='</div>';
            $html .= '</div>';
        $html .= '</form>';

        return $html;
    }

    //return html for buttons
    //when give up is clicked goes to win page, generates the new game button
    public function displayButtons() {
        $html = '<form method="post" action="game-post.php">';
        $html .= '<p><label for="piece1"><img src="images/cap-e.png" alt="Piece1"></label><input type="radio" name="piece" id="piece">';
        $html .= '<label for="piece2"><img src="images/straight-h.png" alt="Piece2"></label><input type="radio" name="piece" id="piece">';
        $html .= '<label for="piece3"><img src="images/ninety-wn.png" alt="Piece3"></label><input type="radio" name="piece" id="piece">';
        $html .= '<label for="piece4"><img src="images/tee-nes.png" alt="Piece4"></label><input type="radio" name="piece" id="piece">';
        $html .= '<label for="piece5"><img src="images/straight-v.png" alt="Piece5"></label><input type="radio" name="piece" id="piece"></p>';
        $html .= '<p><input type="submit" name="rotate" value="Rotate">';
        $html .= '<input type="submit" name="discard" value="Discard">';
        $html .= '<input type="submit" name="open" value="Open Valve">';
        $html .= '<input type="submit" name="giveup" value="Give Up"></p>';
        $html .= '</form>';
        return $html;
    }


    public function displayTurns() {
        $html = '<p id="turns">Player\'s turn</p>';
        return $html;
    }

    /*
     * Possible changing to a different view, since it's not part of the game play.
     */

    public function displayWin($winner, $condition) {
        if($condition=='g'){
            $html = '<p class="win">' . $this->steampunked->getPlayers()[0]->getName() . " has given up!</p>
                <p class='win'>" . $this->steampunked->getPlayers()[$winner]->getName() . " is the winner!</p>";
        }
        return $html;
    }

    public function displayIndex(){
        $html = <<<HTML
<p class="index-banner"><img src="images/title.png" width="600" height="104" alt="Steampunked Logo"</p>
<form method="post" action="game-post.php">
    <p class="index-text">
        <label for="name1">Player 1's Name:</label>
        <input type="text" name="name1" id="name1">
    </p>

    <p class="index-text">
        <label for="name2">Player 2's Name:</label>
        <input type="text" name="name2" id="name2">
    </p>

    <p class="index-select">
        <label for="size">Board Size:</label>
        <select name="size" id="size">
            <option>6 by 6</option>
            <option>10 by 10</option>
            <option>20 by 20</option>
        </select>
    </p>

    <p class="index-submit"><input type="submit" name="newgame" value="Start Game"></p>

</form>
HTML;
        return $html;

    }
}