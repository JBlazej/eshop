<?php
# pripojeni do db
require 'db.php';
# pristup jen pro prihlaseneho uzivatele
require 'user_required.php';
# session pole pro kosik

$stmt = $db->prepare("SELECT * FROM Goods WHERE id=?");
$stmt->execute(array($_GET['id']));
$goods = $stmt->fetch();

if (!$goods){
	die("Unable to find goods!");
}

$velikost = $_GET['velikost'];
$ks = $_GET['ks'];

if (!$velikost){

die("Err");
}

if (!$ks){

die("Err");
}


$stm = $db->prepare("INSERT INTO TMP(`IDUser`, `IDProd`, `Big`, `Amount`,`Price` ) VALUES (?, ?, ?, ?,?)");
$stm->execute(array($current_user['id'], (int)$_GET['id'], (String)$velikost, (int)$ks, $goods["price"] ));

header('Location: cart.php');
    
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	<title>Street Change Webpage</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	

</body>

</html>
