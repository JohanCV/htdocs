<?php
class Asistencia{
    private $idfecha;
    private $fk_iduc;
    private $estado;
    private $nota;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getIdfecha(){
        return $this->idfecha;
    }
    public function setIdfecha($id){
        $this->idfecha = $id;
    }
    public function getFk_iduc(){
        return $this->fk_iduc;
    }
    public function setFk_iduc($iduc){
        $this->fk_iduc = $iduc;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($esta){
        $this->estado = $esta;
    }
    public function getNota(){
        return $this->nota;
    }
    public function setNota($es){
        $this->nota = $es;
    }

    public function getAll(){
        $sql = "SELECT * FROM asistencia ORDER BY idcurso DESC ";
        $cursosasistencia = $this->db->query($sql);

        return $cursosasistencia;
    }

    public function getOne($idcurso){
      /*  $sql = "SELECT fecha.diasemana as idfecha,  curso.nombre as idcurso,
                       usuarios.nombre as idusu, estado
                FROM asistencia
                INNER JOIN fecha ON asistencia.idfecha = fecha.idfecha
                INNER JOIN curso on curso.idcurso = asistencia.idcurso
                INNER JOIN usuarios on usuarios.idusu = asistencia.idusu
                WHERE curso.idcurso = '$idcurso'";*/

          $sql = "SELECT 
          concat(fecha.dia,'-',fecha.mes,'-20',fecha.anio) as fecha,
          curso.nombre,
          concat(usuarios.apellidos,', ',usuarios.nombre) as Docente,
          asistencia.estado, nota from asistencia
          LEFT JOIN usuariocurso
          on asistencia.fk_iduc = usuariocurso.iduc
          left join curso
          on curso.idcurso = usuariocurso.idcurso
          left join usuarios
          on usuarios.idusu = usuariocurso.idusu
          left join fecha
          on asistencia.idfecha = fecha.idfecha
          where usuariocurso.idcurso = '$idcurso'";

        $matriculados = $this->db->query($sql);

        return $matriculados;
    }

    public function save(){
      $result = false;
      $sql = "INSERT INTO asistencia VALUES (
              '{$this->getIdfecha()}',
              '{$this->getFk_iduc()}',
              '{$this->getEstado()}',
              '{$this->getNota()}')";
      $save = $this->db->query($sql);

      //echo $this->db->error;
      //die();
      if ($save) {
          $result= true;
      }
      return $result;
    }  
}//fin de clase
