<h3>ASISTENCIA</h3>

<?//php require_once 'vistas/layout/buscar.php'?>

<nav id="menu" class="navbar sticky-top navbar-dark ">
    <ul class="navbar-nav">
        <?php if (isset($_SESSION['admin'])):?>
            <li class="nav-item">
                <a href="<?=base_url?>cursocontroller/asistentes&id=<?=$_GET['idasis']?>"
                   class="btn btn-xs btn-secondary">
                <i class="fas fa-chevron-circle-left fa-1x"> Regresar</i></a></li>
            
            <li class="nav-item">
                <form action="" method="POST">
                    <button type="submit" id="export_excel" name='export_excel' value="Export to excel" >
                      <img id="imglogo"  src="<?=base_url?>assets/img/downloadexcel.png" alt="downloadexcel" width="50" height="40">
                    </button>
                </form>
            </li>     
            
        <?php endif; ?>
    </ul>
</nav>

<br>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Fecha</th>
        <th scope="col">Curso</th>
        <th scope="col">Docente</th>
        <th scope="col">Asistencia</th>
        <th scope="col">Nota</th>
    </tr>
    </thead>

    <tbody>
    <?php $contador = 1; ?>
        <?php while ($asis = mysqli_fetch_assoc($cursoasistencia) ): ?>
            <tr>
                <th scope="row"><?php echo $contador ?></th>

                <td><?= $asis["fecha"]?></td>
                <td><?= $asis["nombre"] ?></td>
                <td><?= $asis["Docente"] ?></td>
                <td><?= $asis["estado"] ?></td>
                <td><?= $asis["nota"]?></td>
            </tr>
            <?php $contador++; ?>
        <?php endwhile; ?>


    </tbody>
</table>
