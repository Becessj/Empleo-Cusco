<?php
include '../constants/settings.php';

$myfname = ucwords($_POST['fullname']);
$myemail = $_POST['email'];
$linkweb="https://empleoscusco.guamanpoma.org/";
/* $mymessage = $_POST['message']; */
echo $myemail;
echo $myfname;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    
    $mail->SMTPSecure = 'ssl'; 
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host =  'guamanpoma.org';                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username = 'usuariocorreoempleos@guamanpoma.org';
    $mail->Password = 'mFB{0G%6SfK(';                              //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('usuariocorreoempleos@guamanpoma.org' ,  '<Administrador - EMPLEO CUSCO>');
    $mail->addAddress($myemail);  
    /* $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/
      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      $mail->addAttachment('EmpleoCusco.pdf', 'EmpleoCusco.pdf');    //Optional name 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'ACERCA DE EMPLEO CUSCO';
    $text_message    = " gracias por solicitar más información de EMPLEO CUSCO, esta plataforma fué desarrollada para todas las personas interesadas en buscar un empleos dentro de la región del Cusco y exclusivamente dentro de las municipalidades";  
    // HTML email starts here
   
   $message  = "<html><body>";
   
   $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
   
   $message .= "<tr><td>";
   
   $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:1100px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    
   $message .= "<thead>
      <tr height='80'>
       <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >EMPLEO CUSCO</th>
      </tr>
      </thead>";
    
   $message .= "<tbody>
      <tr align='center' height='30' style='font-family:Verdana, Geneva, sans-serif;'>
       <td style='background-color:#004AAD; text-align:center;'><a href='' style='color:#fff; text-decoration:none;'></a></td>
       <td style='background-color:#004AAD; text-align:center;'><a href='' style='color:#fff; text-decoration:none;'></a></td>
       <td style='background-color:#004AAD; text-align:center;'><a href='' style='color:#fff; text-decoration:none;' ></a></td>
       <td style='background-color:#004AAD; text-align:center;'><a href='' style='color:#fff; text-decoration:none;' ></a></td>
      </tr>
      
      <tr>
       <td colspan='4' style='padding:15px;'>
        <p style='font-size:20px;'>Hola ".$myfname.", ".$text_message."</p>
        
        <img src='https://empleoscusco.guamanpoma.org/images/image.jpg' alt='Empleo Cusco' style='height:auto; width:100%; max-width:100%;' />
        <hr />
        <a href='https://empleoscusco.guamanpoma.org/' style='display:inline-block;background:#020202;color:#ffffff;font-family:OpenSans,OpenSans,Helvetica,Arial;font-size:24px;font-weight:bold;line-height:30px;margin:0;text-decoration:none;text-transform:none;padding:15px 80px;border-radius:0px;'> Ver más</a>
        
       
       </td>
      </tr>
      
      </tbody>";
    
   $message .= "</table>";
   
   $message .= "</td></tr>";
   $message .= "</table>";
   
   $message .= "</body></html>";
   
   // HTML email ends here
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location:../contact.php?r=5634");
    
} catch (Exception $e) {
 header("location:../contact.php?r=2974");
}
/* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mail/src/Exception.php';
require '../mail/src/PHPMailer.php';
require '../mail/src/SMTP.php';

function smtpmailer($to, $from, $from_name, $subject, $body){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'ssl'; 
    $mail->Host =  'tramitedocumentario.muniurubamba.gob.pe';
    $mail->Port = "465";  
    $mail->Username = 'tramitedoc@tramitedocumentario.muniurubamba.gob.pe';
    $mail->Password = '6ck]iRUQ0^H}';
    $mail->IsHTML(true);
    $mail->From="tramitedocumentario@muniurubamba.gob.pe";
    $mail->FromName=$from_name;
    $mail->Sender=$from;
    $mail->AddReplyTo($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->send()) {
        header("location:../contact.php?r=2974");
        } else {
        header("location:../contact.php?r=5634");
        }
}




$to1   = $myemail;

$from1 = 'tramitedocumentario@munianta.gob.pe';

$name1 = 'CUSCO TRABAJA | RECOMENDACIONES';

$subj1 = 'Recomendaciones' ;

$msg1 = $mymessage;

$error=smtpmailer($to1,$from1, utf8_decode($name1),$subj1, utf8_decode($msg1));

    echo $correo;
 */

/* $mail = new PHPMailer;
$mail->isSMTP();                                      
$mail->SMTPAuth = true;  
$mail->SMTPSecure = 'ssl';        
$mail->Host = $smtp_host;     
$mail->Port = "465";                      
$mail->Username = $smtp_user;               
$mail->Password = $smtp_pass;                       
            
$mail->isHTML(true);

$mail->setFrom($myemail, $myfname);
$mail->addAddress($contact_mail);           
  


$mail->Subject = 'Contact';
$mail->Body    = $mymessage;
$mail->AltBody = $mymessage;

if(!$mail->send()) {
header("location:../contact.php?r=2974");
} else {
header("location:../contact.php?r=5634");
}
 */



?>