<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/25/16
 * Time: 03:32
 */

namespace Noir;


class StarController extends Controller {
    /**
     * StarController constructor.
     * @param Site $site Site object
     * @param $user User object
     * @param array $post $_POST
     */
    public function __construct(Site $site, $user, $post) {
        parent::__construct($site);

        $movies = new Movies($site);
        if (isset($post['id']) && isset($post['rating'])) {
            $ret = $movies->updateRating($user, $post['id'], $post['rating']);

            if ($ret) {
                $view = new HomeView($site, $user);
                $this->result = json_encode(array('ok' => true, 'table' => $view->presentTable()));
            }
            else {
                $this->result = json_encode(array('ok' => false, 'message' => "Failed to update database!"));
            }
        }
    }

    /**
     * Get any ajax response
     * @return JSON result for AJAX
     */
    public function getResult() {
        return $this->result;
    }

    protected $result = null;	///< result for AJAX operations
}