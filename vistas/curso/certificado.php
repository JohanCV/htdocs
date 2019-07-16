<h3>GENERACION DEL CERTIFICADO</h3>
<?php
//require_once '../library/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

//require_once './library/vendor/autoload.php';

if(isset($_POST['crear'])){
	try {
		ob_start();
		require_once 'print_view.php';
	    //include dirname(__FILE__).'/res/example06.php';
	    $content = ob_get_clean();

	    $html2pdf = new Html2Pdf('L','A4', 'es','true','UTF-8');
	    $html2pdf->writeHTML($content);
	    ob_end_clean();
	    $html2pdf->output('examplek.pdf');

	}

	catch (Html2PdfException $e) {
	    $html2pdf->clean();
	    $formatter = new ExceptionFormatter($e);
	    echo $formatter->getHtmlMessage();
	}
}
?>
<br>
<form action="" target="_blank"
    method="POST" class="form-signin">

		<input type="texto" placeholder="Otorgado a" name="titulo" value="<?=$_GET['iddocente']?>"
               class="form-control-lg"
               required="" autofocus="">
    <label for="inputNota"></label>
		<br>
		<input type="texto" placeholder="Curso moodle" name="curso" value="<?=$_GET['idcurso'] ?>"
               class="form-control-lg"
               required="" autofocus="" >
    <label for="inputNota"></label>
		<br>
    <a href="<?=base_url?>cursocontroller/index"><input class="btn btn-lg btn-success"
                type="submit" value="Generar Certificado" name="crear"></a>
</form>
