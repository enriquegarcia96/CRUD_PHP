<?php 
	
	require_once "conexion.php";

class ModeloFormularios {

	/*=============================================
		Registro
	=============================================*/
	static public function mdlRegistro( $tabla, $datos ){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el metodo PDOStament::executte(). La sentencia SQL puede contener cero o mas marcadores de parametros con nombre (:name) o signos de interrogacion(?) por los valores reales seran sustituidos cuando la senrencia sea ejecutada. Ayuda a prevenir inyemcciones SQL eliminando la necesidad de entrecomillar manualmente los parametros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");

		#bindParam() Vincula una variable de PHP a un parametro de sustitucion con nombre o de signo de interogacion correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email",$datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password",$datos["password"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		#para asegurar el sistema
		$stmt->close();
		$stmt = null;
	}	
	
	
}



 ?>