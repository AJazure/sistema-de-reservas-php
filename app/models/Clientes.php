<?php
/*
Model Clientes, obtiene los datos de todos los clientes registrados.
*/

    class Clientes {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getClientes(){

            $this->db->query("SELECT * FROM clientes;");
            return $this->db->registros(); //obtengo todos los registros

        }

    }

?>