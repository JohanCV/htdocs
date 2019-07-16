<nav id="menu" class="navbar sticky-top navbar-dark ">
    <ul class="navbar-nav">
        <?php if (isset($_SESSION['admin'])):?>
            <li class="nav-item"><a class="nav-link" href="<?=base_url?>cursocontroller/inscripcion&id=<?= $curso->idcurso?>">Inscripcion</a></li>
            <li class="nav-item"><a class="nav-link" href="<?=base_url?>cursocontroller/asistentes&id=<?= $curso->idcurso?>">Asistencia</a></li>
            <li class="nav-item"><a class="nav-link" href="<?=base_url?>cursocontroller/seguimiento&id=<?= $curso->idcurso?>">Seguimiento</a> </li>
            <li class="nav-item"><a class="nav-link" href="<?=base_url?>cursocontroller/informe&id=<?= $curso->idcurso?>">Informe</a> </li>
            <li class="nav-item"><a class="nav-link" href="<?=base_url?>cursocontroller/recuperacion&id=<?= $curso->idcurso?>">Recuperacion</a> </li>
        <?php endif; ?>

    </ul>

</nav>
