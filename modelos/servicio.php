<?php

class Servicios{

    private $id;
    private $nombre;
    private $codigo;
    private $taller_mecanico_id;
    private $subcategoria_servicio_id;

    public function __construct(){
        $id     = null;
        $nombre = null;
        $codigo = null;
        $taller_mecanico_id         = null;
        $subcategoria_servicio_id   = null;
    }


    # GETTERS AND SETTERS
    /**
     * Get the value of subcategoria_servicio_id
     */ 
    public function getSubcategoria_servicio_id()
    {
        return $this->subcategoria_servicio_id;
    }

    /**
     * Set the value of subcategoria_servicio_id
     *
     * @return  self
     */ 
    public function setSubcategoria_servicio_id($subcategoria_servicio_id)
    {
        $this->subcategoria_servicio_id = $subcategoria_servicio_id;

        return $this;
    }

    /**
     * Get the value of taller_mecanico_id
     */ 
    public function getTaller_mecanico_id()
    {
        return $this->taller_mecanico_id;
    }

    /**
     * Set the value of taller_mecanico_id
     *
     * @return  self
     */ 
    public function setTaller_mecanico_id($taller_mecanico_id)
    {
        $this->taller_mecanico_id = $taller_mecanico_id;

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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

?>