<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>Certificado DUTIC</title>
		<link href="./assets/css/styleCertificado.css"
      rel="stylesheet" type="text/css">
      	
	</head>
	<body>
		<br><br><br>
		<br><br><br>
		<img src="<?=base_url?>assets/img/unsa.jpg"  width="200" height="80" class="unsa">
		<img src="<?=base_url?>assets/img/logodutic.png"  width="80" height="80" class="dutic">
		<br><br><br>
		<h1>Certificado de Reconocimiento</h1>
		<div id="contenido">		
			<p style="text-align: center;font-size: 20px">
				<strong> Otorgado a: </strong> 
			</p>
			<?php if(isset($_POST['titulo'])): ?>
				<h3><?=$_POST['titulo']?></h3>
			<?php endif; ?>

			<p style="text-align: center; font-family: Arial; font-size: 14px; line-height: 7px">
				Por haber culminado satisfactoriamente el curso de
			</p>
			<?php if(isset($_POST['curso'])): ?>
				<h4><?=$_POST['curso']?></h4>
			<?php endif; ?>

			<p>Ciudad de Arequipa, Perú 2019</p>
			<br><br>
		</div>
		
		<table>
			<tr>
				<td><div id="firma1">
					<hr/>
					<p>Robert Arisaca Mamani - Director</p>
				</div></td>
				<td><div id="firma2">
					<hr/>
					<p>Ana Maria Gutierrez Valdivia - Vicerrectora Académica</p>
				</div></td>
			</tr>
		</table>
				
	</body>
</html>