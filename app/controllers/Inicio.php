<?php

    class Inicio {
        public function __construct() {
            //echo "Controller Páginas Cargado, este es el controller por defecto";
        }

        public function index() {
            echo "Es el index de páginas.php";
        }

        public function habitacion($num_hab) {
            echo "Hay X cantidad de habitaciones.";
            echo $num_hab;
        }

        public function reserva() {
            echo "Hay X cantidad de reservas.";
        }
    }

?>