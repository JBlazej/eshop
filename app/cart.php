<?php
# pripojeni do db
require 'db.php';
# pristup jen pro prihlaseneho uzivatele
require 'user_required.php';
    
$stmt = $db->prepare("SELECT TMP.Id, TMP.IDUser, TMP.IDProd, TMP.Big, TMP.Amount, TMP.Price, Goods.image, Goods.nameGoods FROM TMP INNER JOIN Goods ON TMP.IDProd = Goods.id WHERE TMP.IDUser = ?");
$stmt->execute(array($current_user['id']));
$goods2 = $stmt->fetchAll();

?>


<!DOCTYPE html>

<html>

<head>
  <title>Street Change Webpage</title>
  <!--CSS style-->
  <link rel="stylesheet" type="text/css" href="./style.css"/>
  <meta charset="utf-8"/>
  <!--HTML5 Shiv-->
  <script src="./js/html5shiv.js"></script>
</head>
<body>

<body>
	
	<?php include("header.php");?>
	
    <div id="box">	
	   <h2>Cart</h2>
    </div>
    
  
		
	<?php if($goods2) { ?>
		<?php foreach($goods2 as $row) {
           if (!isset($subtotal)) {
               $subtotal = 0;
                }
            if (!isset($totalprice)) {
               $totalprice = 0;
                }    
                
            
            $subtotal=$row['Amount']*$row['Price']; 
            $totalprice+=$subtotal;
			$bu=$row['Amount']*$row['Price'] ;
				?> 
	
  
    
    
				<form class="cartos" action="removeCart.php" method="POST">                            
				 	<div class="box8080"> 
					<a href="buyProduct.php?rowid=<?= $row['IDProd'] ?>"><img src="./images/<?= $row['image'] ?>" class="modal-img" height="150px" width="150px"></a> 	 
					<h1><?= $row['nameGoods'] ?></h1>
					<p>Your price <?= number_format($bu, 2)  ?> CZK</p>
					<strong><p>Size <?= $row['Big']  ?></p></strong>
					<p><?= $row['Amount'] ?></p>  	
                    <input name="id" type="hidden" value="<?=$row['Id']?>">
                    <button src="./images/delete.png" type="submit" name="submit">Delete</button>
                    
				  </div>
                </form>
			<?php } ?>
		
			 <div action="check.php" class="toPrd">
			<h1>Total Price</h1> 
			 <p><?= number_format($totalprice, 2) ?> CZK</p>
			 <a href="check.php"><button type="submit" name="submit">CheckOut</button></a>
		       </div>

       

		
			<?php } else { ?>
            <div class="box8080"> 
				<h1>No goods yet</h1>
                </div>
				<?php } ?>
           
   
     <?php include("footer.html");?>       
    </body>

</html>