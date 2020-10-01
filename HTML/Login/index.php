<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "hotelrh";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$conn){
        die("No hay conexion".mysqli_connect_error());
    }

    $nombre = $_POST["usuario_v"];
    $pass = $_POST["contrasena_v"];

    $query = mysqli_query($conn,"SELECT * FROM cliente WHERE usuario_v ='".$nombre."' and contrasena_v ='".$pass."' ");
    $nr = mysqli_num_rows($query);

    if($nombre == "Admin" && $pass== "12345"){
        header("Location: ../IngresoAdmin/index.html");
    }else if($nr == 1){
        header("Location:  ../IngresoUser/index.html");
        //cho "Hello: ".$nombre;
    }else if ($nr == 0){
        echo "<script>alert('Usuario y/o contraseña incorrecta');</script>";
        header("Location: login2.html");
    }
?>
