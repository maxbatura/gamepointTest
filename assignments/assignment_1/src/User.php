<?php

/**
 * Created by PhpStorm.
 * User: maxbatura
 */

class User
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public static function getInstanceById($id)
    {
        return new User($id);
    }
}