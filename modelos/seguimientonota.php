<?php
class Seguimientonota{
    private $idseg;
    private $iduc;
    private $curso;
    private $cursoprueba;
    private $docente;
    private $nota;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getIdseg(){
        return $this->idseg;
    }
    public function setIdseg($nc){
        $this->idseg = $nc;
    }
    public function getIduc(){
        return $this->iduc;
    }
    public function setIduc($nc){
        $this->iduc = $nc;
    }
    public function getCurso(){
        return $this->curso;
    }
    public function setCurso($nc){
        $this->curso = $nc;
    }
    public function getCursoprueba(){
        return $this->cursoprueba;
    }
    public function setCursoprueba($nc){
        $this->cursoprueba = $nc;
    }
    public function getDocente(){
        return $this->docente;
    }
    public function setDocente($nc){
        $this->docente = $nc;
    }
    public function getNota(){
        return $this->nota;
    }
    public function setNota($nc){
        $this->nota = $nc;
    }

    public function save(){
      $result = false;
      $sql = "INSERT INTO seguimiento VALUES (NULL,
              '{$this->getIduc()}',
              '{$this->getCurso()}',
              '{$this->getCursoprueba()}',
              '{$this->getDocente()}',
              '{$this->getNota()}')";
      $save = $this->db->query($sql);
      //echo $this->db->error;
      //die();
      if ($save) {
          $result= true;
      }
      return $result;
    }

    public function editar(){
        $sql = "UPDATE seguimiento SET
              nota='{$this->getNota()}'
              WHERE idseg={$this->idseg}";
        $edit = $this->db->query($sql);
        //echo $this->db->error;
        //die();
        $result=false;
        if ($edit){
            $result = true;
        }

        return $result;
    }

    public function getOnecurso($idcurso){
        $sql = " SELECT idseg, docente, cursoprueba, nota FROM seguimiento WHERE idcurso='$idcurso' ORDER BY idseg desc";
        $matriculados = $this->db->query($sql);

        return $matriculados;
    }

    public function getOne(){
        $sql = " SELECT * FROM seguimiento WHERE idseg={$this->getIdseg()}";
        $matriculados = $this->db->query($sql);

        return $matriculados->fetch_object();
    }

}

?>
