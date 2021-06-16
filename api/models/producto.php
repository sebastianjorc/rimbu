<?php

    class Producto{
        private $nombre;
        private $codigo;
        private $fecha_creacion;
        private $fecha_modificacion;
        private $precio;
        private $existencia;
        private $sub_cat_prod;
        private $valoracion;
        private $url;
        private $imagen;
        private $tiempo_entrega;
        private $oferta;
        private $especificaciones;
        private $detalles;
        private $descripcion;
        private $vistas;

        public function __construct()
        {
            $nombre = null;
            $codigo = null;
            $fecha_creacion = null;
            $fecha_modificacion = null;
            $precio = null;
            $existencia = null;
            $sub_cat_prod = null;
            $valoracion = null;
            $url = null;
            $imagen = null;
            $tiempo_entrega = null;
            $oferta = null;
            $especificaciones = null;
            $detalles = null;
            $descripcion = null;
            $vistas = null;            
        }

        # GETTERS AND SETTERS

        /**
         * Get the value of vistas
         */ 
        public function getVistas()
        {
                return $this->vistas;
        }

        /**
         * Set the value of vistas
         *
         * @return  self
         */ 
        public function setVistas($vistas)
        {
                $this->vistas = $vistas;

                return $this;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of detalles
         */ 
        public function getDetalles()
        {
                return $this->detalles;
        }

        /**
         * Set the value of detalles
         *
         * @return  self
         */ 
        public function setDetalles($detalles)
        {
                $this->detalles = $detalles;

                return $this;
        }

        /**
         * Get the value of especificaciones
         */ 
        public function getEspecificaciones()
        {
                return $this->especificaciones;
        }

        /**
         * Set the value of especificaciones
         *
         * @return  self
         */ 
        public function setEspecificaciones($especificaciones)
        {
                $this->especificaciones = $especificaciones;

                return $this;
        }

        /**
         * Get the value of oferta
         */ 
        public function getOferta()
        {
                return $this->oferta;
        }

        /**
         * Set the value of oferta
         *
         * @return  self
         */ 
        public function setOferta($oferta)
        {
                $this->oferta = $oferta;

                return $this;
        }

        /**
         * Get the value of tiempo_entrega
         */ 
        public function getTiempo_entrega()
        {
                return $this->tiempo_entrega;
        }

        /**
         * Set the value of tiempo_entrega
         *
         * @return  self
         */ 
        public function setTiempo_entrega($tiempo_entrega)
        {
                $this->tiempo_entrega = $tiempo_entrega;

                return $this;
        }

        /**
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        /**
         * Get the value of url
         */ 
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Set the value of url
         *
         * @return  self
         */ 
        public function setUrl($url)
        {
                $this->url = $url;

                return $this;
        }

        /**
         * Get the value of valoracion
         */ 
        public function getValoracion()
        {
                return $this->valoracion;
        }

        /**
         * Set the value of valoracion
         *
         * @return  self
         */ 
        public function setValoracion($valoracion)
        {
                $this->valoracion = $valoracion;

                return $this;
        }

        /**
         * Get the value of sub_cat_prod
         */ 
        public function getSub_cat_prod()
        {
                return $this->sub_cat_prod;
        }

        /**
         * Set the value of sub_cat_prod
         *
         * @return  self
         */ 
        public function setSub_cat_prod($sub_cat_prod)
        {
                $this->sub_cat_prod = $sub_cat_prod;

                return $this;
        }

        /**
         * Get the value of existencia
         */ 
        public function getExistencia()
        {
                return $this->existencia;
        }

        /**
         * Set the value of existencia
         *
         * @return  self
         */ 
        public function setExistencia($existencia)
        {
                $this->existencia = $existencia;

                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }

        /**
         * Get the value of fecha_modificacion
         */ 
        public function getFecha_modificacion()
        {
                return $this->fecha_modificacion;
        }

        /**
         * Set the value of fecha_modificacion
         *
         * @return  self
         */ 
        public function setFecha_modificacion($fecha_modificacion)
        {
                $this->fecha_modificacion = $fecha_modificacion;

                return $this;
        }

        /**
         * Get the value of fecha_creacion
         */ 
        public function getFecha_creacion()
        {
                return $this->fecha_creacion;
        }

        /**
         * Set the value of fecha_creacion
         *
         * @return  self
         */ 
        public function setFecha_creacion($fecha_creacion)
        {
                $this->fecha_creacion = $fecha_creacion;

                return $this;
        }

        /**
         * Get the value of codigo
         */ 
        public function getCodigo()
        {
                return $this->codigo;
        }

        /**
         * Set the value of codigo
         *
         * @return  self
         */ 
        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }
    }

?>