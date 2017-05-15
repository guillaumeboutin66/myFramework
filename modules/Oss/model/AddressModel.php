<?php

/**
 * Created by PhpStorm.
 * User: guillaumeboutin
 * Date: 03/05/2017
 * Time: 11:36
 */
class AddressModel extends Model {
    private static $table = "adress";

    /**
     * UserModel constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @return array<Adress>
     */
    public function getAllAddress() {
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