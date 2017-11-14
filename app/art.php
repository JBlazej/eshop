<?php
require 'db.php';
require 'user_required.php';
if (isset($_GET['offset1'])) {
	$offset1 = (int)$_GET['offset1'];
} else {
	$offset1 = 0;
}


$count = $db->query("SELECT COUNT(id) FROM Goods")->fetchColumn();
$stmt = $db->prepare("SELECT * FROM Goods WHERE type = 3 ORDER BY id DESC LIMIT 12 OFFSET ?");
$stmt->bindValue(1, $offset1, PDO::PARAM_INT);
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
           <h2>Art</h2>    
    </div>
    

    <div id="cf">
		<?php foreach($gods as $row) { ?>

            <div class="godsIn">
            <a href="">
              <a href="buyProduct.php?rowid=<?= $row['id'] ?>"> <img src="./images/<?= $row['image'] ?>" height="220px" width="220px"> </a>
								<p><?= $row['nameGoods'] ?></p>
                <p><?= number_format($row['price'], 2) ?> CZK</p>
                <p><?= $row['note'] ?></p>
                </a>
			</div>	
			
				
		
			<?php } ?>
     </div>
     <div class="pagination">	
		<?php for($i=1; $i<=ceil($count/10); $i++) { ?>

			<a class="<?= $offset1/10+1==$i ? "active" : ""  ?>" href="art.php?offset1=<?= ($i-1)*10 ?>"><?= $i ?></a>
			
		<?php } ?>
	</div>
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
    
  </div>

</body>
</html>