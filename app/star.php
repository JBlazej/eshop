<?php
require 'db.php';
require 'user_required.php';
require 'admin_required.php';

$stmt = $db->prepare("SELECT NumberOrder, SUM(Amount) as PrP, TotalPrice FROM Orders2 WHERE Ok = 1 AND MONTH(Date) = MONTH(CURRENT_DATE()) GROUP BY NumberOrder ");
$stmt->execute();
$mount = $stmt->fetchAll();



$stm = $db->prepare("SELECT NumberOrder, SUM(Amount) as PrP, TotalPrice FROM Orders2 WHERE Ok = 1 AND YEAR(Date) = YEAR(CURRENT_DATE()) GROUP BY NumberOrder ");
$stm->execute();
$years = $stm->fetchAll();

$st = $db->prepare("SELECT NumberOrder FROM Orders2 WHERE Ok = 0 AND NumberOrder IN (SELECT NumberOrder FROM Orders2 WHERE MONTH (Date) = MONTH (CURRENT_DATE())) GROUP BY NumberOrder ");
$st->execute();
$today = $st->fetchAll();




?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Street Change Webpage</title>
<!--CSS style-->
<link rel="stylesheet" type="text/css" href="./style.css"/>
<meta charset="utf-8"/>
<!--HTML5 Shiv-->
<script src="./js/html5shiv.js"></script>
</head>
<body>

<div id="container">
<!--Include HEADER-->
<?php include("header.php");?>

<div id="box">
<h2>Statistics</h2>
</div>

<div class="bordel">
<a href="administration.php"><h3>Admin</h3></a>
<a href="newOrders.php"><h3>New Orders</h3></a>
<a href="oldOrders.php"><h3>Finished orders</h3></a>
<a href="addForm.php"><h3>New good</h3></a>
<a href="star.php"><h3>Statistics</h3></a>
</div>	

<?php if($mount) { ?>
<div id="counter1">	
<?php foreach($mount as $row) { 
if (!isset($sub)) {
$sub = 0;
}
if (!isset($tots)) {
$tots = 0;
}
if (!isset($subs)) {
$subs = 0;
}
if (!isset($totss)) {
$totss = 0;
}     


$sub = $row['TotalPrice']; 
$tots += $sub;

$subs = $row['PrP']; 
$totss += $subs;
?>
<?php } ?>


<div class="cn1">
<h1>Yield per month</h1>
<h2><?= number_format($tots, 2) ?> CZK</h2>	
<h2>Total pieces <?= $totss ?></h2>
</div>
</div>  
<?php } else { ?>
<div class="cn1">
<h1>Yield per month</h1>
<h2>0 CZK</h2>	
<h2>Total pieces 0</h2>
</div>

<?php } ?>

<?php if($years) { ?>            
<div id="counter2">
<?php foreach($years as $rows) { 
if (!isset($sus)) {
$sus = 0;
}
if (!isset($to)) {
$to = 0;
}
if (!isset($suss)) {
$suss = 0;
}
if (!isset($tos)) {
$tos = 0;
}     


$sus = $rows['TotalPrice']; 
$to += $sus;

$suss = $rows['PrP']; 
$tos += $suss;
?>
<?php } ?> 


<div class="cn2">
<h1>Yield per year</h1>
<h2><?= number_format($to, 2) ?> CZK</h2>	
<h2>Total pieces <?= $tos ?></h2>
</div>
</div>
<?php } else { ?>
<div class="cn2">
<h1>Yield per year</h1>
<h2>0 CZK</h2>	
<h2>Total pieces 0</h2>
</div>
<?php } ?>

<?php if($today) { ?>              
<div id="counter4">
<?php foreach($today as $roww) { 
if (!isset($i)) {
$i = 0;
}
$i++;  
?>
<?php } ?>
<div class="Rakan">
<h1>New Orders this Month</h1>
<h2>Counter <?= $i ?></h2>
</div>
</div>	
<?php } else { ?>
<div class="Rakan">
<h1>New Orders this Month</h1>
<h2>Counter 0</h2>
</div>
<?php } ?>

<div id="counter3">
<div class="cn3">
<a href="https://www.google.com/analytics/"><h2>Google Analytics</h2></a>
</div>
</div>	
<!--Include FOOTER-->
<?php include("footer.html");?> 


</div>

</body>
</html>

