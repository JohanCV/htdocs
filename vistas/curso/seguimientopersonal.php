<?php if ( isset($editnota) && $editnota == true && isset($editarnota) && is_object($editarnota) ): ?>
    <div class="text-center mb-4">
        <h3>EDICION DE LA NOTA DEL DOCENTE  <strong><?=$editarnota->docente?></strong> </h3>
        <?php $url_action = base_url."cursocontroller/seguimientonota&idsegcal=".$_GET['idsegcal']?>
    </div>
<?php else: ?>
    <div class="text-center mb-4">
        <h3>SEGUIMIENTO DEL DOCENTE <strong><?=$_GET['iduser']?></strong> </h3>
        <?php $url_action = base_url."cursocontroller/seguimientonota";?>
    </div>
<?php endif; ?>


<?php // require_once 'vistas/layout/buscar.php'?>
<a href="<?=base_url?>cursocontroller/seguimiento&id=<?=$_GET['idcurso']?>"
   class="btn btn-xs btn-secondary">
    <i class="fas fa-chevron-circle-left fa-1x"></i></a>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">archivos</th>
        <th scope="col">tareas</th>
        <th scope="col">cuestionarios</th>
        <th scope="col">foros</th>
        <th scope="col">encuesta</th>
    </tr>
    </thead>

    <tbody>

    <?php $contador = 1; ?>
        <?php while ($seguipersonal = $seguimiento->fetch_object() ): ?>
            <tr>
                <th scope="row"><?php echo $contador ?></th>
                <td><?= $seguipersonal->Archivos?></td>
                <td><?= $seguipersonal->Tareas ?></td>
                <td><?= $seguipersonal->Cuestionarios ?></td>
                <td><?= $seguipersonal->forum ?></td>
                <td><?= $seguipersonal->encuesta ?></td>
            </tr>
            <?php $contador++; ?>
        <?php endwhile; ?>

    </tbody>
</table>
<form action="<?=base_url?>cursocontroller/seguimientonota&idcp=<?=$_GET['idcp']?>&iduser=<?=$_GET['iduser']?>&idcurso=<?= $_GET['idcurso']?>&iduc=<?= $_GET['iducu']?>"
    method="POST" class="form-signin">
    <input type="texto" name="nota" id="inputNota"
               class="form-control-sm" placeholder="Ingrese la Nota"
               required="" autofocus="" value="<?=isset($editarnota) && is_object($editarnota) ? $editarnota->nota : ''?>">
    <label for="inputNota"></label>
    <button class="btn btn-sm btn-primary"
                data-toggle="modal"
                data-target="#exampleModal"
                type="submit">Registrar Nota</button>
</form>
