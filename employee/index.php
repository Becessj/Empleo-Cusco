<!doctype html>
<html lang="es_ES">
<?php 
require '../constants/settings.php'; 
require 'constants/check-login.php';

if ($user_online == "true") {
    if ($myrole == "employee") {
    }else{
        header("location:../");		
    }
}else{
    header("location:../");	
}
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Empleo Cusco - Perfil persona</title>
	<meta name="description" content="Oferta de empleos en línea / Portal de empleo" />
	<meta name="keywords" content="trabajo, currículum, solicitantes, solicitud, empleado, empleador, contratación, gestión de recursos humanos, gestión de trabajos en línea, empresa, obrero, carrera, reclutamiento, reclutamiento" />
	<meta name="author" content="Becessj">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Becessj" />
    <meta property="og:description" content="Oferta de empleos en línea / Portal de empleo" />


	<link rel="shortcut icon" href="../images/ico/favicon.png">

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="../icons/linearicons/style.css">
	<link rel="stylesheet" href="../icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="../icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="../icons/rivolicons/style.css">
	<link rel="stylesheet" href="../icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="../icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="../icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="../icons/flaticon-ventures/flaticon-ventures.css">

	<link href="../css/style.css" rel="stylesheet">
</head>
  <style>
  
    .autofit2 {
	height:80px;
	width:100px;
    object-fit:cover; 
  }
  
  
  </style>

