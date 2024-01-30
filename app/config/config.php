<?php
/*
Contiene las constantes que usaré para configurar la BD
y para la configuración de rutas.
*/

//pruebas para ver la dirección
//echo __FILE__;
//echo dirname(dirname(__FILE__));


define('RUTA_APP', dirname(dirname(__FILE__))); //ruta de app.
define('RUTA_URL', 'http://localhost/reservas_sistema/'); //http://localhost/reservas_sistema/ ruta url del sistema.
define('NOMBRESITIO', 'Sistema de');

define('HOST', 'localhost');
define('DB', 'db_reservas');
define('USER', 'root');
define('PASSWORD', 'admin');
define('CHARSET', 'utf8mb4');

?>