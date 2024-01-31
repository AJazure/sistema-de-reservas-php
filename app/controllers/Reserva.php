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

        //Recibe 3 parámetros y los pasa a la siguiente vista para continuar con la carga de un form para dar alta
        public function create($checkin, $checkout, $id_hab) {

            //obtengo las habitaciones para el form
            $habitaciones = $this->habitacionesModel->getHabitaciones();

            foreach ($habitaciones as $habitacion) {
                
                if ($habitacion->id_hab == $id_hab) {
                    $habitacionSeleccionada = $habitacion->num_hab . ' ' . $habitacion->nombre_tipo;
                }

            }
            
            $data = [
                'titulo'   => 'Realizar Reserva',
                'checkin'  => $checkin,
                'checkout' => $checkout,
                'id_hab'  => $id_hab,
                'habitacion' => $habitacionSeleccionada
            ];

            //var_dump($data);

            //indico la vista y le paso los param.
            $this->loadView('pages/reservar', $data);
        }

        //Obtiene los datos del form de reservar para luego almacenarlos en la BD y realizar una reserva
        public function store() {
            
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
            $id_habitacion = $_POST['id_hab'];
            $nombre_cli = $_POST['nombre_cli'];
            $apellido_cli = $_POST['apellido_cli'];
            $dni_cli = $_POST['dni_cli'];
            $telefono_cli = $_POST['telefono_cli'];

            var_dump($checkin);die();

            $data = [
                'checkin'  => $checkin,
                'checkout' => $checkout,
                'id_hab'  => $id_habitacion,
                'nombre_cli'  => $nombre_cli,
                'apellido_cli'  => $apellido_cli,
                'dni_cli'  => $dni_cli,
                'telefono_cli'  => $telefono_cli,
            ];

            $return = $this->reservasModel->storeReserva($data);

            echo $return;

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
                'checkin'    => $checkin,
                'checkout'   => $checkout,
                'ruta'       => RUTA_URL
            ];
        
            //devuelvo una respuesta JSON que debería agarrar AJAX
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;

        }

    }


?>