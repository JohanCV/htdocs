<?php if (isset($_SESSION['identity'])):?>
  <h3> CURSOS DE CAPACITACION DOCENTE</h3>
<?php else: ?>
<?php $portada= new UsuarioController();
    $portada->portada();?>
<?php endif; ?>
<?php if(isset($_SESSION['edicion']) && $_SESSION['edicion']=='completo'):?>
    <div class="alert alert-success" role="alert">
        <strong>Curso editado correctamente</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif(isset($_SESSION['edicion']) && $_SESSION['edicion']=='fallido'): ?>
    <div class="alert alert-danger" role="alert">
        <strong>Curso no editado</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php Utils::deleteSesion('edicion'); ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete']=='completo'):?>
    <div class="alert alert-success" role="alert">
        <strong>Curso eliminado correctamente</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete']=='fallido'): ?>
    <div class="alert alert-danger" role="alert">
        <strong>Curso no eliminado</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php Utils::deleteSesion('delete'); ?>
<!--agregar cursos-->
<?php if (isset($_SESSION['identity']) && $_SESSION['identity']->rol == 'admin'):?>
    <div class="agregar">
        <a href="<?=base_url?>cursocontroller/crear" >
        <i class="fas fa-plus-circle fa-2x"></i>
        </a>
    </div>
    <?php while ($curso = $CURSO->fetch_object()): ?>
        <div id="central">
            <div class="curso">
              <nav id="menu" class="navbar sticky-top navbar-dark ">
                  <ul class="navbar-nav">
                      <?php if (isset($_SESSION['admin'])):?>
                          <li class="nav-item"><a class="nav-link" data-toggle="tooltip" data-placement="top" title="Inscripcion" href="<?=base_url?>cursocontroller/inscripcion&id=<?= $curso->idcurso?>"> <i class="fas fa-info-circle fa-2x"></i></i></a></li>
                          <li class="nav-item"><a class="nav-link" data-toggle="tooltip" data-placement="top" title="Asistencia" href="<?=base_url?>cursocontroller/asistentes&id=<?= $curso->idcurso?>"> <i class="fab fa-autoprefixer fa-2x"></i></a></li>
                          <li class="nav-item"><a class="nav-link" data-toggle="tooltip" data-placement="top" title="Seguimiento" href="<?=base_url?>cursocontroller/seguimiento&id=<?= $curso->idcurso?>"> <i class="fas fa-external-link-square-alt fa-2x"></i></a> </li>
                          <li class="nav-item"><a class="nav-link" data-toggle="tooltip" data-placement="top" title="Informe" href="<?=base_url?>cursocontroller/informe&id=<?= $curso->idcurso?>"><i class="far fa-chart-bar fa-2x"></i></a> </li>
                      <?php endif; ?>

                  </ul>
              </nav>

                <img src="<?=base_url?>assets/img/moodle.png" alt="moodle">
                <h2><?= $curso->nombre; ?></h2>
                <p>Duración: <?= $curso->horainicio; ?> -  <?= $curso->horafinal; ?></p>
                <p>Profesor: <?= $curso->idprofesor; ?></p>
                <h5>Fecha de Inicio: <?= $curso->fechainicio; ?> </h5>
                <h5>Limite de Inscripciones: <?= $curso->limiteInscripciones; ?> </h5>
                <a href="<?=base_url?>cursocontroller/editar&id=<?= $curso->idcurso?>"
                >
                    <i class="fas fa-edit"></i></a>
                <a href="<?=base_url?>cursocontroller/eliminar&id=<?= $curso->idcurso?>"
                >
                    <i class="far fa-trash-alt"></i></a>

                <a href="<?=base_url?>cursocontroller/mostrar&id=<?= $curso->idcurso?>">                   
                    <?php if(isset($_SESSION['ocultarCurso']) ):?>    <i class="far fa-eye-slash">ocultar</i>
                    <?php else: ?>
                        <i class="fas fa-eye"> mostrar</i>
                    <?php endif; ?>                     
                </a>

            </div>
        </div>
    <?php endwhile; ?>
<?php endif;?>
