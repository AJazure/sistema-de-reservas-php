<?php
    //Cargo las libs necesarias.
    require_once 'config/Config.php';

    //require_once 'libs/Database.php';
    //require_once 'libs/Controller.php';
    //require_once 'libs/Core.php';

    //Autolad de php para la carpeta de libs
    //*recordar que el nombre del controller y la clase deben llamarse igual y comenzar con mayús.
    spl_autoload_register(function($nombreClase){
        require_once 'libs/' . $nombreClase . '.php';
    });

?>