
<head>
    
<meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
<h3>DOCENTES AGUSTINOS<a href="<?=base_url?>usuariocontroller/registro">
                <i class="fas fa-user-plus"></i>
             </a>
</h3>
<?php if(isset($_SESSION['register']) && $_SESSION['register']=='completo'):?>
    <div class="alert alert-success" role="alert">
        <strong>Docente creado correctamente</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register']=='fallido'): ?>
    <div class="alert alert-danger" role="alert">
        <strong>Docente no creado, Introduzca bien los datos</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php Utils::deleteSesion('register'); ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete']=='completo'):?>
    <div class="alert alert-success" role="alert">
        <strong>Docente eliminado correctamente</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete']=='fallido'): ?>
    <div class="alert alert-danger" role="alert">
        <strong>Docente no eliminado</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php Utils::deleteSesion('delete'); ?>

<?php require_once 'vistas/layout/buscar.php'?>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">ESCUELA</th>
        <th scope="col">NOMBRE y APELLIDOS</th>
        <th scope="col">EMAIL</th>
        <th scope="col">ACCIONES</th>
    </tr>
    </thead>

    <tbody>
    <?php $contador = 1; ?>
        <?php while ($docente = $PRO->fetch_object() ): ?>
            <tr>
                <th scope="row"><?php echo $contador ?></th>
                <td><?= $docente->escuela; ?></td>
                <td><?= $docente->Docente; ?></td>
                <td><?= $docente->email; ?></td>
                <td>
                    <a href="<?=base_url?>usuariocontroller/editar&id=<?= $docente->idusu ?>"
                       class="btn btn-xs btn-warning">
                        <i class="fas fa-user-edit"></i> Editar</a>
                    <a href="<?=base_url?>usuariocontroller/eliminar&id=<?= $docente->idusu ?>"
                       class="btn btn-xs btn-danger">
                        <i class="fas fa-user-times"></i> Eliminar</a>
                </td>
            </tr>
            <?php $contador++; //var_dump($docente);?>
        <?php endwhile; ?>

    </tbody>
</table>
</body>