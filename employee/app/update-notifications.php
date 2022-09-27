<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';

$status = $_POST['status'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :email AND member_no != '$myid'");
    	$stmt->bindParam(':email', $myemail);
        $stmt->execute();
        $result = $stmt->fetchAll();
    	$rec = count($result);
    	if ($rec == "0") {
            $stmt = $conn->prepare("UPDATE tbl_users SET register = :status WHERE member_no='$myid'");
            $stmt->bindParam(':status', $status);
            $stmt->execute();
        	$_SESSION['myfname'] = $fname;
        	$_SESSION['mylname'] = $lname;
            $_SESSION['myemail'] = $myemail;
        	$_SESSION['mydate'] = $mydate;
        	$_SESSION['mymonth'] = $mymonth;
        	$_SESSION['myyear'] = $myyear;
            $_SESSION['myphone'] = $phone;
        	$_SESSION['myedu'] = $edu;
        	$_SESSION['mytitle'] = $title;
        	$_SESSION['mycity'] = $city;
        	$_SESSION['mystreet'] = $street;
        	$_SESSION['myzip'] = $zip;
            $_SESSION['mycountry'] = $country;
            $_SESSION['mydesc'] = $about;
        	$_SESSION['gender'] = $gender;
            header("location:../?r=9837");
    		
    	}else{
    		
    		header("location:../?r=0927");
    	}
			  
	}catch(PDOException $e)
    {

    }
	
?>
