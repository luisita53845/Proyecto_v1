<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $usuario_v=$_POST['usuario_v'];
        $contrasena_v=$_POST['contrasena_v'];

		if(!empty($nombre) && !empty($telefono) && !empty($correo) && !empty($usuario_v) && !empty($contrasena_v) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO cliente(nombre,telefono,correo,usuario_v,contrasena_v) VALUES(:nombre,:telefono,:correo,:usuario_v,:contrasena_v)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':telefono' =>$telefono,
                    ':correo' =>$correo,
                    ':usuario_v' =>$usuario_v,
                    ':contrasena_v' =>$contrasena_v
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	} 


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="telefono" placeholder="Teléfono" class="input__text">
			</div>
			<div class="form-group">
            <input type="text" name="correo" placeholder="Correo electrónico" class="input__text">
				<input type="text" name="usuario_v" placeholder="Usuario" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="contrasena_v" placeholder="Contraseña" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
