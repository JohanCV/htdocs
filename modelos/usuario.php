<?php
class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $dnipassword;
    private $rol;
    private $ides;

    private $db;
    private $valor;

    public function __construct(){
      $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getApellido(){
        return $this->apellidos;
    }
    function getEmail(){
        return $this->email;
    }
    function getDnipassword(){
        return password_hash($this->db->real_escape_string(
            $this->dnipassword),PASSWORD_DEFAULT);
    }
    function getRol(){
        return $this->rol;
    }
    function getEscuela(){
        return $this->ides;
    }
    function getValor(){
        return $this->valor;
    }

    function setId($id){
        $this->id = $id;
    }
    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string(strtoupper($nombre));
    }
    function setApellidos($apellidos){
        $this->apellidos = $this->db->real_escape_string(strtoupper($apellidos));
    }
    function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }
    function setDnipassword($dnipassword){
        $this->dnipassword = $dnipassword;
    }
    function setRol($rol){
        $this->rol = $rol;
    }
    function setEscuela($scuela){
        $this->ides = $this->db->real_escape_string(strtoupper($scuela));
    }
    function setValor($valor){
        $this->valor = $this->db->real_escape_string(strtoupper($valor));
    }
    function getOne(){
        $sql = "SELECT * FROM usuarios WHERE idusu = {$this->getId()}";
        $user = $this->db->query($sql);

        return $user->fetch_object();
    }
    function getAll(){
        $sql = "SELECT idusu, escuela.nombre as escuela, concat(usuarios.apellidos,', ' ,usuarios.nombre) AS Docente, email FROM `usuarios`
                INNER JOIN escuela on escuela.ides = usuarios.ides ORDER BY idusu DESC ";
        $users = $this->db->query($sql);

        return $users;
    }
    function getEmailshow($idusu){
        $sql = "SELECT idusu, email FROM usuarios WHERE idusu = {$idusu}";
        $user = $this->db->query($sql);
        var_dump($user);
        return $user->fetch_object();
    }
    public function save(){
      $result = false;
      $sql = "INSERT INTO usuarios VALUES (NULL ,
              '{$this->getNombre()}',
              '{$this->getApellido()}',
              '{$this->getEmail()}',
              '{$this->getDnipassword()}',
              'user',
              '{$this->getEscuela()}')";
      $save = $this->db->query($sql);
      //echo $this->db->error;
      //die();
      if ($save) {
          $result= true;
      }

      return $result;
    }
    public function login(){
        $result = false;
        $email = $this->email;
        $dnipassword = $this->dnipassword;

        //comprobar si exite el usaurio
        $sql = "SELECT idusu, nombre,apellidos, email, dnipassword, rol FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);
        //echo $this->db->error;
        //die();
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
            $dni= $usuario->dnipassword;

            //verificar la contraseña
            $verify = password_verify($dnipassword, $dni);

            if($verify){
                $result = $usuario;
            }
        }
        return $result;
    }

    public function listadocentes($n_element, $n_elemet_page){
        $sql ="SELECT * FROM usuarios ORDER BY idusu DESC
                LIMIT $n_element, $n_elemet_page";
        $docenteslista = $this->db->query($sql);
        return $docenteslista;
    }
    public function editar(){
        $sql = "UPDATE usuarios SET
              nombre='{$this->getNombre()}',
              apellidos='{$this->getApellido()}',
              email='{$this->getEmail()}',
              dnipassword='{$this->getDnipassword()}',
              ides='{$this->getEscuela()}'
              WHERE idusu={$this->id}";
        $edit = $this->db->query($sql);
        //echo $this->db->error;
        //die();
        $result=false;
        if ($edit){
            $result = true;
        }

        return $result;
    }
    public function eliminar(){
        $sql = "DELETE FROM usuarios WHERE idusu = {$this->id} ";
        $delete = $this->db->query($sql);
        $result = false;

        if ($delete){
            $result = true;
        }
        return $result;
    }
    public function search($busqueda){
        if (!empty($busqueda)) {
          $dni = $this->getDnipassword();
          $sql ="SELECT escuela.nombre as escuela, concat(usuarios.apellidos,', ' ,usuarios.nombre) AS Docente, email, idusu FROM usuarios
                 INNER JOIN escuela on escuela.ides = usuarios.ides
                 WHERE dnipassword  LIKE '%$dni%' || apellidos LIKE '%$busqueda%' || email LIKE '%$busqueda%' ";
          $search = $this->db->query($sql);

        }else {
          $search = NULL;
        }
        return $search;
    }

}
