<?php

/**
 * Created by PhpStorm.
 * User: guillaumeboutin
 * Date: 19/04/2017
 * Time: 11:37
 */
class UserModel extends Model {
    private static $table = "user";

    /**
     * UserModel constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @return array<User>
     */
    public function getAllUser() {
        // Return the fetchAll of SELECT * From my Table of my Model
        return parent::getAll($this);
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return self::$table;
    }
}