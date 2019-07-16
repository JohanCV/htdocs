<h3> CURSOS DE CAPACITACION</h3>
<div class="alert alert-success" role="alert">
    <strong>Bienvenido estimado Docente, para inscribirse en un curso de capacitacion haga click en el icono circular i</strong>
</div>
<!--agregar cursos-->
<?php if (isset($_SESSION['identity'])): ?>
    <?php while ($curso = $CURSO->fetch_object()): ?>
        <div id="central">
            <div class="curso">
              <nav id="menu" class="navbar sticky-top navbar-dark ">
                  <ul class="navbar-nav">
                      <?php if (isset($_SESSION['user'])):?>
                          <li class="nav-item"><a class="nav-link" data-toggle="tooltip" data-placement="top" title="Inscripcion" href="<?=base_url?>cursocontroller/inscripcionusuario&id=<?= $curso->idcurso?>"> <i class="fas fa-info-circle fa-2x"></i></i></a></li>
                      <?php else: ?>
                        <?php if (isset($_SESSION['secre']) && $_SESSION['identity']->rol == 'secre'):?>
                          <li class="nav-item"><a class="nav-link" data-toggle="tooltip" data-placement="top" title="Informe" href="<?=base_url?>cursocontroller/informe&id=<?= $curso->idcurso?>"><i class="far fa-chart-bar fa-2x"></i></a> </li>
                          <li class="nav-item"><a class="nav-link" data-toggle="tooltip" data-placement="top" title="Inscripcion" href="<?=base_url?>cursocontroller/inscripcionusuario&id=<?= $curso->idcurso?>"> <i class="fas fa-info-circle fa-2x"></i></i></a></li>
                      
                        <?php endif; ?>
                      <?php endif; ?>

                  </ul>
              </nav>
                <img src="<?=base_url?>assets/img/moodle.png" alt="moodle">
                <h2><?= $curso->nombre; ?></h2>
                <p>Duración: <?= $curso->horainicio; ?>:  <?= $curso->horafinal; ?></p>
                <p>Dias: 24, 26 y 28 de junio</p>
                <p>Profesor: <?= $curso->idprofesor; ?></p>
                <h5>Fecha de Inicio: <?= $curso->fechainicio; ?> </h5>
                <h5>Limite de Inscripciones: <?= $curso->limiteInscripciones; ?> </h5>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif;?>
