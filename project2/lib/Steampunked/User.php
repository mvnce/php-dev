<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 4/11/16
 * Time: 16:43
 */

namespace Steampunked;


class User {
    const SESSION_NAME = 'user';

    /**
     * Constructor
     * @param $row Row from the user table in the database
     */
    public function __construct($row) {
        $this->id = $row['id'];
        $this->email = $row['email'];
        $this->name = $row['name'];
        $this->joined = strtotime($row['joined']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getJoined()
    {
        return $this->joined;
    }

    /**
     * @param int $joined
     */
    public function setJoined($joined)
    {
        $this->joined = $joined;
    }

    private $id;		///< The internal ID for the user
    private $email;		///< Email address
    private $name; 		///< Name as last, first
    private $joined;	///< When user was added
}