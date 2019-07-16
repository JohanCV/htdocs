<?php $cursosmatricula = $cursomatri->fetch_object();?>

<h3>MATRICULADOS EN <?= $cursosmatricula->idcurso?></h3>
<div class="alert alert-success" role="alert">
  <strong>Bienvenido estimado Docente, para su matricula vaya al campo buscar e ingrese su correo institucional, por ejemplo: jgutierrez@unsa.edu.pe, si aun no se inscribio.
     <br> Inscripciones Limitadas: 15 docentes por curso</strong></div>

<?php require_once 'vistas/layout/buscar.php'?>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <!--th scope="col">ESCUELA</th-->
        <th scope="col">NOMBRES</th>
        <th scope="col">CURSO</th>
        <th scope="col">CURSO PRUEBA</th>
        <th scope="col">EMAIL</th>
        <th scope="col">ACCION</th>
    </tr>
    </thead>

    <tbody>
    <!--//?php $emailUsuario = Utils::showEmail($cursomatriculados->idusu);?-->
    <?php $contador = 1; ?>
        <?php while ($cursomatriculados = $cursomatri->fetch_object() ):?>

            <tr>
                <th scope="row"><?php echo $contador ?></th>
                <!--td><//?= $cursomatriculados->Escuela; ?></td-->
                <td><?= $cursomatriculados->idusu; ?></td>
                <td><?= $cursomatriculados->idcurso; ?></td>
                <td><?= $cursomatriculados->idcursoprueba; ?></td>
                <td><?= $cursomatriculados->email; ?></td>
                <td>
                    <a href="<?=base_url?>cursocontroller/inscripcion&idusu=<?= $cursomatriculados->iduc ?>"
                       class="btn btn-xs btn-danger">
                        <i class="fas fa-user-times"></i> Desmatricular</a>
                </td>
            </tr>
            <?php $contador++; ?>
        <?php endwhile; ?>

    </tbody>
</table>
