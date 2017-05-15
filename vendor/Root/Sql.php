<?php

/**
 * Created by PhpStorm.
 * User: guillaumeboutin
 * Date: 03/05/2017
 * Time: 09:09
 */
class Sql
{
    /**
     * Sql constructor.
     */
    public function __construct()
    {
    }


    /**
     * Open the connection on Database
     */
    function openMySqlConnection()
    {
        try{
            return new PDO("mysql:host=" . DB_HOST . ";port=". DB_PORT .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        }
        catch(PDOException $e){
            echo 'Erreur : '.$e->getMessage().'<br>';
            die();
        }
    }
}