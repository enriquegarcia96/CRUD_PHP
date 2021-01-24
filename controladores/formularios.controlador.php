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






	/*=============================================
		Seleccionar Registros
	=============================================*/

	static public function crtSeleccionarRegistros($item, $valor){
		$tabla = "registros";
		$respuesta = ModeloFormularios::mdlSeleccinarRegistros($tabla, $item, $valor);
		return $respuesta;
	}








	/*=============================================
		Ingreso
	=============================================*/
	public function crtIngreso(){
		if (isset($_POST["ingresoEmail"])) {
			$tabla= "registros";
			$item = "email";
			$valor = $_POST["ingresoEmail"];

			$respuesta = ModeloFormularios::mdlSeleccinarRegistros($tabla, $item, $valor);
			if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {

				#nombre de la variable de session
				$_SESSION["validarIngreso"] = "ok";

				echo '<script>
					if(window.history.replaceState){
					window.history.replaceState(null, null, window.location.href);
				}

					window.location =  "index.php?pagina=inicio";
				</script>';

			}else{
				echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null, null, window.location.href);
				}
				</script>';

				echo '<div class="alert alert-danger" >Error al ingresar sistema, el email o la contraseña no coinciden</div>';
			}

		}
	}



	/*=============================================
	Actualizar Registro
	=============================================*/
	static public function crtActualizarRegistro(){

		
		if (isset($_POST["actualizarNombre"])) {

			if ($_POST["actualizarPassword"] != "") {
				$password = $_POST["actualizarPassword"];
			}else{
				$password = $_POST["actualizarActual"];
			}


			$tabla = "registros";

			#lo almaceno en un array
			$datos = array("id" => $_POST["idUsuario"],
							"nombre" => $_POST["actualizarNombre"],
							"email" => $_POST["actualizarEmail"],
							"password" => $password);

			$respuesta = ModeloFormularios::mdlActualizarRegistro( $tabla, $datos );

			return $respuesta; //respuesta a la vista

		}
	}	




	/*=============================================
	Eliminar Registro
	=============================================*/

	public function crtEliminarRegistro(){
		if (isset($_POST["eliminarRegistro"])) {

			#pido una respuesta al modelo
			$tabla = "registros";
			$valor = $_POST["eliminarRegistro"];
			$respuesta = ModeloFormularios::mdlEliminarRegistro( $tabla, $valor );

			if ($respuesta == "ok") {
				echo '<script>
					if(window.history.replaceState){
					window.history.replaceState(null, null, window.location.href);
				}

					window.location =  "index.php?pagina=inicio";
				</script>';
			}
			//return $respuesta; //respuesta a la vista
		}
	}



}

?>