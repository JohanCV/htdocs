<?php

class Profesor{
    private $idprofesor;
    private $nombre;
    private $apellido;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getIdprofesor()
    {
        return $this->idprofesor;
    }

    /**
     * @param mixed $ides
     */
    public function setIdprofesor($idpro)
    {
        $this->idprofesor = $idpro;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $nombre
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getAll(){
        $sql = "SELECT * FROM profesor";
        $profe= $this->db->query($sql);

        return $profe;
    }

}
