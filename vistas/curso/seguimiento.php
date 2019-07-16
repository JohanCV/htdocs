<h3>SEGUIMIENTO DOCENTE</h3>
<?php if(isset($_SESSION['segnota']) && $_SESSION['segnota']=='completo'):?>
    <div class="alert alert-success" role="alert">
        <strong>Nota Registrada</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php endif; ?>
<?php Utils::deleteSesion('segnota'); ?>
<?php //require_once 'vistas/layout/buscar.php'?>
<a href="<?=base_url?>cursocontroller/seguimientocalificaciones&id=<?=$_GET['id']?>"
   class="btn btn-xs btn-secondary">
    <i class="fas fa-book-open"></i> Calificaciones</a>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">NOMBRES</th>
        <th scope="col">CURSO PRUEBA</th>
        <th scope="col">ACCION</th>
    </tr>
    </thead>

    <tbody>
    <?php $contador = 1; ?>
        <?php while ($seguimiento = $cursomatri->fetch_object() ): ?>
            <tr>
                <th scope="row"><?php echo $contador ?></th>
                <td><?= $seguimiento->idusu ?></td>
                <td><?= $seguimiento->idcursoprueba ?></td>
                <td><a href="<?=base_url?>cursocontroller/seguimietnopersonal&idcurso=<?= $_GET['id']?>&idcp=<?= $seguimiento->idcursoprueba ?>&iduser=<?= $seguimiento->idusu ?>&iducu=<?= $seguimiento->iduc ?>"
                   class="btn btn-xs btn-danger">
                    <i class="fas fa-user-times"></i> seguimiento</a>
                </td>
            </tr>
            <?php $contador++; ?>
        <?php endwhile; ?>

    </tbody>
</table>
