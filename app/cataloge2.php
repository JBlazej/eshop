<?php
require 'db.php';
require 'user_required.php';

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
</head>
<body>
	<?php include_once("analyticstracking.php") ?>
  <div id="container">
      
    <!--Include HEADER-->
    <?php include("header.php");?>
 
    <div id="box">
           <h2>Big Boy Shop</h2>
    </div>
    
    <!--Show last 11 products from database-->
    <div id="cf">
		<?php foreach($gods as $row) { ?>

            <div class="godsIn">
                <a href="buyProduct.php?rowid=<?= $row['id'] ?>"><img src="./images/<?= $row['image'] ?>" height="220px" width="220px"> </a>
				<p><?= $row['nameGoods'] ?></p>
                <p><?= number_format($row['price'], 2) ?> CZK</p>
                <p><?= $row['note'] ?></p>
               
			</div>	
			
				
		
			<?php } ?>
     </div>
   
     <div class="pagination">	
		<?php for($i=1; $i<=ceil($count/10); $i++) { ?>

			<a class="<?= $offset/10+1==$i ? "active" : ""  ?>" href="cataloge2.php?offset=<?= ($i-1)*10 ?>"><?= $i ?></a>
			
		<?php } ?>
	</div>
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
    
  </div>

</body>
</html>

