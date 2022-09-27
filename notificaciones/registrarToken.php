<?php

    if(isset($_POST["Token"])) {
        $token = $_POST["Token"];
        
        $con = mysqli_connect("localhost", "usuarioempleo", "g%}fqS^EigmH", "bwirejobs_db") or die("Error al conectarse");
        
        $query = "INSERT INTO users (Token) VALUES ( '$token') "
        ." ON DUPLICATE KEY UPDATE Token = '$token';";
        
        mysqli_query($con, $query) or die(mysqli_error($con));
        
        mysqli_close($con);
        echo 'registrado';
        
    }
    
?>
