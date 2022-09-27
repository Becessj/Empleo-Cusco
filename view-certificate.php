<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Empleo Cusco - Ver Certificado</title>
<link rel="shortcut icon" href="images/ico/favicon.png">
<link href="css/main.css" rel="stylesheet">
</head>

<body>
<?php
// Send headers
	header("Pragma: public");
    header("Expires: 0");
    header("Accept-Ranges: bytes");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=order.pdf");
    header("Content-Transfer-Encoding: binary");



require 'constants/db_config.php';
$file_id = $_GET['id'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_professional_qualification WHERE id = :fileid");
$stmt->bindParam(':fileid', $file_id);
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{
    $certificate = $row['certificate'];
	
	?>
	<div style="width:100%">
        <iframe style="border:none;" src="ViewerJS/?title=CERTIFICATE#<?php echo 'data:application/pdf;base64,'.base64_encode($certificate).'' ?>" height="100%" width="100%"></iframe>

    </div>

<?php
}

					  
}catch(PDOException $e)
{

}

?>
</body>

</html>