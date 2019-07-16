<h3>INFORME DOCENTE</h3>

<?php require_once 'vistas/layout/buscarinforme.php'?>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">ESCUELA</th>
        <th scope="col">NOMBRES Y APELLIDOS</th>
        <th scope="col">SEGUIMIENTO</th>
        <th scope="col">ASISTENCIA</th>
        <th scope="col">PROMEDIO</th>
        <th scope="col">CONSTANCIA</th>
    </tr>
    </thead>

    <tbody>
    <?php $contador = 1; ?>
        <?php while ($infocert = $informecertificacion->fetch_object() ): ?>
            <tr>
                <th scope="row"><?php echo $contador ?></th>
                <td><?=$infocert->Escuela?></td>
                <td><?=$infocert->DocenteSeguimiento ?></td>
                <td><?=$infocert->NotaSeguimiento ?></td>
                <td><?=$infocert->NotaAsistencia ?></td>
                <td><?php $promedio = ($infocert->NotaSeguimiento + $infocert->NotaAsistencia )/2; echo $promedio; ?></td>
                <?php if (isset($promedio) && $promedio > 10 ):?>
                <td><a href="<?=base_url?>cursocontroller/certificado&iddocente=<?=$infocert->DocenteSeguimiento ?>&idcurso=<?=$infocert->Curso?>"
                   class="btn btn-xs btn-success">
                    <i class="fas fa-certificate"></i> Certificado</a></td>
                <?php else: ?>
                  <td><a href=""
                     class="btn btn-xs btn-danger">
                    <i class="fas fa-user-times"></i> No apto</a></td>
                <?php endif; ?>

            </tr>
            <?php $contador++; //var_dump($docente);?>
        <?php endwhile; ?>

    </tbody>
</table>
