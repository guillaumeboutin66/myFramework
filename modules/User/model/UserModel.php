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
     * @return array<User>
     */
    public function getUser($id) {
        $sql = "SELECT * FROM ".$this->getTable()." where id=".$id;
        $query = $this->dbConnect->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    /**
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $mdp
     * @return string|void
     */
    public function saveUser($nom, $prenom, $mail, $mdp){
        $sql = "INSERT INTO ".$this->getTable()." (nom, prenom, email, mdp) VALUES ('".$nom."','".$prenom."','".$mail."','".$mdp."')";
        var_dump($sql);
        $query = $this->dbConnect->prepare($sql);
        $query->execute();
        try{
            return $this->dbConnect->lastInsertId();
        }catch (PDOException $pe){
            return var_dump($pe->getMessage());
        }
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return self::$table;
    }
}