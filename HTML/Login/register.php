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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme2.css">
    <link rel="shortcut icon" href="images/LogoC.png">
</head>

<body>
    <div class="form-body" class="container-fluid">

        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <img src="images/LogoC.png" width="75px" height="75px">
                        <h3>Resort House</h3>
                        <p>El mejor Hotel que puedas imaginar</p>
                        <div class="page-links">
                            <a href="login2.html">Iniciar Sesion</a><a href="register2.html" class="active">Registrar</a>
                        </div>
                        <form action="" method="POST">
                            <input class="form-control" type="text" name="nombre" placeholder="Nombre Completo" required>
                            <input class="form-control" type="text" name="telefono" placeholder="Telefono" required>
                            <input class="form-control" type="email" name="correo" placeholder="Correo Electronico " required>
                            <input class="form-control" type="text" name="usuario_v" placeholder="Usuario" required>
                            <input class="form-control" type="password" name="contrasena_v" placeholder="Contraseña" required>
                            <div class="form-button">
								<!--<a href="index.php" class="btn btn__danger">Cancelar</a>
								<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">-->
                                <button id="submit" type="submit" name="guardar" value="Guardar" class="ibtn">Registrar</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>O registrese con</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
						</div>
		
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>