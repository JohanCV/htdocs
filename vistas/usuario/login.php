<?php if(isset($_SESSION['error_login']) && $_SESSION['error_login']=='fallido'): ?>
    <div class="alert alert-danger" role="alert">
        <strong>Datos Incorrectos</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>


<?php if (!isset($_SESSION['identity'])):?>
    <?php Utils::deleteSesion('error_login'); ?>
<form action="<?=base_url?>usuariocontroller/login" method="POST" class="form-signin">
                <div class="text-center mb-4">
                <img id="imglogo" class="mb-4" src="<?=base_url?>assets/img/logodutic.png" alt="logoDutic" width="100" height="100">
                <h3 class="h3 mb-3 font-weight-bold">INICIO DE SESIÓN</h3>
                <p>Sistema de Gestión de Cursos para Capacitar a Docentes acerca del 
                    <a href="http://dutic.unsa.edu.pe/aulavirtual">Aula Virtual</a></p>
                </div>
        
                <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Ingrese su Correo Institucional" required="" autofocus="">
                <label for="inputEmail"></label>
                </div>
        
                <div class="form-label-group">
                <input type="password" name="dnipassword" id="inputPassword" class="form-control" placeholder="Ingrese su DNI" required="">
                <label for="inputPassword"></label>
                </div>  
                
                <button class="btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
</form>

<?php endif; ?>