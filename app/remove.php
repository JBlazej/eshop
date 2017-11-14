<?php

require 'db.php';
require 'user_required.php';
require 'admin_required.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = (int)$_POST['id'];
	if (!$id){
	header('Location: administration.php');
	}
	$stmt = $db->prepare("DELETE FROM Goods WHERE id = ? LIMIT 1");
	$stmt->bindValue(1, $id, PDO::PARAM_INT);
	$stmt->execute();
	header('Location: administration.php');
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
