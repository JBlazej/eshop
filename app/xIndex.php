<?php
require 'db.php'; 
require 'user_required.php';
/*require 'user_required.php';*/
$stmt = $db->prepare("SELECT * FROM Goods ORDER BY id DESC LIMIT 11");
$stmt->execute();
$goods = $stmt->fetchAll();


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
<?php include_once("analyticstracking.php") ?>
  <div id="container">
    <!--Include HEADER-->
    <?php include("header.php");?>
    <div id="main">
     <h1>YOUTH IN REVOLT</h1>
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas justo nisl, volutpat rutrum porta non, consequat id mauris.</p>

    </div>
   
    <div id="box">
           <h2>Last Arrivals</h2>
           
    </div>
    
    <!--Show last 11 products from database-->
    <div id="cf">
		<?php foreach($goods as $row) { ?>

            <div class="godsIn">
            <a href="">
			    <a href="buyProduct.php?rowid=<?= $row['id'] ?>"> <img src="./images/<?= $row['image'] ?>" height="220px" width="220px"> </a>
				<p><?= $row['nameGoods'] ?></p>
                <p><?= number_format($row['price'], 2) ?> CZK</p>
                <p><?= $row['note'] ?></p>
                </a>
			</div>	
			
				
		
			<?php } ?>
            <div class="godsIn">
            <a href="">
			  <a href="cataloge2.php">  <img src="./images/XClick.png" height="220px" width="220px"> </a>
                <p>Click for more products</p>
                </a>
			</div>	
     </div>
     
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
  </div>

</body>
</html>
