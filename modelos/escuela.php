<?php

class Escuela{
    private $ides;
    private $nombre;

    private $db;

    function __construct(){
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getIdes()
    {
        return $this->ides;
    }

    /**
     * @param mixed $ides
     */
    public function setIdes($ides)
    {
        $this->ides = $ides;
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

    public function getAll(){
        $sql = "SELECT * FROM escuela ORDER BY ides DESC ";
        $escuela = $this->db->query($sql);

        return $escuela;
    }

}