<?php

    class servicioController{
        private $servicios;

        public function __construct()
        {            
        }

        # QUERIES

        public function get_servicio($id){
            $consulta=$this->db->query("select * from servicio where id=".$id.";");
            while($filas=$consulta->fetch_assoc()){
                $this->servicios[]=$filas;
            }
            return $this->servicios;
        } 

        public function get_servicios(){
            $consulta=$this->db->query("select * from servicio;");
            while($filas=$consulta->fetch_assoc()){
                $this->servicios[]=$filas;
            }
            return $this->servicios;
        }
        
        public function get_servicios_por_categoria($categoria){
            $consulta=$this->db->query(
                "select * 
                from servicio as S
                INNER JOIN subcategoria_servicio as SS
                ON SS.id = S.subcategoria_servicio_id
                where categoria_id=".$categoria." ;");

            while($filas=$consulta->fetch_assoc()){
                $this->servicios[]=$filas;
            }
            return $this->servicios;
        }
        
        public function get_servicios_por_subcategoria($subcategoria){
            $consulta=$this->db->query("select * from servicio where subcategoria_servicio_id=".$subcategoria.";");
            while($filas=$consulta->fetch_assoc()){
                $this->servicios[]=$filas;
            }
            return $this->servicios;            
        }
    }

?>