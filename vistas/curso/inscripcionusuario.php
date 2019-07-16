<h3>MATRICULA</h3>
<div class="alert alert-primary" role="alert">
    <!--strong>Bienvenido estimado Docente, para su matricula vaya al campo "BUSCAR" e ingrese su correo institucional.
      <br> Por ejemplo: jgutierrez@unsa.edu.pe, si aun no se inscribio.
    </strong-->
    <strong> Estimado docente se completaron los 15 cupos del curso, pronto se publicara una nueva fecha de apertura del mismo curso.

    </strong>
</div>
<div class="alert alert-warning" role="alert">
    <strong> Indicaciones del Curso:
       <br> Inscripciones Limitadas: 15 docentes por curso
       <br> Duracion: 24, 26 y 28 de junio.
       <br> Cada sesión es de 2horas en total son 6 horas presenciales.
       <br> Fecha Limite de Inscripción: 23 de junio.
    </strong>
</div>
<!--div class="alert alert-primary" role="alert">
    <//?php if(isset($_SESSION['matricula']) && $_SESSION['matricula'] == 'emailexitoso') : ?>
      <strong>Matricula fallido   </strong>

</div>
<div class="alert alert-danger" role="alert">
<//?php elseif(isset($_SESSION['matricula']) && $_SESSION['matricula'] == 'emailfallido'): ?>
      <strong>Matricula exitosa    </strong>

    <//?php endif; ?>

</div-->

<//?php require_once 'vistas/layout/buscar.php'?>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <!--th scope="col">ESCUELA</th-->
        <th scope="col">NOMBRES</th>
        <th scope="col">CURSO</th>
        <th scope="col">CURSO PRUEBA</th>
        <?php if (isset($_SESSION['admin'])):?>
            <th scope="col">ACCION</th>
        <?php endif; ?>

    </tr>
    </thead>

    <tbody>
    <?php $contador = 1; ?>
        <?php while ($cursomatriculados = $cursomatri->fetch_object() ):?>
            <tr>
                <th scope="row"><?php echo $contador ?></th>
                <!--td><//?= //$cursomatriculados->Escuela; ?></td-->
                <td><?= $cursomatriculados->idusu; ?></td>
                <td><?= $cursomatriculados->idcurso; ?></td>
                <td><?= $cursomatriculados->idcursoprueba; ?></td>
                <?php if (isset($_SESSION['identity']) && $_SESSION['identity']->rol == 'user' && $_SESSION['identity']->nombre.' '.$_SESSION['identity']->apellidos == $cursomatriculados->idusu) :?>
                  <td>
                      <a href="<?=base_url?>cursocontroller/inscripcionusuario&idusu=<?= $cursomatriculados->iduc ?>"
                         class="btn btn-xs btn-danger">
                          <i class="fas fa-user-times"></i> Desmatricular</a>
                  </td>
                <?php endif; ?>
            </tr>
            <?php $contador++; ?>
        <?php endwhile; ?>

    </tbody>
</table>
