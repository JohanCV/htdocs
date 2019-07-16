<?php

class Fecha{
    private $idfecha;
    private $dia;
    private $mes;
    private $anio;
    private $diasemana;
    private $fk_idcurso;
    private $db;

    function __construct(){
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getIdfecha()
    {
        return $this->$idfecha;
    }

    /**
     * @param mixed $ides
     */
    public function setIdfecha($idfe)
    {
        $this->idfecha = $idfe;
    }

    /**
     * @return mixed
     */
    public function getFk_idcurso()
    {
        return $this->fk_idcurso;
    }

    /**
     * @param mixed $ides
     */
    public function setFk_idcurso($idfe)
    {
        $this->fk_idcurso = $idfe;
    }

    /**
     * @return mixed
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * @param mixed $nombre
     */
    public function setDia($d)
    {
        $this->dia = $d;
    }

    public function getMes()
    {
        return $this->mes;
    }

    /**
     * @param mixed $nombre
     */
    public function setMes($m)
    {
        $this->mes = $m;
    }

    public function getAno()
    {
        return $this->anio;
    }

    /**
     * @param mixed $nombre
     */
    public function setAno($a)
    {
        $this->anio = $a;
    }

    /**
     * @return mixed
     */
    public function getDiasemana()
    {
        return $this->dia;
    }

    /**
     * @param mixed $nombre
     */
    public function setDiasemana($ds)
    {
        $this->diasemana = $ds;
    }

    function getOne($idcurso){
        $sql = "SELECT concat(dia,'/',mes,'/',anio) as fecha, idfecha  FROM fecha WHERE fk_idcurso = '$idcurso'";
        $fechacourse = $this->db->query($sql);

        return $fechacourse;
    }

    public function getAll(){
        $sql = "SELECT concat(diasemana,' - ',dia,'/',mes,'/',anio) as fecha, idfecha FROM fecha ORDER BY idfecha DESC";
        $fecha = $this->db->query($sql);

        return $fecha;
    }

    public function save(){
      $result = false;
      $sql = "INSERT INTO fecha VALUES (
              NULL,
              '{$this->getDia()}',
              '{$this->getMes()}',
              '{$this->getAno()}',
              '{$this->getDiasemana()}',
              '{$this->getFk_idcurso()}')";
      $save = $this->db->query($sql);

      //echo $this->db->error;
      //die();
      if ($save) {
          $result= true;
      }
      return $result;
    } 

}
