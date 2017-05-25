<?php

/**
 * Created by PhpStorm.
 * User: guillaumeboutin
 * Date: 03/05/2017
 * Time: 11:36
 */
class AddressModel extends Model {
    private static $table = "address";

    /**
     * UserModel constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @return array<Address>
     */
    public function getAllAddress() {
        // Return the fetchAll of SELECT * From my Table of my Model
        return parent::getAll($this);
    }


    /**
     * @return array<User>
     */
    public function getAdresseByUser($id) {
        $sql = "SELECT * FROM ".$this->getTable()." where idUser=".$id;
        //var_dump($sql);
        $query = $this->dbConnect->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param $idUser
     * @param $address
     * @param $address2
     * @param $district
     * @param $cityId
     * @return bool
     */
    public function saveAddress($idUser, $address, $address2, $district, $cityId = 1){
        $sql = "INSERT INTO ".$this->getTable()." (idUser, address, address2, district, cityId) VALUES ('".$idUser."','".$address."','".$address2."','".$district."','".$cityId."')";
        //var_dump($sql);
        $query = $this->dbConnect->prepare($sql);
        $id = $query->execute();
        return $id;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return self::$table;
    }
}