<?php if (isset($_SESSION['identity']) && $_SESSION['identity']->rol == 'admin'):?>

<label for=""></label>
<form action="<?=base_url?>usuariocontroller/buscar" method="POST"
      class="form-inline my-2 my-lg-0" id="buscar">
      <input class="form-control mr-sm-2"
             type="search"
             placeholder="Por Correo Institucional"
             aria-label="Search"
             name="busqueda">
      <input class="btn btn-outline-success my-2 my-sm-0"
              type="submit" value="BUSCAR"/>
</form>
<?php else: ?>
  <?php if (isset($_SESSION['identity']) && $_SESSION['identity']->rol == 'user'):?>
        <?php if (isset($_SESSION['curso']) && $_SESSION['curso']->limiteInscripciones == 0):?>

          <div class="alert alert-danger" role="alert">
            <strong>Ya se cubrio el cupo de las matriculas, Gracias pronto aperturaremos otro curso</strong>
          </div>
        <?php else: ?>
          <label for=""></label>
          <form action="<?=base_url?>usuariocontroller/buscarusuario" method="POST"
                class="form-inline my-2 my-lg-0" id="buscar">
                <input class="form-control mr-sm-2"
                       type="search"
                       placeholder="Por Correo Institucional"
                       aria-label="Search"
                       name="busqueda">
                <input class="btn btn-outline-success my-2 my-sm-0"
                        type="submit" value="BUSCAR"/>
          </form>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>
