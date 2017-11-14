<?php
require 'db.php';
require 'user_required.php';
require 'admin_required.php';
/*require 'user_required.php';*/
if (isset($_GET['offset'])) {
$offset = (int)$_GET['offset'];
} else {
$offset = 0;
}


$count = $db->query("SELECT COUNT(id) FROM Goods")->fetchColumn();
$stmt = $db->prepare("SELECT * FROM Goods ORDER BY id DESC LIMIT 12 OFFSET ?");
$stmt->bindValue(1, $offset, PDO::PARAM_INT);
$stmt->execute();
$gods = $stmt->fetchAll();

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

<!-- Java script for validation delete confirm-->
<script language="JavaScript" type="text/javascript">
function checkDelete(){
return confirm('Do you want DELETE?');
}
</script>
</head>
<body>

<div id="container">
<!--Include HEADER-->
<?php include("header.php");?>
<div id="box">
<h2>Administration</h2>
</div>

<div class="bordel">
<a href="administration.php"><h3>Admin</h3></a>
<a href="newOrders.php"><h3>New Orders</h3></a>
<a href="oldOrders.php"><h3>Finished orders</h3></a>
<a href="addForm.php"><h3>New good</h3></a>
<a href="star.php"><h3>Statistics</h3></a>
</div>


<?php foreach($gods as $row) { ?>
<div class="godsIn">
<img src="./images/<?= $row['image'] ?>" height="220px" width="220px"> 
<p><?= $row['nameGoods'] ?></p>
<p><?= $row['price'] ?> Czk</p>
<p><?= $row['note'] ?></p>
<a href='update.php?id=<?= $row['id'] ?>'> <img src="./images/update.png" height="16px" width="16px"> </a>

<form action="remove.php" method="POST">
<input name="id" type="hidden" value="<?=$row['id']?>">
<button onclick="return checkDelete()" src="./images/delete.png" type="submit" name="submit">Delete</button>
</form>       
</div>

<?php } ?>



<div class="pagination2">	
<?php for($i=1; $i<=ceil($count/10); $i++) { ?>
<a class="<?= $offset/10+1==$i ? "active" : ""  ?>" href="administration.php?offset=<?= ($i-1)*10 ?>"><?= $i ?></a>
<?php } ?>
</div>

<!--Include FOOTER-->
<div class="rekt">
<?php include("footer.html");?> 
</div>
</div>
</body>
</html>
