<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 4/2/2016
 * Time: 1:03 AM
 */

namespace Steampunked;


class View {
    /**
     * Create the HTML for the page header
     * @return string HTML for the standard page header
     */
    public function header() {
        $html = <<<HTML
<nav>
    <ul class="left">
        <li><a href="index.php">The Steampunked Game Online</a></li>
    </ul>
HTML;

        if(count($this->links) > 0) {
            $html .= '<ul class="right">';
            foreach($this->links as $link) {
                $html .= '<li><a href="' .
                    $link['href'] . '">' .
                    $link['text'] . '</a></li>';
            }
            $html .= '</ul>';
        }

        $html .= <<<HTML
</nav>
<header class="main">
    <h1><img src="images/title.png" width="600" height="104" alt="Steampunked Logo"></h1>
</header>
HTML;
        return $html;
    }

    public function head() {
        return <<<HTML
<meta charset="utf-8">
<title>$this->title</title>
<link rel="stylesheet" href="lib/Steampunked/css/steampunked.css">
HTML;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function addLink($href, $text) {
        $this->links[] = array("href" => $href, "text" => $text);
    }

    private $title = "";	///< The page title
    private $links = array();	///< Links to add to the nav bar
}