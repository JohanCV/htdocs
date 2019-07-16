<?php
require_once 'modelos/usuario.php';

class UsuarioController{
    public function index(){
        require_once 'vistas/curso/listacursos.php';

    }

    public function registro(){
        Utils::isAdmin();
        require_once 'vistas/usuario/registro.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            //verificando si los datos existen
            $nombre=isset($_POST['nombre']) ? $_POST['nombre']:false;var_dump($nombre);
            $apellidos=isset($_POST['apellidos'])?$_POST['apellidos']:false;var_dump($apellidos);
            $email=isset($_POST['email'])?$_POST['email']:false;var_dump($email);
            $dni=isset($_POST['dni'])?$_POST['dni']:false;var_dump($dni);
            $escuela=isset($_POST['escuelas'])?$_POST['escuelas']:false;var_dump($escuela);
            echo "entro post ";
            if($nombre && $apellidos && $email && $dni && $escuela){echo "entro if ";
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setDnipassword($dni);
                $usuario->setEscuela($escuela);
                  //var_dump($usuario);
                //Editar usuario
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $usuario->setId($id);
                    $save = $usuario->editar();

                }else{
                    $save = $usuario->save();
                }

                if($save){
                    $_SESSION['register'] = "completo";
                }else{
                    $_SESSION['register'] = "fallido";
                }
            }else{
                 $_SESSION['register'] = "fallido";
            }
        }else{
            $_SESSION['register'] = "fallido";
        }
        header("Location:".base_url.'usuariocontroller/listadocentes');
    }

    public function login(){
        if(isset($_POST)){
            //consulta a la base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setDnipassword($_POST['dnipassword']);

            $identity = $usuario->login();

            //identificar al usuario
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                //var_dump($_SESSION['identity']);
                if ($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;//echo "administrador";
                    header("Location:".base_url.'cursocontroller/index');
                }else {
                  if ($identity->rol == 'user') {
                    $_SESSION['user'] = true;
                    header("Location:".base_url.'cursocontroller/usuario');
                  }else {
                    if ($identity->rol == 'secre') {
                      $_SESSION['secre'] = true;
                      header("Location:".base_url.'cursocontroller/usuario');
                    }
                  }
                }
            }else{
                $_SESSION['error_login']='fallido';
            }
        }
       //header("Location:".base_url.'cursocontroller/index');
    }

    public function logout(){
        if (isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        if (isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        session_destroy();
        header("Location:".base_url);
    }
    public function listadocentes(){
        Utils::isAdmin();
        $docente = new Usuario();
        $PRO = $docente->getAll();

        include 'vistas/usuario/listadocentes.php';
    }

    public function editar(){
        Utils::isAdmin();

        if (isset($_GET['id'])){
            $edit = true;
            $id = $_GET['id'];
            $user = new Usuario();
            $user->setId($id);
            $usuario = $user->getOne();
            require_once 'vistas/usuario/registro.php';
        }else{
            header("Location:".base_url.'usuariocontroller/listadocentes');
        }

    }
    public function eliminar(){
        Utils::isAdmin();

        if (isset($_GET['id'])){
            $user = new Usuario();
            $user->setId($_GET['id']);
            $delete = $user->eliminar();

            if ($delete){
                $_SESSION['delete']= 'completo';
            }else{
                $_SESSION['delete']= 'fallido';
            }
        }else{
            $_SESSION['delete']= 'fallido';
        }

        header("Location:".base_url.'usuariocontroller/listadocentes');
    }
    public function  buscar(){
        Utils::isAdmin();

        if (isset($_POST['busqueda'])){
            $buscarentradas = $_POST['busqueda'];
            $docentes = new Usuario();

            if (is_numeric($buscarentradas)){
                $dni =$docentes->setDnipassword($buscarentradas);

                $buscar = $docentes->search($buscarentradas);
                $PRO = $docentes->getAll();
                require_once 'vistas/usuario/busqueda.php';

            }else{
              $buscar = $docentes->search($buscarentradas);
              $PRO = $docentes->getAll();
              require_once 'vistas/usuario/busqueda.php';
            }
        }else{
            if ($_SESSION['identity']->rol == 'user') {
              header("Location:".base_url.'cursocontroller/usuario');
            }else {
                header("Location:".base_url.'usuariocontroller/listadocentes');
            }
        }
    }

    public function  buscarusuario(){
        Utils::isUser();
        //aqui hacer el  limite de docentes
        if (isset($_POST['busqueda'])){
            $buscarentradas = $_POST['busqueda'];
            $docentes = new Usuario();

            if (is_numeric($buscarentradas)){
                $dni =$docentes->setDnipassword($buscarentradas);

                $buscar = $docentes->search($buscarentradas);
                $PRO = $docentes->getAll();
                require_once 'vistas/usuario/busqueda.php';

            }else{
              $buscar = $docentes->search($buscarentradas);
              $PRO = $docentes->getAll();
              require_once 'vistas/usuario/busqueda.php';
            }
        }else{
            if (isset($_SESSION['identity']) && $_SESSION['identity']->rol == 'user') {
              header("Location:".base_url.'cursocontroller/usuario');
            }else {
                header("Location:".base_url.'usuariocontroller/listadocentes');
            }
        }
    }

    public function report(){
        Utils::isAdmin();
        require_once 'vistas/reportes/reportes.php';
    }
    public function portada(){
        require_once 'vistas/layout/portada.php';
    }
}//fin class

?>
