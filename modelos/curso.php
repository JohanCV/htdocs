<?php
class Curso{
    private $id;
    private $nombre;
    private $nombrecorto;
    private $horainicio;
    private $horafinal;
    private $contenido;
    private $idprofesor;
    private $limiteInscripciones;
    private $fechainicio;
    private $estado_ocultar;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombrecorto(){
        return $this->nombrecorto;
    }
    public function setNombrecorto($nombrecorto){
        $this->nombrecorto = $nombrecorto;
    }
    public function getHorainicio(){
        return $this->horainicio;
    }
    public function setHorainicio($hora){
        $this->horainicio = $hora;
    }
    public function getHorafinal(){
        return $this->horafinal;
    }
    public function setHorafinal($hf){
        $this->horafinal = $hf;
    }
    public function getContenido(){
        return $this->contenido;
    }
    public function setContenido($contenido){
        $this->contenido = $contenido;
    }
    public function getIdprofesor(){
        return $this->idprofesor;
    }
    public function setIdprofesor($profe){
        $this->idprofesor = $profe;
    }

    public function getLimiteInscripciones(){
        return $this->limiteInscripciones;
    }
    public function setLimiteInscripciones($limite){
        $this->limiteInscripciones = $limite;
    }
    public function getFechainicio(){
        return $this->fechainicio;
    }
    public function setFechainicio($fecha){
        $this->fechainicio = $fecha;
    }

    public function getEstado_ocultar(){
        return $this->fechainicio;
    }
    public function setEstado_ocultar($estado){
        $this->estado_ocultar = $estado;
    }

    function getOne(){
        $sql = "SELECT * FROM curso WHERE idcurso = {$this->getId()}";
        $course = $this->db->query($sql);

        return $course->fetch_object();
    }

    public function getAllByAdmin(){
        $sql = "SELECT idcurso, curso.nombre as nombre, horainicio, horafinal, concat(profesor.nombre,' ',profesor.apellido) as idprofesor, limiteInscripciones ,fechainicio FROM curso
                INNER JOIN profesor ON profesor.idprofesor = curso.idprofesor ";
        $cursos = $this->db->query($sql);

        return $cursos;
    }

    public function getAllByUser(){
        $sql = "SELECT idcurso, curso.nombre as nombre, horainicio, horafinal, concat(profesor.nombre,' ',profesor.apellido) as idprofesor, limiteInscripciones ,fechainicio FROM curso
                INNER JOIN profesor ON profesor.idprofesor = curso.idprofesor WHERE estado_ocultar = 1";
        $cursos = $this->db->query($sql);

        return $cursos;
    }

    public function listaCursos($n_element, $n_elemet_page){
        $sql ="SELECT * FROM curso ORDER BY idcurso DESC
                LIMIT $n_element, $n_elemet_page";
        $cursolista = $this->db->query($sql);
        return $cursolista;
    }

    public function setMostrarCurso(){
      $result = false;
        $sql ="UPDATE curso SET estado_ocultar = {$this->estado_ocultar} WHERE idcurso = {$this->id}";
        $mostrarcurso = $this->db->query($sql);
        
        if ($mostrarcurso) {
          $result= true;
      }

      return $result;
    }

    public function getMostrarCurso(){
        $sql ="SELECT estado_ocultar FROM curso WHERE idcurso = {$this->id}";
        $estadocurso = $this->db->query($sql);
        echo $this->db->error;
        die();
        return $estadocurso;
    }

    public function save(){
      $result = false;
      $sql = "INSERT INTO curso VALUES (NULL ,
              '{$this->getNombre()}',
              '{$this->getNombrecorto()}',
              '{$this->getHorainicio()}',
              '{$this->getHorafinal()}',
              '{$this->getContenido()}',
              '{$this->getIdprofesor()}',
              '{$this->getLimiteInscripciones()}',
              '{$this->getFechainicio()}',
              0)";
      $save = $this->db->query($sql);
      //echo $this->db->error;
      //die();
      if ($save) {
          $result= true;
      }

      return $result;
    }

    public function editar(){
        $sql = "UPDATE curso SET
              nombre='{$this->getNombre()}',
              nombrecorto='{$this->getNombrecorto()}',
              horainicio='{$this->getHorainicio()}',
              horafinal='{$this->getHorafinal()}',
              contenido='{$this->getContenido()}',
              idprofesor='{$this->getIdprofesor()}',
              limiteInscripciones='{$this->getLimiteInscripciones()}',
              fechainicio='{$this->getFechainicio()}',
              estado_ocultar= 0
              WHERE idcurso={$this->id}";
        $edit = $this->db->query($sql);

        $result=false;
        if ($edit){
            $result = true;
        }

        return $result;
    }
    public function eliminar(){
        $sql = "DELETE FROM curso WHERE idcurso = {$this->id}";
        $delete = $this->db->query($sql);
        $result = false;

        if ($delete){
            $result = true;
        }
        return $result;
    }

    public function limiteInscritos(){
        $sql = "SELECT limiteInscripciones FROM curso WHERE nombre = {$this->nombre}";
        $limite = $this->db->query($sql);
        $result = false;

        if ($delete){
            $result = true;
        }
        return $result;
    }

}//fin de clase
