<!doctype html>
<html lang="es_ES">
<?php 
require 'constants/settings.php'; 
require 'constants/check-login.php';
require 'constants/db_config.php';  
if(isset($_SESSION['views']))
    $_SESSION['views'] = $_SESSION['views']+1;
else
    $_SESSION['views']=1;
	
      
if (isset($_GET['jobid'])) {

$jobid = $_GET['jobid'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_jobs WHERE job_id = :jobid");
	$stmt->bindParam(':jobid', $jobid);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$rec = count($result);
	if ($rec == "0") {
	header("location:./");	
	}else{

    foreach($result as $row)
    {
	$jobtitle = $row['title'];
	$jobcity = $row['city'];
	$jobcountry = $row['country'];
	$jobcategory = $row['category'];
	$jobtype = $row['type'];
	$experience = $row['experience'];
	$jobdescription = $row['description'];
	$jobrespo = $row['responsibility'];
	$jobreq = $row['requirements'];
	$closingdate = $row['closing_date'];
	$opendate = $row['date_posted'];
	$compid = $row['company'];
	if ($jobtype == "Locación") {
	$sta = '<span class="label label-success">Locación</span>';
											  
	}
	if ($jobtype == "Prácticas") {
	$sta = '<span class="label label-danger">Prácticas</span>';
											  
	}
	if ($jobtype == "CAS") {
	$sta = '<span class="label label-warning">CAS</span>';
											  
	}

	
	}
	}

					  
	}catch(PDOException $e)
    {

    }


}else{
header("location:./");	
}


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE member_no = '$compid'");
$stmt->execute();
$result = $stmt->fetchAll();


    foreach($result as $row)
    {
    $compname = $row['first_name'];
	$complogo = $row['avatar'];
	$compbout = $row['about'];
	}

					  
	}catch(PDOException $e)
    {

    }
	


$today_date = strtotime(date('Y-m-d'));
$last_date = date_format(date_create_from_format('Y-m-d', $closingdate), 'Y/m/d');
$post_date = date_format(date_create_from_format('Y-m-d', $closingdate), 'd');
$post_month = date_format(date_create_from_format('Y-m-d', $closingdate), 'm');
$post_year = date_format(date_create_from_format('Y-m-d', $closingdate), 'Y');
$conv_date = strtotime($last_date);

if ($today_date > $conv_date){
$jobexpired = true;
}else{
$jobexpired = false;
}
?>


<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Empleo Cusco - <?php echo "$jobtitle"; ?></title>
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


	<link rel="shortcut icon" href="images/ico/favicon.png">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="icons/linearicons/style.css">
	<link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="icons/rivolicons/style.css">
	<link rel="stylesheet" href="icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="icons/flaticon-ventures/flaticon-ventures.css">

	<link href="css/style.css" rel="stylesheet">



	
</head>

