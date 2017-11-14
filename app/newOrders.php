<?php
require 'db.php';
require 'user_required.php';
require 'admin_required.php';

if (isset($_GET['offset'])) {
	$offset = (int)$_GET['offset'];
} else {
	$offset = 0;
}

$count = $db->query("SELECT COUNT(NumberOrder) FROM Orders2")->fetchColumn();
$stmt = $db->prepare("SELECT NumberOrder, SUM(Amount) as PrP, DATE_FORMAT(Date,'%d/%m/%Y') AS PrD, TotalPrice FROM Orders2 WHERE Ok = 0 GROUP BY NumberOrder ORDER BY Date DESC LIMIT 15 OFFSET ?");
$stmt->bindValue(1, $offset, PDO::PARAM_INT);
$stmt->execute();
$ords = $stmt->fetchAll();




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
           <h2>New Orders</h2>
    </div>
    
    <div class="bordel">
    <a href="administration.php"><h3>Admin</h3></a>
    <a href="newOrders.php"><h3>New Orders</h3></a>
    <a href="oldOrders.php"><h3>Finished orders</h3></a>
    <a href="addForm.php"><h3>New good</h3></a>
    <a href="star.php"><h3>Statistics</h3></a>
    
    </div>
		
        <div class="ratata">
		
         <table>
			<tr>		
			<th>Number Order</th>
			<th>Date</th>
            <th>Count Products</th>
			<th>Total Price</th>
            <th></th>
            
    </tr>
     <?php if($ords) { ?>  
     <?php foreach($ords as $row) { ?> 
        <tr>
           
        <td><?= $row['NumberOrder'] ?></td>
        <td><?= $row['PrD'] ?></td>
        <td><?= $row['PrP'] ?></td>
        <td><?= number_format($row['TotalPrice'], 2) ?> CZK</td>
        <td> <a href="detailOrder.php?best=<?= $row['NumberOrder'] ?>"><button>Detail</button> </a> </td>
		</tr>
            <?php }} else { ?>
				  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> </td>
		          </tr>
				<?php } ?>
		</table>
			 
		</div>
	 <div class="pagination">	
		
        <?php for($i=1; $i<=ceil($count/15); $i++) { ?>
    	<a class="<?= $offset/15+1==$i ? "active" : ""  ?>" href="newOrders.php?offset=<?= ($i-1)*15 ?>"><?= $i ?></a>
		<?php } ?>
        
	</div>	
		
		
			
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
    
  </div>

</body>
</html>

