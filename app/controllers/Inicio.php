<?php
    /*
    Controller Inicio muestra la página inicial
    */
    class Inicio extends Controller {
        public function __construct() {
            
            //echo "Controller Páginas Cargado, este es el controller por defecto";
        }

        public function index() {

            $this->loadView('pages/inicio');
            
            echo "Estás en el pages/inicio ejecutado por el controller Inicio/index.php. ✋";
        }

    }

?>