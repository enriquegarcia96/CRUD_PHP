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
		<label for="correo">Correo:</label>

		<div class="input-group">

			<div class="input-group-prepend">
    			<span class="input-group-text">
    				<i class="fas fa-envelope"></i>
    			</span>
    		</div>
		<input type="email" class="form-control" placeholder="yourEmail@gmail.com" id="correo" name="ingresoEmail">
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
		<input type="password" class="form-control" placeholder="Password" id="pwd" name="ingresoPassword">
		</div>
	</div>

	<?php 

	
		$ingreso = new ControladorFormularios();
		$ingreso->crtIngreso();
		
	?>

	<button type="submit" class="btn btn-primary">Ingresar</button>

</form>
</div>