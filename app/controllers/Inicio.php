<?php

    class Inicio extends Controller {
        public function __construct() {
            //echo "Controller Páginas Cargado, este es el controller por defecto";
        }

        public function index() {

            $data = [
                'titulo' => 'Bienvenido al Sistema de Reservas'
            ];

            $this->loadView('pages/inicio', $data);
            
            //echo "Es el index de páginas.php";
        }

        public function habitacion($num_hab) {
            echo "Hay X cantidad de habitaciones.";
            echo $num_hab;
        }

        public function reserva() {
            $this->loadView('pages/reservas');
            echo "Hay X cantidad de reservas.";
        }
    }

?>