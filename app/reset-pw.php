<?php
$opt = $_GET['opt'];
require '../constants/settings.php';
require '../constants/db_config.php';
require '../constants/uniques.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :email");
	$stmt->bindParam(':email', $opt);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
	
	if ($rec == "0") {
	    print '
	 <div class="alert alert-warning">
         Ninguna cuenta está asociada a este correo electrónico <strong>'.$opt.'</strong>
	 </div>
     ';
		
	}else{
    foreach($result as $row)
    {
	
    $myfname = $row['first_name'];
	$mylname = $row['last_name'];
	$mymail = $row['email'];
	$full_name = "$myfname $mylname";
	$idt = 'token'.get_rand_numbers(17).'';
    $token = md5($idt);
    $def_link = 'https://'.$_SERVER['HTTP_HOST'].'/reset.php?token='.$token.'';

    $stmt = $conn->prepare("DELETE FROM tbl_tokens WHERE email = :email");
	$stmt->bindParam(':email', $opt);
    $stmt->execute();

    $stmt = $conn->prepare("INSERT INTO tbl_tokens (email, token) VALUES (:email, :token)");
    $stmt->bindParam(':email', $opt);
	$stmt->bindParam(':token', $token);
    $stmt->execute();	

	$message = "Hola!! <b>$full_name</b>, <br>Click <a href='$def_link'>aquí</a> para restablecer tu <b>contraseña</b> .";   
    //require '../mail/PHPMailerAutoload.php';

    $mail = new PHPMailer;
                          

    $mail->isSMTP();                                      
    $mail->Host = $smtp_host;
    $mail->SMTPAuth = true;                           
    $mail->Username = $smtp_user;               
    $mail->Password = $smtp_pass;                          
    $mail->SMTPSecure = 'ssl';                            
    $mail->Port = 465;                                   

    $mail->setFrom($smtp_user, 'empleocusco@no-reply');
    $mail->addAddress($mymail , $full_name);              
   
    $mail->isHTML(true);                                 
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Restablecer contraseña - EMPLEO CUSCO';
    $mail->Body    = $message;
    $mail->AltBody = $message;

    if(!$mail->send()) {
    print '
	 <div class="alert alert-danger">
     Ocurrió un error, contáctanos por favor
	 </div>
     ';
    } else {
    print '
	 <div class="alert alert-info">
    Un link para restablecer tu contraseña fue enviado a '.$mymail.'.
	 </div>
     ';
    }

	
    }
} 


					  
	}catch(PDOException $e)
    {

    }
	


?>
