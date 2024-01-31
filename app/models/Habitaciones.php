<?php
/*
Model Habitaciones, obtiene todas las habitaciones de la bd y su tipo correspondiente.
*/

    class Habitaciones {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getHabitaciones(){

            $this->db->query("SELECT 
            habitaciones.id_hab, 
            habitaciones.num_hab, 
            habitaciones.precio_hab, 
            habitaciones.tipos_id_tipo_hab, 
            tipos.id_tipo_hab, 
            tipos.nombre_tipo
        FROM 
            habitaciones
        LEFT JOIN 
            tipos ON habitaciones.tipos_id_tipo_hab = tipos.id_tipo_hab
        ORDER BY 
            habitaciones.num_hab ASC;");
            return $this->db->registros(); //obtengo todos los registros

        }

    }

?>