<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

</head>

<?php if (isset($_SESSION['identity'])):?>
    <!--menu lateral -->
    <aside id="menulateral">
        <div class="sidebar-header">
            <strong>Bienvenid@ </strong>
            <br>
            <strong>
                <?= $_SESSION['identity']->nombre ?>
                <?= $_SESSION['identity']->apellidos ?>
            </strong>
        </div>
        <?php if (isset($_SESSION['identity']->rol) && $_SESSION['identity']->rol == 'user' || $_SESSION['identity']->rol == 'secre'):?>
          <ul>
              <li><a href="<?=base_url?>cursocontroller/usuario" name="clickcursos">
                      <i class="fas fa-chalkboard-teacher"></i> CURSOS</a></li>

          </ul>
        <?php else:?>
          <ul>
              <li><a href="<?=base_url?>cursocontroller/index" name="clickcursos">
                      <i class="fas fa-chalkboard-teacher"></i> CURSOS</a></li>
              <li><a href="<?=base_url?>usuariocontroller/listadocentes" name="clickdocente">
                      <i class="fas fa-user-graduate"></i> DOCENTES</a></li>
              <li><a href="<?=base_url?>usuariocontroller/report">
                      <i class="fas fa-chart-line"></i> REPORTES</a></li>

          </ul>

        <?php endif; ?>
    </aside>

<?php  ?>
<?php elseif(!isset($_SESSION['identity'])):?>
    <!--menu lateral -->
    <aside id="menulateral">

        <?php require_once 'vistas/usuario/login.php'?>

    </aside>

<?php endif; ?>
