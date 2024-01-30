<?php
    /*
    Se encargará de extraer y mapear la url del navegador para relacionar MVC.
    Recordar:
    "url/controller/method/param".
            [0]      [1]    [2]
    */

    class Core {
        //mientras no se carga una url, deberá cargar un controlador actual.
        //esto indica que si no se indica un controlador por defecto será .../inicio/index
        protected $controladorActual = 'inicio';
        protected $metodoActual = 'index';
        protected $parametros = [];

        public function __construct() {
            //obtengo la url que está mapeada desde el htaccess
            //print_r($this->getUrl());
            $url = $this->getUrl();

            //valido si existe el controlador indicado en la url en el  i[0], refiero a la carpeta controllers
            if (!empty($url) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                //si existe se config como controller por defecto.
                $this->controladorActual = ucwords($url[0]);

                //unset del índice
                unset($url[0]);
                
            }

            //requiero el nuevo controller
            require_once '../app/controllers/' . $this->controladorActual . '.php';
            //instancio
            $this->controladorActual = new $this->controladorActual;

            //valido si se indica un method indicado en la url, si existe en el i[1]
            if (isset($url[1])) {
                //verifico existencia del méthod del controller
                if (!empty($url) && method_exists($this->controladorActual, $url[1])) {
                    //si existe se config como method por defecto.
                    $this->metodoActual = $url[1];

                    //unset del índice
                    unset($url[1]);
                }

            }

            //echo $this->metodoActual; //puedo ver que indica el method correcto.

            //obtengo los parámetros si se indican para pasarlos al controller o model
            $this->parametros= $url ? array_values($url) : []; //si no se pasa nada, será un array vacío.

            //llamar callback con parám. array
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);

        }

        public function getURL() {
            //valido y proceso la url para que retorne un arreglo
            //echo $_GET['url'];

            if (isset($_GET['url'])) {
                
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;
            }
        }
    }



?>