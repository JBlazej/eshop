<?php
require 'db.php';
require 'user_required.php';



$pom = $current_user['id']; 

/*$stmt = $db->prepare("SELECT Orders2.NumberOrder, Goods.nameGoods, Orders2.Amount, Orders2.Big, Orders2.TotalPrice, Orders2.Ok FROM Orders2 INNER JOIN Goods ON Orders2.ID_Product=Goods.id WHERE ID_User = ? ORDER BY Orders2.NumberOrder DESC LIMIT 11");
$stmt->execute(array($pom));
$goods = $stmt->fetchAll();*/
$stmt = $db->prepare("SELECT COUNT(ID_USER), NumberOrder, DATE_FORMAT(Date,'%d/%m/%Y') AS PerDate, Ok FROM Orders2 WHERE ID_User = ? GROUP BY NumberOrder ");
$stmt->execute(array($pom));
$ord = $stmt->fetchAll();




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
		 <div class="orderin">
		 <?php foreach($ord as $row) { ?>
            <div class="orderino">
		    <a href="detail.php?rest=<?= $row['NumberOrder'] ?>">
            <h2><?= $row['NumberOrder'] ?></h2>
				 <p><?= $row['PerDate'] ?></p>
				 <?php 
				 if ($row['Ok'] == 0){
				 	 echo "<p>Waiting</p>";
				 }else
					 echo "<p>Send it</p>";
					  ?>
			   </a>
		      </div>
		<?php } ?>
        	</div>
		
			
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
    
  </div>

</body>
</html>

