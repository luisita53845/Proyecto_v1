<?php
	include_once 'conexion.php';

	if(isset($_GET['id_cliente'])){
		$id_cliente=(int) $_GET['id_cliente'];

		$buscar_id=$con->prepare('SELECT * FROM cliente WHERE id_cliente=:id_cliente LIMIT 1');
		$buscar_id->execute(array(
			':id_cliente'=>$id_cliente
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: clientesHistorial.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $usuario_v=$_POST['usuario_v'];
        $contrasena_v=$_POST['contrasena_v'];
		$id_cliente=(int) $_GET['id_cliente'];

		if(!empty($nombre) && !empty($telefono) && !empty($correo) && !empty($usuario_v) && !empty($contrasena_v)){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare('UPDATE cliente SET  
					nombre =:nombre,
                    telefono =:telefono,
                    correo =:correo,
                    usuario_v =:usuario_v,
                    contrasena_v =:contrasena_v
					WHERE id_cliente=:id_cliente;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':telefono' =>$telefono,
                    ':correo' =>$correo,
                    ':usuario_v' =>$usuario_v,
                    ':contrasena_v' =>$contrasena_v,
					':id_cliente' =>$id_cliente
				));
				header('Location: clientesHistorial.php');
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
    <title>Clientes | Editar</title>
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
                                <li class="nav-item start active">
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

                                <li class="nav-item ">
                                    <a href="# " class="nav-link nav-toggle ">
                                        <i class="material-icons ">vpn_key</i>
                                        <span class="title ">Reserva</span>
                                        <span class="arrow "></span>
                                    </a>
                                    <ul class="sub-menu ">
                                        <li class="nav-item">
                                            <a href="reservasEstado.php" class="nav-link ">
                                                <span class="title">Por confirmar</span>
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
                    <!-- start widget -->
                    
                    <!-- end widget -->
					
					<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-blue">
                                <div class="card-head">
                                    <header>MODIFICAR &nbsp;&nbsp;&nbsp;&nbsp;CLIENTE</header>
                                </div>
                                <div class="card-body ">
                                    <div class="table-responsive">
										<form action="" method="post" style="margin-left:34%; margin-top:1%; margin-bottom:3%;">
											<div class="">
												<div class="col-md-6 col-sm-6" style="text-align:center;">
													<div class="form-group">
														<label>Nombre</label>
														<input type="text" class="form-control" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" >
													</div>
													<div class="form-group">
														<label>Telefono</label>
														<input type="text" class="form-control" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" >
													</div>
													<div class="form-group">
														<label>Correo</label>
														<input type="text" class="form-control" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" >
													</div>
													<div class="form-group">
														<label>Usuario</label>
														<input type="text" class="form-control" name="usuario_v" value="<?php if($resultado) echo $resultado['usuario_v']; ?>" >
													</div>
													<div class="form-group">
														<label>Contraseña</label>
														<input type="text" class="form-control" name="contrasena_v" value="<?php if($resultado) echo $resultado['contrasena_v']; ?>" >
													</div>
												</div>
											</div></br>
											<div class="btn__group" style=" margin-left: 14%; " >
												<input type="submit" name="guardar" value="Guardar" class="btn btn-circle btn-success">
												<a href="clientesHistorial.php" class="btn btn-circle btn-danger">Cancelar</a>
											</div>
										</form>
                                    </div>
                                </div>
							</div>
                        </div>
					</div>
            </div>
                    <!-- end page content -->
                   
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