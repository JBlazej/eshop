<?php
require 'db.php';
require 'user_required.php';

$rowid = (int)$_GET['rowid'];
if (!$rowid){
die("Unable to find good");
}

$stmt = $db->prepare("SELECT * FROM Goods WHERE id = ? LIMIT 1");
$stmt->bindValue(1, $rowid, PDO::PARAM_INT);
$stmt->execute();
$prodct = $stmt->fetchAll();


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
<script src="./js/jquery.js"></script>     
<script src="./js/bootstrap.min.js"></script>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="container">
<!--Include HEADER-->
<?php include("header.php");?>

<div class="suit">
<?php foreach($prodct as $row) { ?>

<div class="Rauch">

<img src="./images/<?= $row['image'] ?>" class="modal-img" height="600px" width="600px">          

</div>   
<div class="Bauch">
<div class="helpos">

<form action="buy.php">
<h1><?= $row['nameGoods'] ?></h1>
</div>
<h2><?= $row['note'] ?></h2>

<div class="priceHolder0">
<p><?= number_format($row['price'], 2) ?> CZK</p>
</div>

<div class="priceHolder1">
<select name="ks" required>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
<select name="velikost" required>
<option value="S">S</option>
<option value="M">M</option>
<option value="L">L</option>
<option value="XL">XL</option>
</select>
<input name="id" type="hidden" value="<?=$row['id']?>">
<button type="submit" value="Buy">Buy</button>

</form>
</div>

</div>




<?php } ?>

<!--Show last 11 products from database-->


<!--Include FOOTER-->
<?php include("footer.html");?> 
</div>

<script>
$('img.modal-img').each(function() {
var modal = $('<div class="img-modal"><span>&times;</span><img /><div></div></div>');
modal.find('img').attr('src', $(this).attr('src'));
if($(this).attr('alt'))
modal.find('div').text($(this).attr('alt'));
$(this).after(modal);
modal = $(this).next();
$(this).click(function(event) {
modal.show(300);
modal.find('span').show(0.3);
});
modal.find('span').click(function(event) {
modal.hide(300);
});
});
$(document).keyup(function(event) {
if(event.which==27)
$('.img-modal>span').click();
});

</script>  
</div>

</body>
</html>