<body class="not-transparent-header">

	<div class="container-wrapper">

		<header id="header">

			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="../"><img src="../images/logo.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
							
								<a href="../">Inicio</a>
								
							</li>
							
							<li>
								<a href="../job-list.php">Empleos</a>

							</li>
							
							<li>
								<a href="../employers.php">Instituciones</a>
							</li>
							
						<!-- 	<li>
								<a href="../employees.php">Personas</a>
							</li> -->
							
							<li>
								<a href="../contact.php">Contacto</a>
							</li>

						</ul>
				
					</div>

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
							<li><a href="../logout.php">Cerrar Sesión</a></li>
							<li><a href="./">Perfil</a></li>
						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

			
		</header>
  		<br>
		<div class="main-wrapper">
		
			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="../">Empleo Cusco</a></li>
						<li><span>Perfil</span></li>
					</ol>
					
				</div>
				
			</div>

			
			<div class="admin-container-wrapper">

				<div class="container">
				
					<div class="GridLex-gap-15-wrappper">
					
						<div class="GridLex-grid-noGutter-equalHeight">
						
							<div class="GridLex-col-3_sm-4_xs-12">
							
								<div class="admin-sidebar">
										
									<div class="admin-user-item">
									<div class="image">	
									
										<?php 
										if ($myavatar == null) {
										print '<center><img class="img-circle autofit2" src="../images/default.jpg" title="'.$myfname.'" alt="image"  /></center>';
										}else{
										echo '<center><img class="img-circle autofit2" alt="image" title="'.$myfname.'"  src="data:image/jpeg;base64,'.base64_encode($myavatar).'"/></center>';	
										}
										?>
										</div>
										<br>
										
										
										<h4><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></h4>
										<p class="user-role"><?php echo "$mytitle"; ?></p>
										
									</div>
									
									<div class="admin-user-action text-center">
									
									<a  href="..\job-list.php" class="btn btn-primary btn-sm btn-inverse">VER EMPLEOS</a>
										<a target="_blank" href="my_cv" class="btn btn-primary btn-sm btn-inverse">VER MI CV</a>
										
									</div>
									
									<ul class="admin-user-menu clearfix">
										<li  class="active">
											<a href="./"><i class="fa fa-user"></i> Perfil</a>
										</li>
										<li class="">
										<a href="change-password.php"><i class="fa fa-key"></i> Cambiar Contraseña</a>
										</li>
										 <li>
											<a href="qualifications.php"><i class="fa fa-trophy"></i> Cualidades Profesionales</a>
										</li>
										<li>
											<a href="language.php"><i class="fa fa-language"></i> Dominio del Idioma</a>
										</li>
										<li>
											<a href="training.php"><i class="fa fa-gears"></i> Prácticas Pre Profesionales</a>
										</li>

										<li>
											<a href="referees.php"><i class="fa fa-users"></i> Referencias</a>
										</li>
										<li>
											<a href="academic.php"><i class="fa fa-graduation-cap"></i> Grado Academico</a>
										</li>
										<li>
											<a href="experience.php"><i class="fa fa-briefcase"></i> Experiencia Laboral</a>
										</li>
										<li>
											<a href="attachments.php"><i class="fa fa-folder-open"></i> Otros Documentos Adjuntos</a>
										</li> 
										<li>
											<a href="applied-jobs.php"><i class="fa fa-bookmark"></i> Empleos de interés</a>
										</li>
										
										<li>
											<a href="../logout.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
										</li>
									</ul>
									
								</div>

							</div>
							
							<div class="GridLex-col-9_sm-8_xs-12">
							
								<div class="admin-content-wrapper">

									<div class="admin-section-title">
									
										<h2>Perfil</h2>
										<p>Último inicio de sesión: <span class="text-primary"><?php echo "$mylogin"; ?></span></p>
										
									</div>
									
									<form class="post-form-wrapper" action="app/update-profile.php" method="POST" autocomplete="off">
								
											<div class="row gap-20">
											<?php require 'constants/check_reply.php'; ?>

												<div class="clear"></div>
												
                                                  
                                                    

											
												<div class="col-sm-6 col-md-4">
											
													<div class="form-group">
														<label>Nombres</label>
														<input name="fname" required type="text" class="form-control" value="<?php echo "$myfname"; ?>" placeholder="Ingresa tu Nombres">
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Apellidos</label>
														<input name="lname" required type="text" class="form-control" value="<?php echo "$mylname"; ?>" placeholder="Ingresa tu Apellidos">
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Fecha de nacimiento</label>
														<div class="row gap-5">
															<div class="col-xs-3 col-sm-3">
																<select name="date" required class="selectpicker form-control" data-live-search="false">
																	<option disabled value="">day</option>
                                                                     <?php 
                                                                      $x = 1; 

                                                                      while($x <= 31) {
                                         
												                      if ($x < 10) {
														              $x = "0$x";
													                  print '<option '; if ($mydate == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
													                  }else{
													                  print '<option '; if ($mydate == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
													                  }
                                                                      $x++;
                                                                       } 
                                                                     ?>
																</select>
															</div>
															<div class="col-xs-5 col-sm-5">
																<select name="month" required class="selectpicker form-control" data-live-search="false">
                                                                     <?php 
                                                                      $x = 1; 

                                                                      while($x <= 12) {
                                         
												                      if ($x < 10) {
														              $x = "0$x";
													                  print '<option '; if ($mymonth == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
													                  }else{
													                  print '<option '; if ($mymonth == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
													                  }
                                                                      $x++;
                                                                       } 
                                                                     ?>
																</select>
															</div>
															<div class="col-xs-4 col-sm-4">
																<select name="year" class="selectpicker form-control" data-live-search="false">
													            <?php 
                                                                 $x = date('Y'); 
                                                                 $yr = 60;
													             $y2 = $x - $yr;
                                                                 while($x > $y2) {
                                         
													             print '<option '; if ($myyear == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
                                                                 $x = $x - 1;
                                                                  } 
                                                                  ?>
																</select>
															</div>
														</div>
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Email</label>
														<input type="email" name="email" required class="form-control" value="<?php echo "$myemail"; ?>" placeholder="Ingresa tu Correo Electrónico">
													</div>
													
												</div>
												
												<div class="clear"></div>

												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Nivel de Educación</label>
														<input value="<?php echo "$myedu"; ?>" name="education" type="text" required class="form-control" placeholder="Ejm: Superior, Secundaria...etc">
													</div>
													
												</div>
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Profesión</label>
														<input value="<?php echo "$mytitle"; ?>" name="title" required type="text" class="form-control mb-15" placeholder="Ejm: Ingenieria, Enfermería, IT...etc">
													</div>
													
												</div>
												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Genero</label>
														<select name="gender" required class="selectpicker show-tick form-control" data-live-search="false">
															<option disabled value="">Seleccionar</option>
															<option <?php if ($mygender == "Masculino") { print ' selected '; } ?> value="Masculino">Masculino</option>
															<option <?php if ($mygender == "Femenino") { print ' selected '; } ?>value="Femenino">Femenino</option>
														</select>
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Región</label>
														<input name="city" required type="text" class="form-control" value="<?php echo "$mycity"; ?>">
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Calle</label>
														<input name="street" required type="text" class="form-control" value="<?php echo "$mystreet"; ?>">
													</div>
													
												</div>
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Código Postal</label>
														<input name="zip" required type="text" class="form-control" value="<?php echo "$myzip"; ?>">
													</div>
													
												</div>

												<div class="clear"></div>
												

												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Distrito</label>
														<select name="country" required class="selectpicker show-tick form-control" data-live-search="true">
															<option disabled value="">Seleccionar</option>
						                                   <?php
														   require '../constants/db_config.php';
														   try {
                                                           $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                                           $stmt = $conn->prepare("SELECT * FROM tbl_countries ORDER BY country_name");
                                                           $stmt->execute();
                                                           $result = $stmt->fetchAll();
  
                                                           foreach($result as $row)
                                                           {
		                                                    ?> <option <?php if ($mycountry == $row['country_name']) { print ' selected '; } ?> value="<?php echo $row['country_name']; ?>"><?php echo $row['country_name']; ?></option> <?php
	 
	                                                        }

					  
	                                                       }catch(PDOException $e)
                                                           {

                                                           }
	
														   ?>
														</select>
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Telefono</label>
														<input type="text" name="phone" required class="form-control" value="<?php echo "$myphone"; ?>">
													</div>
													
												</div>

												


												<div class="clear"></div>
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>¿Quieres recibir notificaciones cuando una institución publique un nuevo empleo?</label>
														<select name="register" required class="selectpicker show-tick form-control" data-live-search="false">
															<option disabled value="">Seleccionar</option>
															<option <?php if ($myregister == "1") { print ' selected '; } ?> value="1">Si</option>
															<option <?php if ($myregister == "0") { print ' selected '; } ?>value="0">No</option>
														</select>
													</div>
													
												</div>
										 	<div class="col-sm-12 col-md-12">
												
													<div class="form-group bootstrap3-wysihtml5-wrapper">
														<label>Sobre mi</label>
														<textarea name="about" class="bootstrap3-wysihtml5 form-control" placeholder="Ingresa tu descripcion ..." style="height: 200px;"><?php echo "$mydesc"; ?></textarea>
													</div>
													
												</div> 
												
												<div class="clear"></div>

												<div class="col-sm-12 mt-10">
													<button type="submit" class="btn btn-primary">Actualizar</button>
													<button type="reset" class="btn btn-primary btn-inverse">Cancelar</button>
												</div>

											</div>
											
										</form><br>
										
										<form action="app/new-dp.php" method="POST" enctype="multipart/form-data">
										<div class="row gap-20">
										<div class="col-sm-12 col-md-12">
												
										<div class="form-group bootstrap3-wysihtml5-wrapper">
										<label>Mostrar Imagen</label>
										<input accept="image/*" type="file" name="image"  required >
										</div>
													
										</div>
												
										<div class="clear"></div>

										<div class="col-sm-12 mt-10">
										<button type="submit" class="btn btn-primary">Actualizar</button>
										<?php 
										if ($myavatar == null) {

										}else{
										?><a onclick = "return confirm('¿Estás seguro de que quieres eliminar tu avatar?')" class="btn btn-primary btn-inverse" href="app/drop-dp.php">Eliminar</a> <?php
										}
										?>
										</div>
										</div>
										</form>
									
								</div>

							</div>
							
						</div>

					</div>

				</div>
			
			</div>
<br>
<footer class="footer-wrapper">
			
				<div class="main-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-9">
							
								<div class="row">
								
									<div class="col-sm-6 col-md-4">
									
										<div class="footer-about-us">
											<h5 class="footer-title">Acerca de Empleo Cusco</h5>
											<p>Empleo Cusco es un portal donde podrás encontrar los trabajos que se acomoden a tu perfil.</p>
										
										</div>

									</div>
									
									<div class="col-sm-6 col-md-5 mt-30-xs">
										<h5 class="footer-title">Enlaces Rapidos</h5>
										<ul class="footer-menu clearfix">
											<li><a href="./">Inicio</a></li>
											<li><a href="job-list.php">Empleos</a></li>
											<li><a href="employers.php">Instituciones</a></li>
											 <!-- <li><a href="employees.php">Personas</a></li> -->
											<li><a href="contact.php">Contacto</a></li>
											<li><a href="#">Ir Arriba</a></li>

										</ul>
									
									</div>

								</div>

							</div>
							
							<div class="col-sm-12 col-md-3 mt-30-sm">
							
								<h5 class="footer-title">Contacto Empleo Cusco</h5>
								
								<p>Dirección : Cusco - Perú</p>
								<p>Correo Electrónico : <a href="mailto:informatica@guamanpoma.org">informatica@guamanpoma.org</a></p>
								<p>Celular : <a href="tel:+51999999999">+51999999999</a></p>
								

							</div>

							
						</div>
						
					</div>
					
				</div>
				
				<div class="bottom-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-4 col-md-4">
					
							<p class="copy-right">&#169;Copyright |  <?php echo date('Y'); ?> Centro Guaman Poma de Ayala</p>
								
							</div>
							
							<div class="col-sm-4 col-md-4">
							
								<ul class="bottom-footer-menu">
									<li><a >Todos los derechos reservados</a></li>
								</ul>
							
							</div>
							
							<div class="col-sm-4 col-md-4">
								<ul class="bottom-footer-menu for-social">
									<li><a href="<?php echo "$tw"; ?>"><i class="ri ri-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
									<li><a href="<?php echo "$fb"; ?>"><i class="ri ri-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
									<li><a href="<?php echo "$ig"; ?>"><i class="ri ri-instagram" data-toggle="tooltip" data-placement="top" title="instagram"></i></a></li>
								</ul>
							</div>
						
						</div>

					</div>
					
				</div>
			
			</footer>
		
			
		</div>

	</div>

 
 
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<script type="text/javascript"> 
    $('input[type=checkbox]').on('change', function (){
          let status = $(this).val();
          if(status === 'on')
           status ="1";
          else
           status ="0";
                  
          $.ajax({
            url : 'app/update-notifications.php',
            type : "post",
            data : { status : status}
          });
        });
    
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="../js/bootstrap-modal.js"></script>
<script type="text/javascript" src="../js/smoothscroll.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="../js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="../js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.js"></script>
<script type="text/javascript" src="../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../js/handlebars.min.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/easy-ticker.js"></script>
<script type="text/javascript" src="../js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="../js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="../js/customs.js"></script>


</body>



</html>