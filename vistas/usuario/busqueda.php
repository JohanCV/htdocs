<?php if(isset($_SESSION['buscarusercourse']) && $_SESSION['buscarusercourse'] == 'encontrado'):?>

      <div class="alert alert-success" role="alert">
          <strong>Bienvenido estimado Docente, para su matricula haga click en el boton Matricula</strong>
      </div>

<?php endif;?>
<?php require_once 'vistas/layout/buscar.php';
?>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <!--th scope="col">ESCUELA</th-->
        <th scope="col">NOMBRE y APELLIDOS</th>
        <th scope="col">EMAIL</th>
        <th scope="col">ACCIONES</th>
    </tr>
    </thead>

    <tbody>
      <?php
      if($buscar->num_rows ==0){
            echo "<h2>No hay resultados para su búsqueda...</h2>";
        }else{
          ?>
          <?php $contador = 1; ?>
              <?php while ($docente = $buscar->fetch_object() ): ?>
                  <tr>
                      <th scope="row"><?php echo $contador ?></th>
                      <!--td><//?= $docente->escuela; ?></td-->
                      <td><?= $docente->Docente; ?></td>
                      <td><?= $docente->email; ?></td>
                      <td>
                        <?php if(isset($_SESSION['buscarusercourse']) && $_SESSION['buscarusercourse'] == 'encontrado'):?>
                          <a href="<?=base_url?>cursocontroller/matricular&idoc=<?= $docente->idusu ?>"
                             class="btn btn-xs btn-danger">
                              <i class="fas fa-user-times"></i> Matricula</a>

                        <?php else:?>
                          <a href="<?=base_url?>usuariocontroller/editar&id=<?= $docente->idusu ?>"
                             class="btn btn-xs btn-warning">
                              <i class="fas fa-user-edit"></i> Editar</a>
                          <a href="<?=base_url?>usuariocontroller/eliminar&id=<?= $docente->idusu ?>"
                             class="btn btn-xs btn-danger">
                              <i class="fas fa-user-times"></i> Eliminar</a>
                        <?php endif;?>
                      </td>
                  </tr>
                  <?php $contador++;?>
              <?php endwhile; ?>

            <?php
        }
        ?>

    </tbody>
</table>
