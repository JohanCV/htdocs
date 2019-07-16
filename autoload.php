<?php
function autocargar_controladores($classname){
    include ('controladores/'.$classname.'.php');
}
spl_autoload_register('autocargar_controladores');
?>
