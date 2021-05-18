<?php

    class productoController{
        private $productos;

        public function __construct()
        {       
        }          

        # QUERIES

        public function get_producto($id){
            $consulta=$this->db->query("select * from producto where id=".$id.";");
            while($filas=$consulta->fetch_assoc()){
                $this->productos[]=$filas;
            }
            return $this->productos;
        } 

        public function get_productos(){
            $consulta=$this->db->query("select * from productos;");
            while($filas=$consulta->fetch_assoc()){
                $this->productos[]=$filas;
            }
            return $this->productos;
        }
        
        public function get_productos_por_categoria($categoria){
            $consulta=$this->db->query(
                "select * 
                from productos as P
                INNER JOIN subcategoria_producto as SP
                ON SP.id = P.subcategoria_producto_id
                where categoria_id=".$categoria." ;");

            while($filas=$consulta->fetch_assoc()){
                $this->productos[]=$filas;
            }
            return $this->productos;
        }
        
        public function get_productos_por_subcategoria($subcategoria){
            $consulta=$this->db->query("select * from productos where subcategoria_producto_id=".$subcategoria.";");
            while($filas=$consulta->fetch_assoc()){
                $this->productos[]=$filas;
            }
            return $this->productos;            
        }
    }

?>