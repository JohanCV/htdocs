<h3>SEGUIMIENTO DEL DOCENTE</h3>

<?php // require_once 'vistas/layout/buscar.php'?>
<a href="<?=base_url?>cursocontroller/seguimiento&id=<?=$_GET['id']?>"
   class="btn btn-xs btn-secondary">
    <i class="fas fa-chevron-circle-left fa-1x"></i></a>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">CURSO PRUEBA</th>
        <th scope="col">NOTA</th>
        <th scope="col">ACCION</th>
    </tr>
    </thead>

    <tbody>
    <?php $contador = 1; ?>
        <?php while ($calificacion = $seguimientocalificado->fetch_object() ): ?>
            <tr>
                <th scope="row"><?php echo $contador ?></th>
                <td><?= $calificacion->docente?></td>
                <td><?= $calificacion->cursoprueba ?></td>
                <td><?= $calificacion->nota ?></td>
                <td>
                    <a href="<?=base_url?>cursocontroller/editarnota&idsegcal=<?= $calificacion->idseg ?>&idcurso=<?= $_GET['id']?>"
                       class="btn btn-xs btn-warning">
                        <i class="fas fa-user-edit"></i> Editar</a>
                </td>
            </tr>
            <?php $contador++; ?>
        <?php endwhile; ?>

    </tbody>
</table>
