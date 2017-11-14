<?php

require 'db.php';
require 'user_required.php';
require 'admin_required.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$id = (String)$_POST['id']; 
    $pom = (int)$_POST['pom'];
    if (!$id){

	die("Err");
	}
	
	if ($pom >= 2){

	die("Err");
	}
	
    
	$stmt = $db->prepare("UPDATE Orders2 SET Ok = ? WHERE NumberOrder = ?");
	$stmt->execute(array($pom, $id));
	
	header('Location: detailOrder.php?best='.$id);
}

?>

<!DOCTYPE html>

<html>

<head>
  <title>Street Change Webpage</title>
  <!--CSS style-->
  <link rel="stylesheet" type="text/css" href="./style.css"/>
  <meta charset="utf-8"/>
  <!--HTML5 Shiv-->
  <script src="./js/html5shiv.js"></script>
</head>
<body>

	

</body>

</html>
