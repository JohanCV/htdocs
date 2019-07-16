<label for=""></label>
<h3>FECHAS DEL CURSO</h3>

<nav id="menu" class="navbar sticky-top navbar-dark ">
    <ul class="navbar-nav">
        <?php if (isset($_SESSION['admin'])):?>
        	<li class="nav-item">
                <a href="<?=base_url?>cursocontroller/asistentes&id=<?=$_GET['idcurso']?>"
                   class="btn btn-xs btn-secondary">
                <i class="fas fa-chevron-circle-left fa-1x">Regresar</i></a></li>
            
            
        <?php endif; ?>
    </ul>
</nav>

<form action="<?=base_url?>cursocontroller/savefechas&idcurso=<?=$_GET['idcurso']?>" method="post">
    <br>
    <label for="">Dia de la semana:</label>

    <select class="form-control" name="diasemana" id=""  required="">
        <option value=""></option>
        <option value="1">Lunes</option>
        <option value="2">Martes</option>
        <option value="3">Miercoles</option>
        <option value="4">Jueves</option>
        <option value="5">Viernes</option>
    </select>
    <br>  

    <div class="form-label-group">
	    <label for="">Ingrese el Dia:</label>
	    <input 	type="text" name="dia"
	    		id="dia"  width="300" 
	            class="form-control" required="">        
	    </input>
	    <br> 
    </div>

    <div class="form-label-group">
    	<label>Ingrese el mes:</label>
    	<select type="text" name="mes"
    			class="form-control" placeholder="" required="">
    			<option value=""></option>
    			<option value="1">Enero</option>
		        <option value="2">Febrero</option>
		        <option value="3">Marzo</option>
		        <option value="4">Abril</option>
		        <option value="5">Mayo</option>
		        <option value="6">Junio</option>
		        <option value="7">Julio</option>
		        <option value="8">Agosto</option>
		        <option value="9">Setiembre</option>
		        <option value="10">Octubre</option>
		        <option value="11">Noviembre</option>
		        <option value="12">Diciembre</option>
    	</select> 
    	<br>
    </div>

    <div class="form-label-group">
    	<label>Ingrese el año:</label>
    	<select type="text" name="anio"
    			class="form-control" placeholder="" required="">
    			<option value="2019">2019</option>
		        <option value="2020">2020</option>
    	</select> 
    	<br>
    </div>

   

    <button class="btn btn-lg btn-success"
            data-toggle="modal"
            data-target="#exampleModal"
            type="submit">Agregar Fecha</button>

</form>

<label for=""></label>
<h4>Fechas Creadas del Curso</h4>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">FECHA</th>
    </tr>
    </thead>

    <tbody>
    <?php $contador = 1; ?>
        <?php while ($fechas = $fechasLista->fetch_object()):?>
            <tr>
                <th scope="row"><?php echo $contador ?></th>
                <td><?= $fechas->fecha ?></td>
            </tr>
            <?php $contador++; ?>
        <?php endwhile; ?>

    </tbody>
</table>
