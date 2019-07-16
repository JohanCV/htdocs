<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="<?=base_url?>assets/css/style.css">

    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script src="../js/bootstrap-datepicker.js"></script>
    
    

    <title>DUTIC</title>
</head>
<body>
<div id="containergeneral">
    <!--cabecera>
    <header id="header" class="navbar navbar-light bg-dark"-->
    <header id="header" class="navbar navbar-light">
        <?php if (isset($_SESSION['identity'])):?>
            <div id = "imgCabecera">
              <img id="" src="<?=base_url?>assets/img/logodutic.png" alt="logoDutic" width="80" height="80">
            </div>
        <?php endif; ?>
            <div id="texto">
                <!--h1>SISTEMA DE GESTIÓN DE CURSOS PARA CAPACITAR DOCENTES</h1-->
                <h1>CURSOS DUTIC</h1>
            </div>
        <?php if (isset($_SESSION['identity'])):?>
            <div id="logout">
                <a href="<?=base_url?>usuariocontroller/logout">
                <i class="fas fa-sign-out-alt fa-3x"></i>Salir
                </a>
            </div>
        <?php endif; ?>
    </header>
