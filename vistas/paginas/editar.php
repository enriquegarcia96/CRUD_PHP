<?php 

	if (isset($_GET["id"])) {
		$item = "id";
		$valor = $_GET["id"];
		$usuario = ControladorFormularios::crtSeleccionarRegistros($item, $valor);
		//echo '<pre>'; print_r($usuario); echo '</pre>';
	}

 ?>
<div class="d-flex justify-content-center text-center">
<form class="p-5 bg-dark" method="post">
	<div class="form-group">
		
		<div class="input-group">

			<div class="input-group-prepend">
    			<span class="input-group-text"><i class="far fa-user"></i></span>
    		</div>

		<input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder="Your Name " id="nombre" name="actualizarNombre">
		</div>
	</div>

	<div class="form-group">
		

		<div class="input-group">

			<div class="input-group-prepend">
    			<span class="input-group-text">
    				<i class="fas fa-envelope"></i>
    			</span>
    		</div>
		<input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="yourEmail@gmail.com" id="correo" name="actualizarEmail">
		</div>
	</div>

	<div class="form-group">
		
		<div class="input-group">

			<div class="input-group-prepend">
    			<span class="input-group-text">
    				<i class="fas fa-lock"></i>
    			</span>
    		</div>

		<input type="password" class="form-control" placeholder="Password" id="pwd" name="actualizarPassword">
		<input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
		<input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">

		</div>
	</div>

	<?php 
		#recibe los cambis actualiados 
		$actualizar =  ControladorFormularios::crtActualizarRegistro();

		if ($actualizar == "ok") {
				echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null, null, window.location.href);
				}
				</script>';

				echo '<div class="alert alert-success" >El usuario ha sido Actualizado</div>

				<script>
						setTimeout(function(){
							window.location = "index.php?pagina=inicio";
						},3000);
				</script>
				';

		}
		
	 ?>
	<button type="submit" class="btn btn-primary">Actualizar</button>
</form>
</div>