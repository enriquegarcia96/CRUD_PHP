<?php

#el index: en el mostraremos la salida de las vistas al usuario  y tembien a traves de el 
#enviaremos las distintas acciones que el usuario envie al contralador.


#require() establece que el codigo del archivo invocado es requerido.
require_once"controladores/plantilla.controlador.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();



?>