<body class="not-transparent-header">

	<div class="container-wrapper">


		<header id="header">

			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="./"><img src="images/logo.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
							
								<a href="./">Inicio</a>
								
							</li>
							
							<li>
								<a href="job-list.php">Empleos</a>

							</li>
							
							<li>
								<a href="employers.php">Instituciones</a>
							</li>
							
							<!-- <li>
								<a href="employees.php">Personas</a>
							</li> -->
							
							<li>
								<a href="contact.php">Contacto</a>
							</li>

						</ul>
				
					</div>

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
						<?php
						if ($user_online == true) {
						print '
						    <li><a href="logout.php">Cerrar Sesión</a></li>
							<li><a href="'.$myrole.'">Perfil</a></li>';
						}else{
						print '
							<li><a href="login.php">Ingresar</a></li>
							<li><a data-toggle="modal" href="#registerModal">Registro</a></li>';						
						}
						
						?>

						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

			
		</header>
			<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Crea tu cuenta gratis</h4>
				</div>
				
				<div class="modal-body">
				
					<div class="row gap-20">
					
						<div class="col-sm-6 col-md-6">
							<a href="register.php?p=Employer" class="btn btn-facebook btn-block mb-5-xs">Registro Empresa</a>
						</div>
						<div class="col-sm-6 col-md-6">
							<a href="register.php?p=Employee" class="btn btn-facebook btn-block mb-5-xs">Registro Personal</a>
						</div>

					</div>
				
				</div>
				
				<div class="modal-footer text-center">
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				</div>
				
			</div>
			
		<div class="main-wrapper">
		
			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="job-list.php">Todos los trabajos</a></li>
						<li><a href="company.php?ref=<?php echo "$compid"; ?>"><?php echo "$compname"; ?></a></li>
						<li><span><?php echo "$jobtitle"; ?></span></li>
					</ol>
					
				</div>
				
			</div>
			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-md-10 col-md-offset-1">
						
							<div class="job-detail-wrapper">
							
								<div class="job-detail-header text-center">
											
									<h2 class="heading mb-15"><?php echo "$jobtitle"; ?></h2>
								
									<div class="meta-div clearfix mb-25">
										<span>para la <a href="company.php?ref=<?php echo "$compid"; ?>"><?php echo "$compname"; ?></a>, tipo </span>
										<?php echo "$sta"; ?>
									</div>
									
									<ul class="meta-list clearfix">
										<li>
											<h4 class="heading"><i class="fa fa-map-marker"></i> Ubicación:</h4>
											<?php echo "$jobcity"; ?> , <?php echo "$jobcountry"; ?>
										</li>
										<li>
											<h4 class="heading"><i class="fa fa-hourglass-end"></i> Finalización:</h4>
											 <?php echo "$post_date"; ?>/<?php echo "$post_month"; ?>/<?php echo "$post_year"; ?>
										</li>
										<li>
											<h4 class="heading"><i class="fa fa-users"></i> Experiencia</h4>
											<?php echo "$experience"; ?> 
										</li>
										<li>
											<h4 class="heading"><i class="fa fa-calendar-times-o"></i> Publicado: </h4>
											<?php echo "$opendate"; ?>
										</li>
									</ul>
									
								</div>
					
								<div class="job-detail-company-overview clearfix">
								
									<h3 style="color:Tomato;">
									    <button name="aviso" class="btn"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                          <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                                        </svg>
                                    </button>
									    Resumen de la institución</h3>
									<div class="image">
										<?php 
										if ($complogo == null) {
										print '<center>No Company Logo</center>';
										}else{
										echo '<center><img class="autofit2" alt="image" title="'.$compname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										}
										?>
									</div>
									
									<p><?php echo "$compbout"; ?></p>
									
								</div>
								
								<div class="job-detail-content mt-30 clearfix">
								
									<h3 style="color:Tomato;">
									    <button name="aviso" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                      <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                      <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                    </button> 
									     Descripción del trabajo</h3>

									<p><?php echo "$jobdescription"; ?></p>

									
									<h3 style="color:Tomato;">
									    <button name="aviso" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                          <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                          <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    </button> 
									    
									     Funciones y requerimientos del empleo</h3>
									
                                    <p><?php echo "$jobrespo"; ?></p>
									<h3 style="color:Tomato;"> <button name="aviso" class="btn" onclick="aviso()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                      <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg>
                                    </button> ¿Cómo postular?</h3>
									
                                    <p>Las personas interesadas en participar en el proceso que cumplan con los requisitos establecidos, deberán presentar el Curriculum Vitae documentado en mesa de partes de la institución responsable de 08:00 a 15:00 horas.
									</p>
										
									<h3 style="color:Tomato;">
									    <button name="aviso" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                            </svg>
                                    </button>
									     Más información del empleo:</h3>
									      <p>  Click en el URL:   <?php echo "$jobreq"; ?></p>
                                            									
										
									<h3 style="color:Tomato;">
									    <button name="aviso" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </button>
									     Vistas</h3>
										
										<p><?php echo"Esta publicación la vieron ".$_SESSION['views'].' personas'; ?></p>
								</div>
								
								<div class="apply-job-wrapper">
								<?php
						        if ($user_online == true) {
    								if ($jobexpired == true) {
    								    print '<button class="btn btn-danger disabled btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-calendar"></i> Convocatoria finalizada</button>';
    								}else{
        								if ($myrole == "employee") {
                                            print '<button';?> onclick="update(this.value)" <?php print ' value="'.$jobid.'" class="btn btn-success btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-pencil"></i> Estoy interesado</button>';
        								}else{
        								    print '<button';?> onclick="location.href='https://empleoscusco.guamanpoma.org/login.php'" <?php print  'class="btn btn-primary  btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-padlock"></i> Inicia sesión(personas)</button>';
        								}	
    								}
    
    								
    								}else{
    									
    								    print '<button';?> onclick="location.href='https://empleoscusco.guamanpoma.org/login.php'" <?php print 'class="btn btn-success btn-hidden btn-lg collapsed"><i class="flaticon-line-icon-set-padlock"></i> INICIA SESIÓN</button>';	
    								}
    								
								?>
								
								<p id="data"></p>

								</div>
								
								<div class="tab-style-01">
								
									<ul class="nav" role="tablist">
										<li role="presentation" class="active"><h4><a href="#relatedJob1" role="tab" data-toggle="tab">Más trabajo de la <?php echo "$compname"; ?></a></h4></li>
									</ul>

									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="relatedJob1">
											<div class="tab-content-inner">
							<div class="recent-job-wrapper alt-stripe mr-0">
							<?php
							require 'constants/db_config.php';
							try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT * FROM tbl_jobs WHERE company = '$compid' AND job_id != :jobid ORDER BY rand() LIMIT 5");
							$stmt->bindParam(':jobid', $jobid);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
  

                            foreach($result as $row) {
    							$post_date = date_format(date_create_from_format('Y-m-d', $row['closing_date']), 'd');
                                $post_month = date_format(date_create_from_format('Y-m-d', $row['closing_date']), 'm');
                                $post_year = date_format(date_create_from_format('Y-m-d', $row['closing_date']), 'Y');
                                $jobtype = $row['type'];
    							
    							$jobtype = $row['type'];
    							if ($jobtype == "Locación") {
    	                        $sta = '<div class="job-label label label-success">
    									Locación
    									</div>';
    											  
    	                        }
    	                        if ($jobtype == "Prácticas") {
    	                        $sta = '<div class="job-label label label-danger">
    									Prácticas
    									</div>';
    											  
    	                        }
    	                        if ($jobtype == "CAS") {
    	                              $sta = '<div class="job-label label label-warning">
    								  CAS
    									</div>';
											  
	                        }
							
							?>
																											<a href="explore-job.php?jobid=<?php echo $row['job_id']; ?>" class="recent-job-item clearfix">
														<div class="GridLex-grid-middle">
															<div class="GridLex-col-6_sm-12_xs-12">
																<div class="job-position">
																	<div class="image">
																	 <?php 
										                            if ($complogo == null) {
										                            print '<center><img class="autofit3" alt="image"  src="images/blank.png"/></center>';
										                            }else{
										                            echo '<center><img class="autofit3" alt="image" title="'.$compname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										                            }
										                             ?>
																	</div>
																	<div class="content">
																		<h4><?php echo $row['title']; ?></h4>
																		<p><?php echo "$compname"; ?></p>
																	</div>
																</div>
															</div>
															<div class="GridLex-col-3_sm-8-xs-8_xss-12 mt-10-xss">
																<div class="job-location">
																	<i class="fa fa-map-marker text-primary"></i> <?php echo $row['country']; ?>
																</div>
															</div>
															<div class="GridLex-col-3_sm-4_xs-4_xss-12">
                                                             <?php echo "$sta"; ?>
																<span class="font12 block spacing1 font400 text-center"> Finaliza - <?php echo "$post_date"; ?>/<?php echo "$post_month"; ?>/<?php echo "$post_year"; ?></span>
															</div>
														</div>
													</a>
													<?php
								
								
							}

	                        }catch(PDOException $e)
                            { 
                   
                             }
                             ?>
						



							
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
	function update(str){
		Swal.fire({
		title: "¿Estás seguro que quieres poner en lista este trabajo? ",
		text: "¡No podrás revertir esto!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si'
		}).then((result) => {
		if (result.value) {
				document.getElementById("data").innerHTML = "Espera por favor...";
             var xmlhttp;
    
          if (window.XMLHttpRequest)
          {
            xmlhttp=new XMLHttpRequest();
          }
          else
          {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }	
    
          xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
              document.getElementById("data").innerHTML = xmlhttp.responseText;
            }
          }
    
          xmlhttp.open("GET","app/apply-job.php?opt="+str, true);
          xmlhttp.send();
		}
		else {
    
        }
		})
	}
</script>
<script type="text/javascript">
  function aviso() {
    Swal.fire({
        html: `<img src="images/popup.PNG" class="responsive" width="750" height="350"></img>`,
        //footer: '<a href=""></a>',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
          confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Entendido!',
  confirmButtonAriaLabel: 'Thumbs up, great!',
  cancelButtonText:
    '<i class="fa fa-thumbs-down"></i>',

          width: '800px'
        })
}
</script>
<script src="../js/sweetalert2.js"></script>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/jquery.countimator.js"></script>
<script type="text/javascript" src="js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="js/customs.js"></script>


</body>

</html>