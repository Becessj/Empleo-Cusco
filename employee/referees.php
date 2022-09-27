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

if (isset($_GET['page'])) {
$page = $_GET['page'];
if ($page=="" || $page=="1")
{
$page1 = 0;
$page = 1;
}else{
$page1 = ($page*5)-5;
}					
}else{
$page1 = 0;
$page = 1;	
}
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Empleo Cusco - Referencias</title>
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
								<a href="../employers.php">Empresas</a>
							</li>
						
							
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
						<li><span>Referencias</span></li>
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
										<a href="my_cv" class="btn btn-primary btn-sm btn-inverse">VER MI CV</a>
										
									</div>
									
									<ul class="admin-user-menu clearfix">
										<li>
											<a href="./"><i class="fa fa-user"></i> Perfil</a>
										</li>
										<li class="">
										<a href="change-password.php"><i class="fa fa-key"></i> Cambiar Contraseña</a>
										</li>
										<li  >
											<a href="qualifications.php"><i class="fa fa-trophy"></i> Cualidades Profesionales</a>
										</li>
										<li>
											<a href="language.php"><i class="fa fa-language"></i> Dominio del Idioma</a>
										</li>
										<li>
											<a href="training.php"><i class="fa fa-gears"></i> Entrenamiento y Taller</a>
										</li>
										<li class="active">
											<a href="referees.php"><i class="fa fa-users"></i> Referencias</a>
										</li>
										<li >
											<a href="academic.php"><i class="fa fa-graduation-cap"></i> Calificaciones Academicas</a>
										</li>
										<li>
											<a href="experience.php"><i class="fa fa-briefcase"></i> Experiencia Laboral</a>
										</li>
										<li>
											<a href="attachments.php"><i class="fa fa-folder-open"></i> Otros Documentos Adjuntos</a>
										</li>
										<li>
											<a href="applied-jobs.php"><i class="fa fa-bookmark"></i> Empleos Presentados</a>
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
									
										<h2>Referencias</h2>
					
										
									</div>
									
									<div class="resume-list-wrapper">
									<?php require 'constants/check_reply.php'; ?>
									<?php
									require '../constants/db_config.php';
									try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT * FROM tbl_referees WHERE member_no = '$myid' ORDER BY id LIMIT $page1,5");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
									 $refname = $row['ref_name'];
									 $refmail = $row['ref_mail'];
									 $reftitle = $row['ref_title'];
									 $refphone = $row['ref_phone'];
									 $ref_id = $row['id'];
									 $institution = $row['institution'];
									 $nuevoref=utf8_encode($refname);
									 
									 ?>
									 									<div class="resume-list-item">
										
											<div class="row">
											
												<div class="col-sm-12 col-md-10">
												
													<div class="content">
													
														<a>

															<div class="image">
                                                            <center><img src="../images/default.jpg"  alt="image" width="100" height="100" /></center>

															</div>
															
															<h4><?php echo "$nuevoref"; ?></h4>
															
															<div class="row">
																<div class="col-sm-12 col-md-9">
																	<i class="fa fa-building text-primary mr-5"></i><strong class="mr-10"><?php echo $row['institution']; ?></strong> <i class="fa fa-user text-primary mr-5"></i> <?php echo "$reftitle"; ?>.
																</div>

															</div>

														</a>
													
													</div>
												
												</div>
												
												<div class="col-sm-12 col-md-2">
													
													<div class="resume-list-btn">
													
														<a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" class="btn btn-primary btn-sm mb-5 mb-0-sm">Editar</a>
									<a href="app/drop-ref.php?id=<?php echo $row['id']; ?>" onclick = "return confirm('¿Está seguro de que desea eliminar esta referencia?')" class="btn btn-primary btn-sm btn-inverse">Eliminar</a>
									<div id="edit<?php echo $row['id']; ?>" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				                    <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                 <h4 class="modal-title text-center"><?php echo "$refname"; ?></h4>
				                    </div>
				
				                    <div class="modal-body">
									<form action="app/update-ref.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					                <div class="row gap-20">
									
									<div class="col-sm-6 col-md-6">
				
							        <div class="form-group"> 
								    <label>Nombre del Referente</label>
								    <input class="form-control" value="<?php echo "$refname"; ?>" placeholder="Ingresa nombre del referente" type="text" name="name" required> 
							        </div>
						
						             </div>
									 
								

						
						             <div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Correo Electrónico</label>
								    <input class="form-control" value="<?php echo "$refmail"; ?>"placeholder="Ingresa email del referente" type="email" name="email" required> 
							        </div>
						
						           </div>
						
						             <div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Titulo de Referencia</label>
								    <input class="form-control" value="<?php echo "$reftitle"; ?>" placeholder="Ingresa Titulo de Referencia" type="text" name="title" required> 
							        </div>
						
						           </div>
								   
						             <div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Teléfono Referencia</label>
								    <input class="form-control" value="<?php echo "$refphone"; ?>" placeholder="Ingresa teléfono de referencia" type="text" name="phone" required> 
							        </div>
						
						           </div>

								   
								   	<div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label>Nombre de la Institución</label>
								    <input class="form-control" value="<?php echo "$institution"; ?>" placeholder="Ingresa Nombre de la Institución" type="text" name="institution" required> 
							        </div>
					
						
					               </div>
				                   </div>
				                   </div>
				                   <input type="hidden" name="refid" value="<?php echo "$ref_id"; ?>">
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary">Enviar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
			                       </div>

													</div>
													
	
													
												</div>
												
											</div>
										
										</div>
										<?php
		

	                                }

					  
	                                }catch(PDOException $e)
                                    {

                                    }

									
									?>

									<div class="pager-wrapper">
								
						            <ul class="pager-list">
								<?php
								$total_records = 0;
									require '../constants/db_config.php';
									try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT * FROM tbl_referees WHERE member_no = '$myid' ORDER BY id");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
                                    $total_records++;
									
	                                }

					  
	                                }catch(PDOException $e)
                                    {

                                    }
									
								$records = $total_records/5;
                                $records = ceil($records);
				                if ($records > 1 ) {
								$prevpage = $page - 1;
								$nextpage = $page + 1;
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="referees.php?page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?>  href="referees.php?page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="referees.php?page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
					             }

								
								?>

						            </ul>	
					
					                </div>

										
		
										
									</div>
									
									<div class="mt-30">
									
										<a data-toggle="modal" href="#QualifModal" class="btn btn-primary btn-lg">Agregar Nuevo</a>
										
									</div>
									<div id="QualifModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				                    <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                 <h4 class="modal-title text-center">Agregar Referencia</h4>
				                    </div>
				
				                    <div class="modal-body">
									
									<form action="app/add-referee.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					                <div class="row gap-20">
									
									<div class="col-sm-6 col-md-6">
				
							        <div class="form-group"> 
								    <label>Nombre Referente</label>
								    <input class="form-control" placeholder="Ingrese nombre referente" type="text" name="name" required> 
							        </div>
						
						             </div>
									 
								

						
						             <div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Correo Electrónico Referente</label>
								    <input class="form-control" placeholder="Ingrese email de referencia" type="email" name="email" required> 
							        </div>
						
						           </div>
						
						             <div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Título Referente</label>
								    <input class="form-control" placeholder="Ingrese Título referente" type="text" name="title" required> 
							        </div>
						
						           </div>
								   
						             <div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Teléfono Referente</label>
								    <input class="form-control" placeholder="Ingrese teléfono referente" type="text" name="phone" required> 
							        </div>
						
						           </div>

								   
								   	<div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label>Nombre de la Institución</label>
								    <input class="form-control" placeholder="Ingresa Nombre de la Institución" type="text" name="institution" required> 
							        </div>
					
						
					               </div>
				                   </div>
				
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary">Guardar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
			                       </div>
									
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

<script type="text/javascript" src="../js/fileinput.min.js"></script>
<script type="text/javascript" src="../js/customs-fileinput.js"></script>


</body>


</html>