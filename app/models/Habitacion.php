<?php
    /*
    
    */

    class Habitacion {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getHabitaciones(){

            $this->db->query("SELECT * FROM habitaciones");
            return $this->db->registros(); //obtengo todos los registros

        }

    }

?>