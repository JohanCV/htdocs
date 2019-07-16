<?php

class Cursoprueba{
    private $idcursoprueba;
    private $nombrecp;

    private $db;

    function __construct(){
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getIdcursoprueba()
    {
        return $this->idcursoprueba;
    }

    /**
     * @param mixed $ides
     */
    public function setIdcursoprueba($idcp)
    {
        $this->idcursoprueba = $idcp;
    }

    /**
     * @return mixed
     */
    public function getNombrecp()
    {
        return $this->nombrecp;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombrecp($nombre)
    {
        $this->nombrecp = $nombre;
    }

    public function getAll(){
        $sql = "SELECT * FROM cursoprueba";
        $cp = $this->db->query($sql);

        return $cp;
    }

}
