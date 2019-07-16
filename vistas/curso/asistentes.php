<h3>MATRICULADOS</h3>
<?php if(isset($_SESSION['asistencia']) && $_SESSION['asistencia'] == 'completo'):?>
  <div class="alert alert-success" role="alert">
      <strong>Asistencia Registrada Exitosamente</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
<?php else:  ?>
  <?php if(isset($_SESSION['asistencia']) && $_SESSION['asistencia'] =='fallido'):?>
  <div class="alert alert-danger" role="alert">
      <strong>Asistencia No Registrada, Intentelo nuevamente</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <?php endif; ?>
<?php endif; ?>

<?php Utils::deleteSesion('asistencia'); ?>
<?php //require_once 'vistas/layout/buscar.php'?>

<nav id="menu" class="navbar sticky-top navbar-dark ">
    <ul class="navbar-nav">
        <?php if (isset($_SESSION['admin'])):?>
            <li class="nav-item">
                <a href="<?=base_url?>cursocontroller/index"
                   class="btn btn-xs btn-secondary">
                <i class="fas fa-chevron-circle-left fa-1x"> Regresar</i></a></li>

            <li class="nav-item"><a href="<?=base_url?>cursocontroller/asistencia&idasis=<?=$_GET['id']?>"
            class="btn btn-xs btn-secondary">
            <i class="fas fa-user-edit"></i> Asistentes</a></li>

            <li class="nav-item"><a href="<?=base_url?>cursocontroller/fechas&idcurso=<?=$_GET['id']?>"
            class="btn btn-xs btn-secondary">
            <i class="fas fa-user-edit"></i> Fechas</a></li>
            
        <?php endif; ?>
    </ul>
</nav>
<br>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">NOMBRES</th>
        <th scope="col">CURSO</th>
        <th scope="col">CURSO PRUEBA</th>
        <th scope="col">ESTADO</th>
        <th scope="col">ACCION</th>
    </tr>
    </thead>

    <tbody>
    <?php $contador = 1; ?>
        <?php while ($cursomatriculados = $cursomatri->fetch_object() ):?>
            <tr>
                <th scope="row"><?php echo $contador ?></th>
                <td><?= $cursomatriculados->idusu; ?></td>
                <td><?= $cursomatriculados->idcurso; ?></td>
                <td><?= $cursomatriculados->idcursoprueba; ?></td>
                <td><?= $cursomatriculados->estadoasistencia; ?></td>
                <td>
                    <a href="<?=base_url?>cursocontroller/marcarasistencia&idusu=<?= $cursomatriculados->iduc ?>&idcurso=<?= $_GET['id'] ?>"
                       class="btn btn-xs btn-danger">
                        <i class="fas fa-user-times"></i> Asistencia</a>
                </td>
            </tr>
            <?php $contador++; ?>
        <?php endwhile; ?>

    </tbody>
</table>
