<?php
/**
 * CORE : DO NOT EDIT THIS CLASS
 * Application Class Base : Manages the Application
 *
 * @category  System
 * @package   Root
 * @author    OSS sifar <simon.farail@smile.fr>
 * @copyright 2017 oss
 * @license   OSL 3.0 http://opensource.org/licenses/osl-3.0.php
 */
namespace Root\System;

class Application
{
    /** @var array main config */
    protected $config = array();

    /**
     * "Start" the application:
     * Initialise the application
     *
     * @param array $config The config
     */
    public function __construct($config)
    {
        if( is_array($config) ){
            $this->config = $config;
        }
    }

    /**
     * Call a page from the request uri
     *
     * @param string $uri The requested uri
     * @return Application
     * @throws \Exception
     */
    public function call($uri = null)
    {

        if( is_null($uri) ){
            $uri = $_SERVER['REQUEST_URI'];
        }
        if( !is_string($uri) ){
            throw new \Exception("The requested URI is not a string.", 1);
        }
        $routes = $this->config['routes'];
        /**
         * If the path exists in the config array
         */

        // Param false si URI simmple, true, si URI complexe /parama/id=*
        $useIndexEtoile = false;

        $explodeUri = explode("/", $uri);
        //si param == id
        if(isset($_GET['id']) && (count($explodeUri)-1)>1) {
            //echo $uri."<br>".count($explodeUri)."<br>";

            $lastParam = $explodeUri[count($explodeUri) - 1];
            $indexEtoile = substr($uri, 0, -1 * strlen($lastParam)) . "*";
            //echo $indexEtoile;
        }

        // mode normal
        if( isset($routes[$uri]) ){
            $index = $uri;
        }
        // mode complexe avec id
        else if(isset($lastParam) && isset($indexEtoile) && isset($routes[$indexEtoile])) {
            $index = $indexEtoile;
            $useIndexEtoile = true;
        }
        // sinon index avec réécriture de l'url par le .htaccess
        else if( isset( $routes['/'] ) ){
            $index = '/';
        } else {
            $index = 0;
        }

        /**
         * We load the file from the call and try exist
         */
        if(isset( $routes[$index]['call'] )){
            // avant include de la vue directe : include_once MODPATH . DS .$routes[$index]['call'];
            // Include de ma classe
            if(file_exists(MODPATH . DS .$routes[$index]['call'])) {

                // recuperation de la classe en dynamique
                require_once(MODPATH . DS . $routes[$index]['call']);
                // On l'instanscie
                if( !isset($lastParam) || !isset($indexEtoile) || !$useIndexEtoile) {
                    $controller = new $routes[$index]['name']($routes[$index]['view']);
                }else{
                    $controller = new $routes[$index]['name']($routes[$index]['view'], $_GET['id']);
                }

                // Si tout va mal 2
                if (!isset($controller)) {
                    var_dump("My 404 : Class not Found 2");
                }
            }else{
                // Si tout va mal 1
                var_dump("My 404 : Class not Found 1");
            }
        }
        return $this;
    }

    /**
     * Start an Application instance
     *
     * @return Application
     */
    public static function oss_start()
    {
        $config = array();

        // easiest version with only just 1 config file :
        $config = include_once CONFPATH . DS . 'routes.php';
        include_once CONFPATH . DS . 'dbconfig.php';

        $app = new self( $config );
        $app->loadModels();
        $app->call();
        return $app;
    }


    /**
     * Load all models
     *
     * {
     * @throws \Exception
     */
    private function loadModels(){
        // Load all the model files we have to /modules/***/model
        if( $dir = opendir( MODPATH ) ){
            while( $module = readdir( $dir ) ) {
                if (is_dir(MODPATH . DS . $module) && $module !== '.' && $module !== '..') {
                    $modelPath = MODPATH . DS . $module . DS . 'model';
                    if (is_dir($modelPath) && $modelDir = opendir($modelPath)) {
                        while( false !== ($file = readdir( $modelDir )) ){
                            if( !is_dir($modelPath . DS . $file) && $file !== '.' && $file !== '..' ){
                                require_once $modelPath . DS . $file;
                            }
                        }
                    }
                }
            }
            closedir($dir);
        } else {
            throw new \Exception("Impossible to access the model path.", 1);
        }
    }
}