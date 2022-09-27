<?php
include '../constants/settings.php';
require '../constants/db_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$employee='employee';
$compname = $_POST["compname"];



error_reporting(E_STRICT | E_ALL);

date_default_timezone_set('Etc/UTC');

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';



 
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT first_name, email FROM tbl_users WHERE role = 'employee' and register='1'");
    $stmt->execute();
    $result = $stmt->fetchAll();
   // HTML email ends here
    foreach($result as $row) {
        $first_name= $row['first_name'];
        $email= $row['email'];
        sendemail($first_name,$email,$compname);
    }

function sendemail($name,$email,$compname){
    try{
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $body = file_get_contents('contents.html');
        $mail->SMTPSecure = 'ssl'; 
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     //Enable verbose debug output
        $mail->isSMTP();     
        $correo->SMTPDebug = 4;//Send using SMTP
        $mail->Host =  'smtp.guamanpoma.org';                    //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->SMTPAutoTLS = true;
        $mail->Username = 'usuariocorreoempleos@guamanpoma.org';
        $mail->Password = 'mFB{0G%6SfK(';  
        //$mail->SMTPKeepAlive = true;
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
         //Recipients
        $mail->setFrom('usuariocorreoempleos@guamanpoma.org' , '<Administrador - EMPLEO CUSCO>');
        $mail->addAddress($email,$name);
        //Content
        $mail->isHTML(true);//Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $compname.' ha publicado un nuevo empleo';
       // HTML email ends here
        $mail->Body = $body;
            // HTML email starts here
           
        $message  = "<html><body>";
        $message .= "</body></html>";
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Mensaje enviado a '.$email .'<br>';
        }
         //Clear all addresses and attachments for the next iteration
        $mail->clearAddresses();
        $mail->clearAttachments();
        //echo '<br>enviado a  '.$email .'<br>';
        
    } catch (Exception $e) {
  echo '<br>Mailer Error: <br>'  . $mail->ErrorInfo;
}

}

?>