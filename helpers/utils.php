<?php
class Utils{
    public static function deleteSesion($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin(){
        if (!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }
    }

    public static function isUser(){
        if (!isset($_SESSION['identity'])){
            header("Location:".base_url/cursocontroller/usuario);
        }else{
            return true;
        }
    }

    public static function showEscuelas(){
        require_once 'modelos/escuela.php';
        $escuelas = new Escuela();
        $escuela = $escuelas->getAll();

        return $escuela;
    }

    public static function showProfesor(){
        require_once 'modelos/profesor.php';
        $pro = new Profesor();
        $teach = $pro->getAll();

        return $teach;
    }

    public static function showCursoPrueba(){
        require_once 'modelos/cursoprueba.php';
        $cp = new Cursoprueba();
        $cursoprueba = $cp->getAll();

        return $cursoprueba;
    }
    public static function showCurso(){
        require_once 'modelos/curso.php';
        $c = new Curso();
        $curso= $c->getAll();

        return $curso;
    }
    public static function showFecha($idcurso){
      require_once 'modelos/fecha.php';
      $fech = new Fecha();
      $fechas = $fech->getOne($idcurso);

      return $fechas;
    }

    public static function showUser($idusuc){
      require_once 'modelos/usuariocurso.php';
      $uc = new Usuariocurso();
      $usercurso = $uc->getOneTeach($idusuc);

      return $usercurso;
    }
    public static function showEmail($idusuc){
      require_once 'modelos/usuariocurso.php';
      $uc = new Usuario();
      $useremail = $uc->getEmailshow($idusuc);

      return $useremail;
    }
}
