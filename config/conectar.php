<?php
    class Conectar{
        private $driver;
        private $host, $user, $pass, $database, $charset;
    
        public function __construct() {
            $db_cfg = require_once 'config/database.php';
            $this->driver=$db_cfg["driver"];
            $this->host=$db_cfg["server"];
            $this->user=$db_cfg["user"];
            $this->pass=$db_cfg["pass"];
            $this->database=$db_cfg["db"];
            $this->charset=$db_cfg["charset"];
        }
        
        public function conexion(){
            
            if($this->driver=="mysql" || $this->driver==null){
                $con= new mysqli(
                    $this->server, 
                    $this->user, 
                    $this->pass, 
                    $this->db
                );
                $con->query("SET NAMES '".$this->charset."'");
            }            
            return $con;
        }
        
        public function startFluent(){
            require_once "FluentPDO/FluentPDO.php";
            
            if($this->driver=="mysql" || $this->driver==null){
                $pdo = new PDO( $this->driver.":dbname=".$this->db, $this->user, $this->pass);
                $fpdo = null;#new FluentPDO($pdo);
                // PDO es una librería pra lectura de bases de datos mysql.
            }
            return $fpdo;
        }

        

    }
?>
