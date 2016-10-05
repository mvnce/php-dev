<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 4/12/2016
 * Time: 3:52 PM
 */

namespace Steampunked;


class Game
{
    const STATUS_OPEN = "O";	///< Game is in session
    const STATUS_CLOSED = "C";

    public function __construct($row) {
        $this->id = $row['id'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    private $id;
}