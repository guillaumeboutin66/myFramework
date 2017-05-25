<?php

/**
 * Created by PhpStorm.
 * User: guillaumeboutin
 * Date: 19/04/2017
 * Time: 10:05
 */
class AdressController extends Controller
{
    var $idUtilisateur;

    public function __construct($view = "", $action, $idUser) {
        parent::__construct($view);
        $this->idUtilisateur = $idUser;
    }

}