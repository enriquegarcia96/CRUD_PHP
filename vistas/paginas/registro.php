	<head>
		<style>
			label{
				color:#fff3e6  ;
			}
		</style>
	</head>


<div class="d-flex justify-content-center text-center">
<form class="p-5 bg-dark" method="post">
	<div class="form-group">
		<label  for="nombre">Nombre:</label>
		<div class="input-group">

			<div class="input-group-prepend">
    			<span class="input-group-text"><i class="far fa-user"></i></span>
    		</div>

		<input type="text" class="form-control" placeholder="Your Name " id="nombre" name="registroNombre">
		</div>
	</div>

	<div class="form-group">
		<label for="correo">Correo:</label>

		<div class="input-group">

			<div class="input-group-prepend">
    			<span class="input-group-text">
    				<i class="fas fa-envelope"></i>
    			</span>
    		</div>
		<input type="email" class="form-control" placeholder="yourEmail@gmail.com" id="correo" name="registroEmail">
		</div>
	</div>

	<div class="form-group">
		<label for="pwd"  >Password:</label>
		<div class="input-group">

			<div class="input-group-prepend">
    			<span class="input-group-text">
    				<i class="fas fa-lock"></i>
    			</span>
    		</div>
		<input type="password" class="form-control" placeholder="Password" id="pwd" name="registroPassword">
		</div>
	</div>

	<?php 

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN METODO NO ESTATICO
		=============================================*/
		//$registro = new ControladorFormularios();
		//$registro -> ctrRegistro();

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN METODO ESTATICO
		=============================================*/
		$registro = ControladorFormularios::ctrRegistro();
		if ($registro == "ok") {

			#para eliminar las variables POST en la base de datos del navegador 
			echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null, null, window.location.href);
				}
			</script>';

			echo '<div class="alert alert-success" >El usuario ha sido registrado</div>';
		}
	 ?>


	<button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>