<?php if (isset($edit) && $edit == true && isset($usuario) && is_object($usuario)): ?>
    <div class="text-center mb-4">
        <img class="mb-4" src="<?=base_url?>assets/img/logodutic.png" alt="logoDutic" width="100" height="100">
        <h3>EDICION DEL DOCENTE <?=$usuario->nombre?> </h3>
        <?php $url_action = base_url."usuariocontroller/save&id=$usuario->idusu";?>
    </div>
<?php else: ?>
    <div class="text-center mb-4">
        <img class="mb-4" src="<?=base_url?>assets/img/logodutic.png" alt="logoDutic" width="100" height="100">
        <h3>CREACION DE DOCENTES</h3>
        <?php $url_action = base_url."usuariocontroller/save";?>
    </div>
<?php endif; ?>
<form action="<?= $url_action ?>" method="POST" class="form-signin">

    <div class="form-label-group">
        <input type="texto" name="nombre" id="inputNombre"
               class="form-control" placeholder="Ingrese su Nombre"
               required="" autofocus=""
               value="<?= isset($usuario) && is_object($usuario)?$usuario->nombre : ''; ?>">
        <label for="inputNombre"></label>
    </div>

    <div class="form-label-group">
        <input type="texto" name="apellidos" id="inputApellido"
               class="form-control" placeholder="Ingrese sus Apellidos" required="" autofocus=""
               value="<?= isset($usuario) && is_object($usuario)?$usuario->apellidos : ''; ?>">
        <label for="inputApellido"></label>
    </div>

    <div class="form-label-group">
        <input type="email" name="email" id="inputEmail"
               class="form-control" placeholder="Ingrese su Correo Institucional" required="" autofocus=""
               value="<?= isset($usuario) && is_object($usuario)?$usuario->email : ''; ?>">
        <label for="inputEmail"></label>
    </div>

    <div class="form-label-group">
        <input type="text" name="dni" id="inputDNI"
               class="form-control" placeholder="Ingrese su DNI" 
               >
        <label for="inputDNI"></label>
    </div>

    <?php $school = Utils::showEscuelas();?>
    <div class="form-label-group">
        <select class="form-control" name="escuelas" id="" >
            <?php while ($esc = $school->fetch_object() ): ?>
                <option value="<?=$esc->ides;?>"
                  <?= isset($usuario) && is_object($usuario) && $esc->ides == $usuario->ides ? 'selected' : ''; ?>>
                    <?=$esc->nombre?>
                </option>
            <?php endwhile; ?>
        </select>
        <label for="inputEscuela"></label>
    </div>

    <?php if (isset($edit) && $edit == true): ?>
        <button class="btn btn-lg btn-warning"
                data-toggle="modal"
                data-target="#exampleModal"
                type="submit">Editar Docente</button>
        <a href="<?php base_url?>listadocentes"
           class="btn btn-lg btn-danger">Cancelar</a>

    <?php else: ?>
        <button class="btn btn-lg btn-primary"
                data-toggle="modal"
                data-target="#exampleModal"
                type="submit">Registrar Docente</button>
        <a href="<?php base_url?>listadocentes"
           class="btn btn-lg btn-danger">Cancelar</a>
    <?php endif; ?>
</form>
