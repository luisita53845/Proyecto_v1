<?php
    include_once 'conexion.php';
    
    if(isset($_GET['id_reserva'])){
		$id_reserva=(int) $_GET['id_reserva'];

		$buscar_id=$con->prepare('SELECT * FROM reserva WHERE id_reserva=:id_reserva LIMIT 1');
		$buscar_id->execute(array(
			':id_reserva'=>$id_reserva
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: reservasHistorial.php');
	}

   

    if(!isset($_GET["id_reserva"]))
		{
				
			 header("location:index.php");
		}else {
                $curdate=date("Y/m/d");
                /*$name = $resultado['Nombre'];
				$Phone = $resultado['telefono'];
                $email = $resultado['email'];
                $troom = $resultado['TipoHabitacion'];
                $status = $resultado['estado'];*/

                $Nombre=$resultado['Nombre'];
                $telefono=$resultado['telefono'];
                $email=$resultado['email'];
                $TipoHabitacion=$resultado['TipoHabitacion'];
                $Cant_personas=$resultado['Cant_personas'];
                $comida=$resultado['comida'];
                $parqueadero=$resultado['parqueadero'];
                $fecha_inicio=$resultado['fecha_inicio'];
                $fecha_fin=$resultado['fecha_fin'];
                $n_dias=$resultado['n_dias'];
                $estado=$resultado['estado'];

                
                $id = $_GET['id_reserva']; 
                
				
				
				/*$sql ="Select * from reservas where id_reserva = '$id'";
                $re = mysqli_query($con,$sql);*/
                $sentencia_select=$con->prepare("SELECT *FROM reserva WHERE id_reserva = '$id'");
                $sentencia_select->execute();
                $resultado=$sentencia_select->fetchAll();
				/*while($resultado)
				{
					$title = $resultado['Title']
					$name = $resultado['Nombre'];
					$lname = $row['LName'];
					$email = $resultado['email'];
					$nat = $row['National'];
					$country = $row['Country'];
					$troom = $row['TRoom'];
					$nroom = $row['NRoom'];
					$bed = $row['Bed'];
					$non = $row['NRoom'];
					$meal = $row['Meal'];
					$cin = $row['cin'];
					$cout = $row['cout'];
					$sta = $row['stat'];
					$days = $row['nodays'];
					
				
				
				}*/
				
    }
    
    


        if(isset($_POST['confirmar'])){
            $estado=$_POST['estado'];
            $id_reserva=(int) $_GET['id_reserva'];
    
            if(!empty($estado)){
                if($estado=null){
                    echo "<script> alert('Correo no valido');</script>";
                }else{
                    $consulta_update=$con->prepare('UPDATE reserva SET  
                        estado =:estado
                        WHERE id_reserva=:id_reserva;'
                    );
                    $consulta_update->execute(array(
                        ':estado' =>$estado,
                        ':id_reserva' =>$id_reserva
                    ));
                    header('Location: reservasEstado.php');
                }
            }else{
                echo "<script> alert('Los campos estan vacios');</script>";
            }
        }

?>

<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->


<!-- Mirrored from radixtouch.in/templates/admin/hotel/source/email_inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Jan 2020 12:38:06 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Clientes | Reservas | Solicitud</title>
    <!-- icons -->
    <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="assets/css/material_style.css">
    <!-- animation -->
    <link href="assets/css/pages/animate_page.css" rel="stylesheet">
    <!-- Template Styles -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/LogoC.png" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="index.html">
                        <img alt="" src="assets/img/LogoC.png" width="45px" height="45px" style="filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
                        <span class="logo-default" style="font-family: poppins sans-serif;">&nbsp;&nbsp;Resort House</span> </a>
                </div>
                <!-- logo end -->
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                </ul>
                <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn search-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
                    </div>
                </form>
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- start notification dropdown -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge headerBadgeColor1"> 6 </span>
                            </a>
                            <ul class="dropdown-menu animated swing">
                                <li class="external">
                                    <h3><span class="bold">Notifications</span></h3>
                                    <span class="notification-label purple-bgcolor">New 6</span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i
															class="fa fa-check"></i></span> Congratulations!. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
													<span class="notification-icon circle purple-bgcolor"><i
															class="fa fa-user o"></i></span>
                                                <b>John Micle </b>is now following you. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">7 mins</span>
                                                <span class="details">
													<span class="notification-icon circle blue-bgcolor"><i
															class="fa fa-comments-o"></i></span>
                                                <b>Sneha Jogi </b>sent you a message. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">12 mins</span>
                                                <span class="details">
													<span class="notification-icon circle pink"><i
															class="fa fa-heart"></i></span>
                                                <b>Ravi Patel </b>like your photo. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">15 mins</span>
                                                <span class="details">
													<span class="notification-icon circle yellow"><i
															class="fa fa-warning"></i></span> Warning! </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">10 hrs</span>
                                                <span class="details">
													<span class="notification-icon circle red"><i
															class="fa fa-times"></i></span> Application error. </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="dropdown-menu-footer">
                                        <a href="javascript:void(0)"> All notifications </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- end notification dropdown -->
                        <!-- start message dropdown -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge headerBadgeColor2"> 2 </span>
                            </a>
                            <ul class="dropdown-menu animated slideInDown">
                                <li class="external">
                                    <h3><span class="bold">Messages</span></h3>
                                    <span class="notification-label cyan-bgcolor">New 2</span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
													<img src="assets/img/user/user2.jpg" class="img-circle" alt="">
												</span>
                                                <span class="subject">
													<span class="from"> Sarah Smith </span>
                                                <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Jatin I found you on LinkedIn... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
													<img src="assets/img/user/user3.jpg" class="img-circle" alt="">
												</span>
                                                <span class="subject">
													<span class="from"> John Deo </span>
                                                <span class="time">16 mins </span>
                                                </span>
                                                <span class="message"> Fwd: Important Notice Regarding Your Domain
													Name... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
													<img src="assets/img/user/user1.jpg" class="img-circle" alt="">
												</span>
                                                <span class="subject">
													<span class="from"> Rajesh </span>
                                                <span class="time">2 hrs </span>
                                                </span>
                                                <span class="message"> pls take a print of attachments. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
													<img src="assets/img/user/user8.jpg" class="img-circle" alt="">
												</span>
                                                <span class="subject">
													<span class="from"> Lina Smith </span>
                                                <span class="time">40 mins </span>
                                                </span>
                                                <span class="message"> Apply for Ortho Surgeon </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
													<img src="assets/img/user/user5.jpg" class="img-circle" alt="">
												</span>
                                                <span class="subject">
													<span class="from"> Jacob Ryan </span>
                                                <span class="time">46 mins </span>
                                                </span>
                                                <span class="message"> Request for leave application. </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="dropdown-menu-footer">
                                        <a href="#"> All Messages </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- end message dropdown -->
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">

                            <ul class="dropdown-menu dropdown-menu-default animated jello">
                                <li>
                                    <a href="user_profile.html">
                                        <i class="icon-user"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-settings"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-directions"></i> Help
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="lock_screen.html">
                                        <i class="icon-lock"></i> Lock
                                    </a>
                                </li>
                                <li>
                                    <a href="login.html">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                                <i class="material-icons">settings</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start page container -->
        <div class="page-container">
            <!-- start sidebar menu -->
            <div class="sidebar-container">
                <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                    <div id="remove-scroll">
                        <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="sidebar-user-panel">
                                <div class="user-panel">

                                    <div class="sidebar-userpic-btn">
                                        <a class="tooltips" href="user_profile.html" data-placement="top" data-original-title="Profile">
                                            <i class="material-icons">person_outline</i>
                                        </a>
                                        <a class="tooltips" href="email_inbox.html" data-placement="top" data-original-title="Mail">
                                            <i class="material-icons">mail_outline</i>
                                        </a>
                                        <a class="tooltips" href="chat.html" data-placement="top" data-original-title="Chat">
                                            <i class="material-icons">chat</i>
                                        </a>
                                        <a class="tooltips" href="login.html" data-placement="top" data-original-title="Logout">
                                            <i class="material-icons">input</i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-heading">
                                <li class="menu-heading">
                                    <span>-- Menu --</span>
                                </li>
                                <li class="nav-item ">
                                    <a href="index.html" class="nav-link nav-toggle">
                                        <i class="material-icons">favorite</i>
                                        <span class="title">Sobre Nosotros</span>
                                        <span class="row"></span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#" class="nav-link nav-toggle">
                                        <i class="material-icons">assignment_turned_in</i>
                                        <span class="title ">Servicios</span>
                                        <span class="selected"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="habitacion.html" class="nav-link ">
                                                <i class="material-icons">hotel</i>
                                                <span class="title">Habitación</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="limpieza.html" class="nav-link ">
                                                <i class="material-icons">layers</i>
                                                <span class="title">Limpieza</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="zh.html" class="nav-link ">
                                                <i class="material-icons">invert_colors</i>
                                                <span class="title">Zonas Humedas</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="gastronomico.html" class="nav-link ">
                                                <i class="material-icons">local_dining</i>
                                                <span class="title">Gastronomico</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="tours.html" class="nav-link ">
                                                <i class="material-icons">terrain</i>
                                                <span class="title">Tours</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="parqueadero.html" class="nav-link ">
                                                <i class="material-icons">directions_car</i>
                                                <span class="title">Parqueadero</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item ">
                                <a href="#" class="nav-link nav-toggle ">
                                    <i class="material-icons ">account_circle</i>
                                    <span class="title ">Clientes</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="clientesRegistrar.php" class="nav-link ">
                                            <i class="material-icons">assignment_turned_in</i>
                                            <span class="title">Registrar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="clientesHistorial.php" class="nav-link ">
                                            <i class="material-icons">info</i>
                                            <span class="title">Historial</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                                <li class="nav-item ">
                                    <a href="# " class="nav-link nav-toggle ">
                                        <i class="material-icons ">announcement</i>
                                        <span class="title ">Mensajes</span>
                                        <span class="selected "></span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="# " class="nav-link nav-toggle ">
                                        <i class="material-icons ">business_center</i>
                                        <span class="title ">Promociones</span>
                                        <span class="arrow "></span>
                                    </a>
                                    <ul class="sub-menu ">
                                        <li class="nav-item ">
                                            <a href="new_booking.html " class="nav-link ">
                                                <span class="title ">New Booking</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="view_booking.html " class="nav-link ">
                                                <span class="title ">View Booking</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="edit_booking.html " class="nav-link ">
                                                <span class="title ">Edit Booking</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item start active">
                                    <a href="# " class="nav-link nav-toggle ">
                                        <i class="material-icons ">vpn_key</i>
                                        <span class="title ">Reserva</span>
                                        <span class="arrow "></span>
                                    </a>
                                    <ul class="sub-menu ">
                                    <li class="nav-item">
                                        <a href="reservasRegistrar.php" class="nav-link ">
                                            <span class="title">Registrar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="reservasEstado.php" class="nav-link ">
                                            <span class="title">Por confirmar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="reservasConfirmadas.php" class="nav-link ">
                                            <span class="title">Confirmadas</span>
                                        </a>
                                    </li>
                                    </ul>
                                </li>
                                <li class="nav-item ">
                                    <a href="# " class="nav-link nav-toggle ">
                                        <i class="material-icons ">group</i>
                                        <span class="title ">Contactanos</span>
                                        <span class="arrow "></span>
                                    </a>
                                    <ul class="sub-menu ">
                                        <li class="nav-item ">
                                            <a href="add_staff.html " class="nav-link ">
                                                <span class="title ">Add Staff Details</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="all_staffs.html " class="nav-link ">
                                                <span class="title ">View All Staffs</span>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="edit_staff.html " class="nav-link ">
                                                <span class="title ">Edit Staff Details</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                        </ul>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper ">
                <div class="page-content ">
                    <div class="page-bar ">
                        <div class="page-title-breadcrumb ">
                            <div class=" pull-left ">
                                <div class="page-title "></div>
                            </div>
                            <ol>

                            </ol>
                        </div>
                    </div>
                    <!---->

                    <h1 class="">
                            Reserva de habitacion<small>	<?php echo  $curdate; ?> </small>
                    </h1>

                    

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-blue">
                                <div class="card-head">
                                    <header>ESTADO RESERVAS</header>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table class="table">
                                        <tr>
                                            <th>DESCRIPCION</th>
                                            <th>INFORMATION</th>
                                            
                                        </tr>
                                        <tr>
                                            <th>Nombre</th>
                                            <td><?php echo $Nombre; ?> </td>
                                            
                                        </tr>
										<tr>
                                            <th>Correo</th>
                                            <td><?php echo $email; ?> </td>
                                            
                                        </tr>
										<tr>
                                            <th> No Telefono</th>
                                            <td><?php echo $telefono; ?></td>
                                            
                                        </tr>
										<tr>
                                            <th>Tipo de la habitación</th>
                                            <td><?php echo $TipoHabitacion; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Cantidad de Personas</th>
                                            <td><?php echo $Cant_personas; ?></td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Parqueadero</th>
                                            <td><?php echo $parqueadero; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Regimen de Comidas</th>
                                            <td><?php echo $comida; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de Entrada</th>
                                            <td><?php echo $fecha_inicio; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de Salida</th>
                                            <td><?php echo $fecha_fin; ?></td>
                                        </tr>
                                        <tr>
                                            <th>N° de Días</th>
                                            <td><?php echo $n_dias; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Estado</th>
                                            <td><?php echo $estado; ?></td>
                                        </tr>
                                        </table>
                                    </div>
                                </div>


                                <div class="" style="margin-left: 2%; ">
                                    <form method="post">
                                        <div class="form-group" >
                                                <label>¿Desea Confirmar?</label>
                                                <select name="estado"class="form-control" style="width: 98%;">
                                                    <option value ="0">	</option>
                                                    <option value="Confirmar">Confirmar Reserva</option>
                                                </select>
                                        </div>
                                        <input type="submit" name="confirmar" value="Confirmar" class="btn btn-circle btn-success">
										<a href="reservasEstado.php" class="btn btn-circle btn-danger">Cancelar</a>
                                    
                                    </form>
                                    <br>
                                </div>
                                <br>
                                
                            </div>
                        </div>
                    </div>

                    <!---->

                        <?php

                            /*include_once 'conexion.php';

                            $rsql = $con->prepare( 'Select * from habitacion');
                            $rsql->execute(array(
                                ':id_reserva'=>$id_reserva));
                            $rre = $rsql->fetch();*/
                            /*$rre = mysqli_query($con,$rsql);*/
                            /*$r = 0;
                            $suite = 0;
                            $suiteF = 0;
                            $twin = 0;
                            $dr = 0;*/
                            /*while($rrow=mysqli_fetch_array($rre)){*/
                                /*$r = $r + 1;
                                $s = $rre['nombre'];
                                $p = $rre['descripcion'];*/
                                /*$p = $rrow['place'];*/
                                /*if($s=="Suite"){
                                    $suite = $suite +1;
                                }

                                if($s=="Suite Familiar"){
                                    $suiteF = $suiteF +1;
                                }

                                if($s=="twin"){
                                    $twin = $twin +1;
                                }
                            } */

                        ?>

                        <?php

                            /*$csql =$con->prepare('select * from reserva');
                            $csql->execute();
                            $cre = $csql->fetch();*/

                            /*$cre = mysqli_query($con,$csql);*/
                            /*$cr =0 ;
						    $csuite =0;
						    $csuiteF = 0;
						    $ctwin = 0;
                            $cdr = 0;*/
                            
                            /*while($crow=mysqli_fetch_array($cre)){*/
                                /*$cr = $cr + 1;
                                $cs = $cre['TipoHabitacion'];
                                if($cs =="Suite"){
                                    $csuite = $csuite + 1 ;
                                }

                                if($cs =="Suite Familiar"){
                                    $csuiteF = $csuiteF + 1 ;
                                }

                                if($cs =="twin"){
                                    $ctwin = $ctwin + 1 ;
                                }
                            }*/

                        ?>

                    <!---->

                    <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Detalles de Habitaciones Disponibles
                            </div>
                            <div class="panel-body">
                                <table width="200px">
                                    <tr>
                                        <td>
                                            <b>Suite</b>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-circle">
                                                <?php

                                                    $f1 = $suite - $csuite;

                                                    if($f1 <= 0){
                                                        $f1 = "NO";
                                                        echo $f1;
                                                    }else{
                                                        echo $f1;
                                                    }

                                                ?>
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <b>Suite Familiar</b>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-circle">
                                                <?php

                                                    $f2 = $suiteF - $csuiteF;

                                                    if($f2 <= 0){
                                                        $f2 = "NO";
                                                        echo $f2;
                                                    }else{
                                                        echo $f2;
                                                    }

                                                ?>
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <b>Twin</b>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-circle">
                                                <?php

                                                    $f3 = $twin - $ctwin;

                                                    if($f3 <= 0){
                                                        $f3 = "NO";
                                                        echo $f3;
                                                    }else{
                                                        echo $f3;
                                                    }

                                                ?>
                                            </button>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                    <!---->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-blue">
                                <div class="card-head">
                                    <header>HABITACIONES DISPONIBLES</header>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Superior Room</th> 
                                                    <th>Guest House</th> 
                                                    <th>Single Room</th> 
                                                    <th>Deluxe Room</th> 
                                                    <th>Total Habitaciones</th> 
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                
                            </div>
                        </div>
                    </div> 



                  


                
                <!-- /. ROW  -->
				
                </div>
                <!-- /. ROW  -->
				
				
				
				
         </div>
            <!-- /. PAGE INNER  -->
        </div>


                                    





                    <!-- end page content -->
                    <!-- start chat sidebar -->
                    <div class="chat-sidebar-container " data-close-on-body-click="false ">
                        <div class="chat-sidebar ">
                            <ul class="nav nav-tabs ">
                                <li class="nav-item ">
                                    <a href="#quick_sidebar_tab_1 " class="nav-link active tab-icon " data-toggle="tab ">Theme
							</a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#quick_sidebar_tab_2 " class="nav-link tab-icon " data-toggle="tab "> Chat
							</a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#quick_sidebar_tab_3 " class="nav-link tab-icon " data-toggle="tab "> Settings
							</a>
                                </li>
                            </ul>
                            <div class="tab-content ">
                                <div class="tab-pane chat-sidebar-settings in show active animated shake " role="tabpanel " id="quick_sidebar_tab_1 ">
                                    <div class="slimscroll-style ">
                                        <div class="theme-light-dark ">
                                            <h6>Sidebar Theme</h6>
                                            <button type="button " data-theme="white " class="btn lightColor btn-outline btn-circle m-b-10 theme-button ">Light
										Sidebar</button>
                                            <button type="button " data-theme="dark " class="btn dark btn-outline btn-circle m-b-10 theme-button ">Dark
										Sidebar</button>
                                        </div>
                                        <div class="theme-light-dark ">
                                            <h6>Sidebar Color</h6>
                                            <ul class="list-unstyled ">
                                                <li class="complete ">
                                                    <div class="theme-color sidebar-theme ">
                                                        <a href="# " data-theme="white "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="dark "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="blue "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="indigo "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="cyan "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="green "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="red "><span class="head "></span><span
														class="cont "></span></a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h6>Header Brand color</h6>
                                            <ul class="list-unstyled ">
                                                <li class="theme-option ">
                                                    <div class="theme-color logo-theme ">
                                                        <a href="# " data-theme="logo-white "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="logo-dark "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="logo-blue "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="logo-indigo "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="logo-cyan "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="logo-green "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="logo-red "><span class="head "></span><span
														class="cont "></span></a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <h6>Header color</h6>
                                            <ul class="list-unstyled ">
                                                <li class="theme-option ">
                                                    <div class="theme-color header-theme ">
                                                        <a href="# " data-theme="header-white "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="header-dark "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="header-blue "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="header-indigo "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="header-cyan "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="header-green "><span class="head "></span><span
														class="cont "></span></a>
                                                        <a href="# " data-theme="header-red "><span class="head "></span><span
														class="cont "></span></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Start Doctor Chat -->
                                <div class="tab-pane chat-sidebar-chat animated slideInRight " id="quick_sidebar_tab_2 ">
                                    <div class="chat-sidebar-list ">
                                        <div class="chat-sidebar-chat-users slimscroll-style " data-rail-color="#ddd " data-wrapper-class="chat-sidebar-list ">
                                            <div class="chat-header ">
                                                <h5 class="list-heading ">Online</h5>
                                            </div>
                                            <ul class="media-list list-items ">
                                                <li class="media "><img class="media-object " src="assets/img/user/user3.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="online dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">John Deo</h5>
                                                        <div class="media-heading-sub ">Spine Surgeon</div>
                                                    </div>
                                                </li>
                                                <li class="media ">
                                                    <div class="media-status ">
                                                        <span class="badge badge-success ">5</span>
                                                    </div> <img class="media-object " src="assets/img/user/user1.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="busy dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">Rajesh</h5>
                                                        <div class="media-heading-sub ">Director</div>
                                                    </div>
                                                </li>
                                                <li class="media "><img class="media-object " src="assets/img/user/user5.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="away dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">Jacob Ryan</h5>
                                                        <div class="media-heading-sub ">Ortho Surgeon</div>
                                                    </div>
                                                </li>
                                                <li class="media ">
                                                    <div class="media-status ">
                                                        <span class="badge badge-danger ">8</span>
                                                    </div> <img class="media-object " src="assets/img/user/user4.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="online dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">Kehn Anderson</h5>
                                                        <div class="media-heading-sub ">CEO</div>
                                                    </div>
                                                </li>
                                                <li class="media "><img class="media-object " src="assets/img/user/user2.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="busy dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">Sarah Smith</h5>
                                                        <div class="media-heading-sub ">Anaesthetics</div>
                                                    </div>
                                                </li>
                                                <li class="media "><img class="media-object " src="assets/img/user/user7.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="online dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">Vlad Cardella</h5>
                                                        <div class="media-heading-sub ">Cardiologist</div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="chat-header ">
                                                <h5 class="list-heading ">Offline</h5>
                                            </div>
                                            <ul class="media-list list-items ">
                                                <li class="media ">
                                                    <div class="media-status ">
                                                        <span class="badge badge-warning ">4</span>
                                                    </div> <img class="media-object " src="assets/img/user/user6.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="offline dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">Jennifer Maklen</h5>
                                                        <div class="media-heading-sub ">Nurse</div>
                                                        <div class="media-heading-small ">Last seen 01:20 AM</div>
                                                    </div>
                                                </li>
                                                <li class="media "><img class="media-object " src="assets/img/user/user8.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="offline dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">Lina Smith</h5>
                                                        <div class="media-heading-sub ">Ortho Surgeon</div>
                                                        <div class="media-heading-small ">Last seen 11:14 PM</div>
                                                    </div>
                                                </li>
                                                <li class="media ">
                                                    <div class="media-status ">
                                                        <span class="badge badge-success ">9</span>
                                                    </div> <img class="media-object " src="assets/img/user/user9.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="offline dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">Jeff Adam</h5>
                                                        <div class="media-heading-sub ">Compounder</div>
                                                        <div class="media-heading-small ">Last seen 3:31 PM</div>
                                                    </div>
                                                </li>
                                                <li class="media "><img class="media-object " src="assets/img/user/user10.jpg " width="35 " height="35 " alt="... ">
                                                    <i class="offline dot "></i>
                                                    <div class="media-body ">
                                                        <h5 class="media-heading ">Anjelina Cardella</h5>
                                                        <div class="media-heading-sub ">Physiotherapist</div>
                                                        <div class="media-heading-small ">Last seen 7:45 PM</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Doctor Chat -->
                                <!-- Start Setting Panel -->
                                <div class="tab-pane chat-sidebar-settings animated slideInUp " id="quick_sidebar_tab_3 ">
                                    <div class="chat-sidebar-settings-list slimscroll-style ">
                                        <div class="chat-header ">
                                            <h5 class="list-heading ">Layout Settings</h5>
                                        </div>
                                        <div class="chatpane inner-content ">
                                            <div class="settings-list ">
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Sidebar Position</div>
                                                    <div class="setting-set ">
                                                        <select class="sidebar-pos-option form-control input-inline input-sm input-small ">
													<option value="left " selected="selected ">Left</option>
													<option value="right ">Right</option>
												</select>
                                                    </div>
                                                </div>
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Header</div>
                                                    <div class="setting-set ">
                                                        <select class="page-header-option form-control input-inline input-sm input-small ">
													<option value="fixed " selected="selected ">Fixed</option>
													<option value="default ">Default</option>
												</select>
                                                    </div>
                                                </div>
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Sidebar Menu </div>
                                                    <div class="setting-set ">
                                                        <select class="sidebar-menu-option form-control input-inline input-sm input-small ">
													<option value="accordion " selected="selected ">Accordion</option>
													<option value="hover ">Hover</option>
												</select>
                                                    </div>
                                                </div>
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Footer</div>
                                                    <div class="setting-set ">
                                                        <select class="page-footer-option form-control input-inline input-sm input-small ">
													<option value="fixed ">Fixed</option>
													<option value="default " selected="selected ">Default</option>
												</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-header ">
                                                <h5 class="list-heading ">Account Settings</h5>
                                            </div>
                                            <div class="settings-list ">
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Notifications</div>
                                                    <div class="setting-set ">
                                                        <div class="switch ">
                                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect " for="switch-1 ">
														<input type="checkbox " id="switch-1 " class="mdl-switch__input "
															checked>
													</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Show Online</div>
                                                    <div class="setting-set ">
                                                        <div class="switch ">
                                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect " for="switch-7 ">
														<input type="checkbox " id="switch-7 " class="mdl-switch__input "
															checked>
													</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Status</div>
                                                    <div class="setting-set ">
                                                        <div class="switch ">
                                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect " for="switch-2 ">
														<input type="checkbox " id="switch-2 " class="mdl-switch__input "
															checked>
													</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="setting-item ">
                                                    <div class="setting-text ">2 Steps Verification</div>
                                                    <div class="setting-set ">
                                                        <div class="switch ">
                                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect " for="switch-3 ">
														<input type="checkbox " id="switch-3 " class="mdl-switch__input "
															checked>
													</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-header ">
                                                <h5 class="list-heading ">General Settings</h5>
                                            </div>
                                            <div class="settings-list ">
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Location</div>
                                                    <div class="setting-set ">
                                                        <div class="switch ">
                                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect " for="switch-4 ">
														<input type="checkbox " id="switch-4 " class="mdl-switch__input "
															checked>
													</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Save Histry</div>
                                                    <div class="setting-set ">
                                                        <div class="switch ">
                                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect " for="switch-5 ">
														<input type="checkbox " id="switch-5 " class="mdl-switch__input "
															checked>
													</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="setting-item ">
                                                    <div class="setting-text ">Auto Updates</div>
                                                    <div class="setting-set ">
                                                        <div class="switch ">
                                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect " for="switch-6 ">
														<input type="checkbox " id="switch-6 " class="mdl-switch__input "
															checked>
													</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end chat sidebar -->
                </div>
                <!-- end page container -->
                <!-- start footer -->
                <div class="page-footer ">
                    <div class="page-footer-inner "> 2018 &copy; Spice Hotel Template By
                        <a href="mailto:redstartheme@gmail.com " target="_top " class="makerCss ">RedStar Theme</a>
                    </div>
                    <div class="scroll-to-top ">
                        <i class="icon-arrow-up "></i>
                    </div>
                </div>
                <!-- end footer -->
            </div>
            <!-- start js include path -->
            <script src="assets/plugins/jquery/jquery.min.js "></script>
            <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js "></script>
            <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js "></script>
            <script src="assets/plugins/popper/popper.min.js "></script>
            <!-- bootstrap -->
            <script src="assets/plugins/bootstrap/js/bootstrap.min.js "></script>
            <!-- Common js-->
            <script src="assets/js/app.js "></script>
            <script src="assets/js/layout.js "></script>
            <script src="assets/js/theme-color.js "></script>
            <!-- Material -->
            <script src="assets/plugins/material/material.min.js "></script>
            <!-- animation -->
            <script src="assets/js/pages/ui/animations.js "></script>
            <!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/hotel/source/email_inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Jan 2020 12:38:07 GMT -->

</html>