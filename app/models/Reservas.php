<?php
/*
Model Reservas, obtiene todas las habitaciones que tienen asociado un cliente,
es decir que tiene una reserva para una determinada estancia de tiempo de check-in y check-out
*/

    class Reservas {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //obtiene todas las habitaciones con reservas
        public function getReservas() {

            $this->db->query("SELECT *
            FROM tipos AS t
            INNER JOIN habitaciones AS h ON id_tipo_hab = h.tipos_id_tipo_hab
            INNER JOIN reservas AS r ON h.id_hab = r.habitaciones_id_hab
            INNER JOIN clientes AS c ON r.clientes_id_cli = c.id_cli
            WHERE (r.checkin_res >= CURRENT_DATE() OR r.checkout_res >= CURRENT_DATE())
            ORDER BY r.checkin_res;");

            return $this->db->registros(); //obtengo todas las habitaciones con reservas

        }

        //consulto la disponibilidad de una habitación en un determinado lapso de tiempo
        public function habitacionDisponible($checkin, $checkout, $id_hab) {

            $this->db->query("SELECT COUNT(*) AS countReservas
            FROM reservas
            WHERE habitaciones_id_hab = :id_hab
            AND ((:checkin BETWEEN checkin_res AND checkout_res)
            OR (:checkout BETWEEN checkin_res AND checkout_res)
            OR (checkin_res BETWEEN :checkin AND :checkout)
            OR (checkout_res BETWEEN :checkin AND :checkout))");

            //vinculo los params
            $this->db->bind(':checkin', $checkin);
            $this->db->bind(':checkout', $checkout);
            $this->db->bind(':id_hab', $id_hab);

            //ejecuto
            $this->db->execute();

            //almaceno los resultados
            $result = $this->db->registro();

            //debería retornar true si La habitación no tiene reservas para las fechas dadas
            return ($result->countReservas == 0);
        }
        
    }

?>