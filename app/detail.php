<?php
require 'db.php';
require 'user_required.php';


$rest = (String)$_GET['rest'];
	if (!$rest){
	
		die("Unable to find good");
    }

$stmt = $db->prepare("SELECT Orders2.NumberOrder, Goods.nameGoods, Orders2.Amount, Orders2.Big, Orders2.TotalPrice, Orders2.Ok FROM Orders2 INNER JOIN Goods ON Orders2.ID_Product=Goods.id WHERE  Orders2.NumberOrder = ? ");
$stmt->bindValue(1, $rest, PDO::PARAM_STR);
$stmt->execute();
$detail = $stmt->fetchAll();




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
           <h2>Orders</h2>
    </div>
		<div class="fast">
			<?php foreach($detail as $row) { ?>
				<p><?= $rest ?></p>
				<p><?= $row['nameGoods'] ?></p>
				<p><?= $row['Big'] ?></p>
				<p><?= $row['Amount'] ?></p>
				
			<?php } ?> 
		</div>

		
		
			
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
    
  </div>

</body>
</html>

