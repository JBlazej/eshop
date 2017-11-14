<?php
require 'db.php';
require 'user_required.php';
require 'admin_required.php';

$best = (String)$_GET['best'];
if (!$best){

die("Err");
}

$stmt = $db->prepare("SELECT Orders2.NumberOrder, Goods.nameGoods, Orders2.Amount, Orders2.Big, Orders2.TotalPrice, Orders2.Ok FROM Orders2 INNER JOIN Goods ON Orders2.ID_Product=Goods.id WHERE  Orders2.NumberOrder = ? ");
$stmt->bindValue(1, $best, PDO::PARAM_STR);
$stmt->execute();
$detail = $stmt->fetchAll();

$st = $db->prepare("SELECT TotalPrice, NumberOrder FROM Orders2 Where NumberOrder = ? GROUP BY TotalPrice LIMIT 1 ");
$st->bindValue(1, $best, PDO::PARAM_STR);
$st->execute();
$tot = $st->fetchAll();

$userstm = $db->prepare("SELECT Orders2.ID_User, Users.firstName, Users.lastName, Users.adress, Users.city, Users.psc FROM Orders2 INNER JOIN Users ON Orders2.ID_User=Users.id WHERE Orders2.NumberOrder = ? GROUP BY Orders2.ID_User ");
$userstm->bindValue(1, $best, PDO::PARAM_STR);
$userstm->execute();
$user = $userstm->fetchAll();

$help = $db->prepare("SELECT Ok FROM Orders2 Where NumberOrder = ? GROUP BY Ok LIMIT 1 ");
$help->bindValue(1, $best, PDO::PARAM_STR);
$help->execute();
$helpos = $help->fetchAll();


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

<?php foreach($helpos as $ow) { ?>
<div id="box">
	
<?php if ($ow['Ok'] == 0) {
echo "<h2>Unfinished order</h2>";
} 
else echo"<h2>Order completed</h2>";
?>
</div>
<?php } ?>

<div class="bordel">
<a href="administration.php"><h3>Admin</h3></a>
<a href="newOrders.php"><h3>New Orders</h3></a>
<a href="oldOrders.php"><h3>Finished orders</h3></a>
<a href="addForm.php"><h3>New good</h3></a>
<a href="star.php"><h3>Statistics</h3></a>
</div>

<div class="nebe">
<table>
<tr>		
<th>First Name</th>
<th>Last Name</th>
<th>Adress</th>
<th>City</th>
<th>PSC</th>
</tr>

<?php foreach($user as $rowss) { ?> 
<tr>
<td><?= $rowss['firstName'] ?></td>
<td><?= $rowss['lastName'] ?></td>
<td><?= $rowss['adress'] ?></td>
<td><?= $rowss['city'] ?></td>
<td><?= $rowss['psc'] ?></td>
</tr>
<?php } ?>

</table>
</div>

<div class="peklo">
<table>
<tr>		
<th>nameGoods</th>
<th>Amount</th>
<th>Big</th>
</tr>

<?php foreach($detail as $row) { ?> 
<tr>
<td><?= $row['nameGoods'] ?></td>
<td><?= $row['Amount'] ?></td>
<td><?= $row['Big'] ?></td>
</tr>
<?php } ?> 

<?php foreach($tot as $rows) { ?>
<tr>
<td colspan="3">Total Price: <?= number_format($row['TotalPrice'], 2) ?> CZK</td>
</tr>

<form action="example1.php" method="POST">
<input name="id" type="hidden" value="<?=$row['NumberOrder']?>">
<button type="submit" name="submit">PDF</button>
</form>

<?php foreach($helpos as $ow) { ?>
<?php if ($ow['Ok'] == 0) {?>
<form action="ordCompl.php" method="POST">"
<input name="id" type="hidden" value="<?=$row['NumberOrder']?>">
<input name="pom" type="hidden" value="1">
<button type="submit" name="submit">Complete</button>
</form>
<?php } else {?>
<form action="ordCompl.php" method="POST">"
<input name="id" type="hidden" value="<?=$row['NumberOrder']?>">
<input name="pom" type="hidden" value="0">
<button type="submit" name="submit">UnComplete</button>
</form>
<?php } ?>
<?php } ?>
<?php } ?>

</table>
</div>



<!--Include FOOTER-->
<?php include("footer.html");?> 


</div>

</body>
</html>

