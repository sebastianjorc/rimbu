<?php
include ('database_config.php');

class Connection{
    
    private $driver;
    private $host;
    private $user;
    private $password;
    private $charset;
    private $database;

    public function __construct()
    {
        $this -> driver     = DRIVER;
        $this -> host       = HOST;
        $this -> database   = DATABASE;
        $this -> user       = USER;
        $this -> password   = PASSWORD;
        $this -> charset    = CHARSET;
    }

    static public function connect()
    {
        try {
            $conexion = DRIVER.
                        ":host=".HOST.
                        ";dbname=".DATABASE.
                        ";charset=".CHARSET;

            $opciones = [
                PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => false,];

            $pdo = new PDO( $conexion,
                            USER,
                            PASSWORD);

            return $pdo;
        } 
        catch (PDOException $e) {
            print_r('Error de conexión: ' . $e->getMessage());
            die("Error de conexión: ".$e->getMessage());
        }
    }
}

?>