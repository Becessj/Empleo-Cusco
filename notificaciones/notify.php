<?php
$compname = $_POST["compname"];
function notify($to,$data){

    $api_key="";
    $url="https://fcm.googleapis.com/fcm/send";
    $fields=json_encode(array('to'=>$to,'notification'=>$data));

    // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($fields));

    $headers = array();
    $headers[] = 'Authorization: key ='.$api_key;
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

//$to="ffUOuETNW1Y:APA91bGtMFAdzZETNv1XrR6isZ7Y0lxCyiN6slUz1PidroWQ8wWJ36eulSbIi6rrSf3SfG1tZqb3Zu9jGwc14swZ1fDTk2acJuBVF8cItT7Zbu9uEoxtuh8mlWD9Bzfj4Zu38CxQZvNI";
$to = "/topics/empleoscusco";
$data=array(
    'title'=>$compname,
    'body'=>'Acaba de publicar un nuevo empleo',
    'image' => 'https://empleoscusco.guamanpoma.org/notificaciones/download.jpg',
);

notify($to,$data);
echo "Notificacion enviada desde la web";

?>
