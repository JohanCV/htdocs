<?php if ( isset($editnota) && $editnota == true && isset($editarnota) && is_object($editarnota) ): ?>
    <div class="text-center mb-4">
        <h3>EDICION DE LA NOTA DEL DOCENTE  <strong><?=$editarnota->docente?></strong> </h3>
        <?php $url_action = base_url."cursocontroller/seguimientopersonal&idsegcal=".$_GET['idsegcal']?>
    </div>
<?php else: ?>
    <div class="text-center mb-4">
        <h3>SEGUIMIENTO DEL DOCENTE <strong><?=$_GET['iduser']?></strong> </h3>
        <?php $url_action = base_url."cursocontroller/seguimientonota";?>
    </div>
<?php endif; ?>

<form action="<?=base_url?>cursocontroller/seguimientonotaedicion&idsegui=<?= $_GET['idsegcal']?>&idcurso=<?= $_GET['idcurso']?>"
    method="POST" class="form-signin">
    <input type="texto" name="nota" id="inputNota"
               class="form-control-sm" placeholder="Ingrese la Nota"
               required="" autofocus="" value="<?=isset($editarnota) && is_object($editarnota) ? $editarnota->nota : ''?>">
    <label for="inputNota"></label>
    <button class="btn btn-sm btn-warning"
                data-toggle="modal"
                data-target="#exampleModal"
                type="submit">Editar Nota</button>
</form>
