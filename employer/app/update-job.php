<?php
setlocale(LC_ALL,"es_ES");
date_default_timezone_set("America/Lima");
require '../../constants/db_config.php';
require '../constants/check-login.php';

$job_id = $_POST['jobid'];
$title  = ucwords($_POST['title']);
$city  = ucwords($_POST['city']);
$country = $_POST['country'];
$category = $_POST['category'];
$type = $_POST['jobtype'];
$exp = $_POST['experience'];
$desc = ucfirst($_POST['description']);
$rec = ucfirst($_POST['requirements']);
$res = ucfirst($_POST['responsiblities']);
$deadline = $_POST['deadline'];
echo $deadline;

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("UPDATE tbl_jobs SET title = :title, city = :city, country = :country, category = :category, type = :type, experience = :experience, description = :description, responsibility = :responsibility, requirements = :requirements, closing_date = :deadline WHERE job_id = :jobid AND company = '$myid'");
$stmt->bindParam(':title', $title);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':country', $country);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':experience', $exp);
$stmt->bindParam(':description', $desc);
$stmt->bindParam(':responsibility', $res);
$stmt->bindParam(':requirements', $rec);
$stmt->bindParam(':deadline', $deadline);
$stmt->bindParam(':jobid', $job_id);
$stmt->execute();

header("location:../edit-job.php?r=0369&jobid=$job_id");
					  
}catch(PDOException $e)

{
    echo $e;
}
	
?>
