<?php
class Usuariocurso{
    private $iduc;
    private $idusu;
    private $idcurso;
    private $estadoasistencia;
    private $idcursoprueba;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getIduc(){
        return $this->iduc;
    }
    public function setIduc($id){
        $this->iduc= $id;
    }

    public function getIdusu(){
        return $this->idusu;
    }
    public function setIdusu($id){
        $this->idusu = $id;
    }
    public function getIdcurso(){
        return $this->idcurso;
    }
    public function setIdcurso($idcurso){
        $this->idcurso = $idcurso;
    }
    public function getEstadoasistencia(){
        return $this->estadoasistencia;
    }
    public function setEstadoasistencia($estado){
        $this->estadoasistencia= $estado;
    }
    public function getIdcursoprueba(){
        return $this->idcursoprueba;
    }
    public function setIdcursoprueba($idcp){
        $this->idcursoprueba = $idcp;
    }

    public function getAll(){
        $sql = "SELECT * FROM usuariocurso ORDER BY idcurso DESC ";
        $cursos = $this->db->query($sql);

        return $cursos;
    }

    public function getOne($idcurso){
        $sql = "SELECT iduc, escuela.nombre as Escuela, concat(usuarios.nombre,' ', usuarios.apellidos ) as idusu,  curso.nombre as idcurso, estadoasistencia,
                usuarios.email as email, cursoprueba.nombrecp as idcursoprueba
                FROM usuariocurso
                INNER JOIN usuarios ON usuariocurso.idusu = usuarios.idusu
                INNER JOIN curso on curso.idcurso = usuariocurso.idcurso
                INNER JOIN cursoprueba on cursoprueba.idcursoprueba = usuariocurso.idcursoprueba
                INNER JOIN escuela on escuela.ides = usuarios.ides
                WHERE curso.idcurso = '$idcurso'";


        $matriculados = $this->db->query($sql);

        return $matriculados;
    }

    public function getOneTeach($nombre){
        $sql = "SELECT concat(usuarios.nombre,' ', usuarios.apellidos )as docente,iduc
                FROM usuariocurso
                INNER JOIN usuarios ON usuariocurso.idusu = usuarios.idusu

                WHERE usuariocurso.iduc = '$nombre'";


        $docente = $this->db->query($sql);

        return $docente;
    }

    public function save(){
      $result = false;
      $sql = "INSERT INTO usuariocurso VALUES (NULL ,
              '{$this->getIdusu()}',
              '{$this->getIdcurso()}',
              '{$this->getEstadoasistencia()}',
              '{$this->getIdcursoprueba()}')";
      $save = $this->db->query($sql);


      //echo $this->db->error;
      //die();
      if ($save) {
          $result= true;
      }

      return $result;
    }
    public function eliminar(){
        $sql = "DELETE FROM usuariocurso WHERE iduc = {$this->iduc} ";
        $delete = $this->db->query($sql);
        $result = false;
        //echo $this->db->error;
        //die();
        if ($delete){
            $result = true;
        }
        return $result;
    }

}//fin de clase
/*SELECT USUARIOS.nombre AS idusu, CURSO.nombre AS IDCURSO,
		USUARIOCURSO.estadoasistencia AS estadoasistencia, cursoprueba.nombrecp AS idcursoprueba
        FROM usuariocurso
        INNER JOIN usuarios ON usuarios.idusu = usuariocurso.idusu
        INNER JOIN curso ON CURSO.idcurso = USUARIOCURSO.idcurso
        INNER JOIN cursoprueba ON cursoprueba.idcursoprueba = usuariocurso.idcursoprueba*/
