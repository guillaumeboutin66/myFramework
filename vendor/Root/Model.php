<?php

/**
 * Created by PhpStorm.
 * User: guillaumeboutin
 * Date: 19/04/2017
 * Time: 11:33
 */
class Model
{
    protected $dbConnect;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $sql = new Sql();
        $this->dbConnect = $sql->openMySqlConnection();
    }


    /**
     * @param $model
     * @return array<$model>
     */
    function getAll($model) {
        $sql = "SELECT * FROM ".$model->getTable();
        $query = $this->dbConnect->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}