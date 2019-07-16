<?php if (isset($_SESSION['identity'])):?>
<label for=""></label>
<form action="<?=base_url?>cursocontroller/buscar&idcurso=<?=$_GET['id']?>" method="POST"
      class="form-inline my-2 my-lg-0" id="buscar">
      <input class="form-control mr-sm-2"
             type="search"
             placeholder="Por DNI o APELLIDOS"
             aria-label="Search"
             name="busqueda">
      <input class="btn btn-outline-success my-2 my-sm-0"
              type="submit" value="BUSCAR"/>
</form>
<?php endif; ?>
