<?php
/*
Database clase para la conexión con la BD con PDO
que será usada por el model.
*/

class Database{

    private $host, $db, $user, $password, $charset;
    private $dbh, $stmt, $error;

    public function __construct() {

        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');

        //config de conexión y opciones.
        $dsn = 'mysql:host=' .  $this->host . ';dbname='. $this->db . ';charset=' . $this->charset;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
        );

        //creo instancia de PDP
        try {
            $this->dbh = new PDO($dsn, $this->user,$this->password, $options);
            $this->dbh->exec('set names utf8'); //evito problema con los carácteres especiales.

        } catch (PDOException $e) {
            print_r('Error en la conexión: ' . $e->getMessage());
        }

    }  

    // Iniciar una transacción
    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }

    // Confirmar la transacción
    public function commit()
    {
        return $this->dbh->commit();
    }

    // Deshacer la transacción
    public function rollBack()
    {
        return $this->dbh->rollBack();
    }

    //Puede recibir una variable sql
    public function query($sql) {
        
        $this->stmt = $this->dbh->prepare($sql); //recibe la consulta sql y la prepara
    }

    //VInculo la query con bind
    public function bind($parametro, $valor, $tipo = null) {
        
        if (is_null($tipo)) {
            switch (true) {

                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                break;
                default:
                    $tipo = PDO::PARAM_STR;
                break;

            }
        }

        $this->stmt->bindValue($parametro, $valor, $tipo);

    }

    //ejecuta la consulta sql
    public function execute() {
        return $this->stmt->execute();
    }

    //obtiene los registros y retorna el valor como objeto
    public function registros() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //obtiene un solo registro retorna el valor como un objeto
    public function registro() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //obtiene la cantidad de filas con el method rowCont
    public function rowCont() {
        return $this->stmt->rowCont();
    }

}

?>