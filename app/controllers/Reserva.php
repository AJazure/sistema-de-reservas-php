<?php
/*
Controller Reserva 
*/

    class Reserva extends Controller {
        
        public function __construct() {
            $this->reservasModel = $this->loadModel('Reservas');
            $this->habitacionesModel = $this->loadModel('Habitaciones');
        }

        public function index() {
            echo "Index de reservas.";
        }

        //Motrará un form para crear una nueva reserva a una habitación
        /*
        cuando el user indica unas fechas y habitación, deberá mostrarse si está disponible para esa fecha esa habitación
        por lo tanto, tiene que ser una func que reciba fechas y num de habitacion para consultar, debe devolver una
        vista que muestre el estado de esa habitación indicando si puede reservarla o no. Si puede reservarla, entonces
        debe ejecutar el método create.
        */
        //esta func requiere traer del modelo datos de habitación y fechas de reserva disponibles
        public function create($checkin, $checkout, $num_hab) {
            //Creo un objeto nuevo para cargarle datos
            $reservas = $this->reservasModel->getReservas(); //obtengo las fechas en las que está reservada la habitación para poder seleccionar
            

            /*
            //prueba de datos que está almacenando en las var.
            echo "<pre>";
            //echo "Habitaciones<br>";
            //print_r($habitaciones); //no será necesario por lo que getReservas trae un join entre clientes/reservas/habitaciones
            echo "Reservas<br>";
            print_r($reservas);
            echo "</pre>";
            */
            //retorno la vista de alta de reserva, envio los datos que se necesitan para el form del alta.
            //$this->load->view('');
        }
        
        // Muestra todas las reservas actuales, ordenadas por fecha de check-in.
        public function showReservas() {

            $reservas = $this->reservasModel->getReservas();

            $data = [
                'reservas' => $reservas
            ];
            
            /*
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            */

            $this->loadView("pages/Reservas", $data);

        }

        //Buscará y validará si una habitación específica tiene disponibilidad para dichas fechas
        //Tomará del form de inicio la fecha de entrada, de salida y número de habitación.
        //Debe validar que las fechas ingresada en checkin sea mayor a la de hoy y que el checkout sea mayor al checkin
        public function checkDisponibilidad() {
            //recibo los datos
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
            $id_habitacion = $_POST['id_hab'];
        
            //Mediante el modelo traigo los datos pasando parámetros ingresados en el form
            $disponible = $this->reservasModel->habitacionDisponible($checkin, $checkout, $id_habitacion);
        
            //creo la respuesta JSON
            $response = [
                'disponible' => $disponible,
                'habitacion' => $id_habitacion,
                'checkin' => $checkin,
                'checkout' => $checkout,
                'ruta' => RUTA_URL
            ];
        
            //devuelvo una respuesta JSON que debería agarrar AJAX
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;

        }

    }


?>