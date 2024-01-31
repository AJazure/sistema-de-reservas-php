<?php
    /*
    Controller Inicio muestra la página inicial
    */
    class Inicio extends Controller {
        public function __construct() {
            $this->habitacionModelo = $this->loadModel('Habitacion');
            //echo "Controller Páginas Cargado, este es el controller por defecto";
        }

        public function index() {

            $habitaciones = $this->habitacionModelo->getHabitaciones();

            $data = [
                'titulo' => 'Bienvenido al Sistema de Reservas',
                'habitaciones' => $habitaciones
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