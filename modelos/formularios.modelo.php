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






	/*=============================================
		Seleccionar Registros
	=============================================*/

	static public function mdlSeleccinarRegistros($tabla, $item, $valor){
		if ($item == null && $valor == null) {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		//devuelve todos los registros de la base.
		return $stmt-> fetchAll(); 
			
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}
		$stmt->close();
		$stmt = null();

	}



	/*=============================================
		Actualizar Registro
	=============================================*/
	static public function mdlActualizarRegistro( $tabla, $datos ){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,email=:email,password=:password WHERE id = :id");

		#bindParam() Vincula una variable de PHP a un parametro de sustitucion con nombre o de signo de interogacion correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email",$datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password",$datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		#para asegurar el sistema
		$stmt->close();
		$stmt = null;
	}	





	/*=============================================
		Eliminar Registro
	=============================================*/
	static public function mdlEliminarRegistro( $tabla, $valor ){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		#bindParam() Vincula una variable de PHP a un parametro de sustitucion con nombre o de signo de interogacion correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":id",$valor, PDO::PARAM_INT);

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