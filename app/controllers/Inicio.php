<?php
    /*
    Controller Inicio muestra la página inicial
    Proporciona los datos de habitaciones necesarios para el select de habitaciónes.
    */
    class Inicio extends Controller {
        public function __construct() {
            $this->habitacionModelo = $this->loadModel('Habitaciones');
            //echo "Controller Páginas Cargado, este es el controller por defecto";
        }

        //Direcciona al inicio con el número de habitaciónes existentes en la bd
        //Permitirá que en el form de reservar habitación muestre mediante un select las habitaciones
        public function index() {

            $habitaciones = $this->habitacionModelo->getHabitaciones(); //obtiene todas las habitaciones y su tipo

            $data = [
                'titulo' => 'Sistema de Reservas Foca',
                'habitaciones' => $habitaciones,
            ];

            $this->loadView('pages/inicio', $data);
            
            //echo "Es el index de páginas.php";
        }

    }

?>