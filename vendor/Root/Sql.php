<?php

/**
 * Created by PhpStorm.
 * User: guillaumeboutin
 * Date: 03/05/2017
 * Time: 09:09
 */
class Sql
{
    private static $instanceSql = null;

    /**
     * Sql constructor.
     */
    public function __construct()
    {

    }

    /**
     * get Connection Instance
     * @return null|PDO|Sql
     */
    public static function getInstanceSql()
    {
        if (is_null(self::$instanceSql)) {
            try {
                self::$instanceSql = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage() . '<br>';
                die();
            }
        }

        return self::$instanceSql;
    }

    /**
     * Block for Singleton
     * @return bool
     */
    public function __clone()
    {
        return false;
    }

}