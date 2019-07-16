<?php
// Ejemplo básico de la función mail() con PHP
class Email{
  private $Toemail;
  private $Asunto;
  private $Mensaje;

  public function __construct(){

  }

  public function getToemail(){
      return $this->Toemail;
  }
  public function setToemail($Toemail){
      $this->Toemail = $Toemail;
  }
  public function getAsunto(){
      return $this->Asunto;
  }
  public function setAsunto($Asunto){
      $this->Asunto = $Asunto;
  }
  public function getMensaje(){
      return $this->Mensaje;
  }
  public function setMensaje($Mensaje){
      $this->Mensaje = $Mensaje;
  }


  public function sendEmailVerificacion(){
    $result = false;
    $this->Toemail="nahoj1992@gmail.com";
    $this->Asunto = "Validacion de Matricula";
    $this->Mensaje ="Estimado docente su matricula al curso de capacitacion fue exitosa, lo esperamos este lunes para el inicio de sus clases.";

    $headers = 'dutic@unsa.edu.pe' . "\r\n";

    if(mail($this->Toemail, $this->Asunto, $this->Mensaje, $headers)){
      $result= true;
      return $result;
    }else{
      return $result;
    }

  }
}

?>
