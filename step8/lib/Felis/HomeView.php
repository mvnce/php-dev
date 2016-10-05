<?php
/**
 * Created by PhpStorm.
 * User: vincentma
 * Date: 3/15/16
 * Time: 11:47
 */

namespace Felis;


class HomeView extends View {
    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct() {
        $this->setTitle("Felis Investigations");
        $this->addLink("login.php", "Log in");
    }

    /**
     * Add content to the header
     * @return string Any additional comment to put in the header
     */
    protected function headerAdditional() {
        return <<<HTML
<p>Welcome to Felis Investigations!</p>
<p>Domestic, divorce, and carousing investigations conducted without publicity. People and cats shadowed
	and investigated by expert inspectors. Katnapped kittons located. Missing cats and witnesses located.
	Accidents, furniture damage, losses by theft, blackmail, and murder investigations.</p>
<p><a href="">Learn more</a></p>
HTML;
    }

    public function addTestimonial($quote, $author) {
        $this->testimonials[] = array($quote, $author);
    }

    public function testimonials() {
        $html = '<h2>TESTIMONIALS</h2><div class="left">';

        for ($i = 0; $i < ceil(count($this->testimonials)/2); $i++) {
            $html .= '<blockquote>';

            $html .= '<p>' . $this->testimonials[$i][0] . '</p>';
            $html .= '<p><cite>' . $this->testimonials[$i][1] . '</cite></p>';

            $html .= '</blockquote>';
        }
        $html .= '</div>';

        $html .= '<div class="right">';

        for ($i = ceil(count($this->testimonials)/2); $i < count($this->testimonials); $i++) {
            $html .= '<blockquote>';

            $html .= '<p>' . $this->testimonials[$i][0] . '</p>';
            $html .= '<p><cite>' . $this->testimonials[$i][1] . '</cite></p>';

            $html .= '</blockquote>';
        }

        $html .= '</div>';

        return $html;
    }

    private $testimonials = array();
}