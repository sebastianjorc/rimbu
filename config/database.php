<?php

include ('database_config.php');

class Database{
    private $driver;
    private $host;
    private $user;
    private $password;
    private $charset;
    private $database;

    public function __construct(){
        $this -> driver     = DRIVER;
        $this -> host       = HOST;
        $this -> database   = DATABASE;
        $this -> user       = USER;
        $this -> password   = PASSWORD;
        $this -> charset    = CHARSET;
    }

    public function connect(){
        try {
            $conexion = $this->driver.
                        ":host=".$this->host.
                        ";dbname=".$this->database.
                        ";charset=".$this->charset;

            $opciones = [
                PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => false,];

            $pdo = new PDO( $conexion,
                            $this->user,
                            $this->password);

            return $pdo;
        } 
        catch (PDOException $e) {
            print_r('Error de conexión: ' . $e->getMessage());
        }
    }
}

?>