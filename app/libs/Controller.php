<?php
    /*
    Controlador principal que cargará los models y views para
    los demás controllers que lo requieran.
    */

    class Controller {
        //Cargar models.
        public function loadModel($model){
            //M. para cargar models
            require_once '../app/models/' . $model . '.php';

            //instancia de model
            return new $model();

        }

        public function loadView($view, $data = []){
            //M. para cargar vistas, a demás puede recibir un conjunto de datos para pasarlos

            //verifico si el archivo view existe
            if (file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else {
                //si el archivo view no existe
                die('La vista no existe');
            }

        }
    }

?>