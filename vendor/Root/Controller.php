<?php

/**
 * Created by PhpStorm.
 * User: guillaumeboutin
 * Date: 19/04/2017
 * Time: 09:02
 */
class Controller
{
    /**
     * Controller constructor.
     * @param string $view
     */
    function __construct($view = ""){
        $this->render($view);
    }

    public function render($view){
        if($view != "") {
            // On include la view
            require TEMPLATEPATH . DS . "header.php";
            require MODPATH . DS . $view;
            require TEMPLATEPATH . DS . "footer.php";
        }
    }


}