<h3>MATRICULA DOCENTE</h3>
<div class="alert alert-success" role="alert">
    <strong>Bienvenido estimado Docente, haga click en el boton Matricular.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php //require_once 'vistas/layout/buscar.php'?>
<form action="<?=base_url?>cursocontroller/savematricula" method="post">
  <?php if(isset($_SESSION['buscarusercourse']) && $_SESSION['buscarusercourse'] == 'encontrado'):?>

    <input class="form-control mr-sm-2" name="estado"
           value="si">
    <label for=""></label>

    <!--input class="form-control mr-sm-2" name="estado"
           value="?var=<//?php base64_encode('si')?>">
    <label for=""></label-->

    <!--a href="?var=<//?php echo base64_encode('valor')?>">Enviar</a-->

    <?php //$iddocente = $_GET['idoc']?>
    <input class="form-control mr-sm-2" name="usuario" value="<?=$_GET['idoc']?>"
           placeholder="">
    <label for=""></label>
    <?php $cursoutil = Utils::showCurso();?>
    <div class="form-label-group">
        <select class="form-control" name="curso" id="" >
            <?php while ($c = $cursoutil->fetch_object() ):?>
                <option value="<?=$c->idcurso?>">
                    <?=$c->nombre?>
                </option>
            <?php endwhile; ?>
        </select>
        <label for="inputCP"></label>
    </div>


    <?php $cursoprueb = Utils::showCursoPrueba();?>
    <div class="form-label-group">
        <select class="form-control" name="cursoprueba" id="" >
            <?php while ($cp = $cursoprueb->fetch_object() ): var_dump($cp);?>
                <option value="<?=$cp->idcursoprueba ?>"
                  <?= isset($trycourse) && is_object($trycourse) && $cp->idcursoprueba == $trycourse->idcursoprueba ? 'selected' : ''; ?>>
                    <?=$cp->nombrecp?>
                </option>
            <?php endwhile; ?>
        </select>
        <label for="inputCP"></label>
    </div>

    <button class="btn btn-lg btn-warning"
            data-toggle="modal"
            data-target="#exampleModal" name="btn_matricula"
            type="submit">Matricular</button>

  <?php endif;?>
</form>
