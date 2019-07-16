<h3>CONTROL DE ASISTENCIA</h3>

<?php //require_once 'vistas/layout/buscar.php'?>

<form action="<?=base_url?>cursocontroller/saveasistencia&idcurso=<?=$_GET['idcurso']?>" method="post">
    <br>
    <label for="">Asistio si o no:</label>

    <select class="form-control" name="estado" id="" >
        <option value="no">No</option>
        <option value="si">Si</option>
    </select>
    <br>
    <label for="">Nota</label>
    <input class="form-control mr-sm-2" name="nota" placeholder="Ingrese la nota"
           required value="0">
    <label for=""></label>
    <br>

    <label for="">Fecha:</label>
    <?php $date = Utils::showFecha($_GET['idcurso']);?>
    <div class="form-label-group">
        <select class="form-control" name="fecha" id="" >
            <?php while ($fecha = $date->fetch_object() ):?>
                <option value="<?=$fecha->idfecha?>">
                    <?=$fecha->fecha?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <label for=""></label>
    <br>

    <!--div class="form-label-group">
        <label for="fecha">Ingrese la fecha de Asistencia</label>
        <input type="text" name="fecha" id="datepicker"  width="300" 
               class="form-control" placeholder="00/00/0000"
               value="<?= isset($edicion) && is_object($edicion) ? $edicion->fechainicio : ''; ?>">
        </input>
        <label for="fechaCurso"></label>
    </div>
    <script>
 
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script-->

    <label for="">Usuario:</label>
    <?php $uc = Utils::showUser($_GET['idusu']);?>
    <div class="form-label-group">
      <select class="form-control" name="user" id="" >
        <?php while ($usercur = $uc->fetch_object() ):?>
          <option value="<?=$usercur->iduc?>">
              <?=$usercur->docente?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>
    <br>
    <button class="btn btn-lg btn-success"
            data-toggle="modal"
            data-target="#exampleModal"
            type="submit">Asistio</button>

</form>
