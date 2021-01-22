<?php

class ControladorFormularios{

	/*=============================================
		Registro
	=============================================*/
	static public function ctrRegistro(){
		if (isset($_POST["registroNombre"])) {
			$tabla = "registros";
			#lo almaceno en un array
			$datos = array("nombre" => $_POST["registroNombre"],
							"email" => $_POST["registroEmail"],
							"password" => $_POST["registroPassword"]
							);

			$respuesta = ModeloFormularios::mdlRegistro( $tabla, $datos );

			#se la devuelvo a la vista
			return $respuesta;
		}
	}
	
	
	
	
	
	
}

?>