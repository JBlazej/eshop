<?php
# pripojeni do db
require 'db.php';
require 'user_required.php';

function generateRandomString($length = 10) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}	

			
    $stmt = $db->prepare("SELECT TMP.IDUser, TMP.IDProd, TMP.Big, TMP.Amount, TMP.Price, Goods.nameGoods FROM TMP INNER JOIN Goods ON TMP.IDProd = Goods.id WHERE TMP.IDUser = ?");
	$stmt->execute(array($current_user['id']));
	$goods2 = $stmt->fetchAll();
	
 	if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $numberOrder = generateRandomString();
   

/*	 
	 foreach ($ids as $key=>$values){
		$stmt = $db->prepare("INSERT INTO Orders2(`NumberOrder`, `ID_User`, `ID_Product`, `Amount`, `Big`, `TotalPrice`) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->execute(array((string)$numberOrder, $current_user['id'], (int)$values[0], (int)$values[2], (string)$values[1], (int)$_POST['totalPrice']));
		}  */

foreach ($goods2 as $row){ 
$stmt = $db->prepare("INSERT INTO Orders2(`NumberOrder`, `ID_User`, `ID_Product`, `Amount`, `Big`, `TotalPrice`) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute(array((string)$numberOrder, $current_user['id'], (int)$row["IDProd"], (int)$row["Amount"], (string)$row["Big"], (int)$_POST['totalPrice'])); 
    } 
    
$stmt = $db->prepare("DELETE FROM TMP WHERE IDUser = ?");
$stmt->execute(array($current_user['id'])); 
      	
	 include 'orderMail.php';		 
     header('Location: thanks.php');
     unset($_SESSION['cart']);
		}
	


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
	
	<?php include 'header.php' ?>
	<div id="box">
    <h2>CheckOut</h2>
    </div>
		
		
	<div class="userBuy">
    <h1>User delivery info</h1>
    <h2>Your name</h2>
    <p><?= $current_user['firstName'] ?> <?= $current_user['lastName'] ?></p> 
    <h2>Contact email</h2>   
	<p><?= $current_user['email'] ?></p>
    <h2>Adress</h2>
    <p><?= $current_user['adress'] ?></p>
    <p><?= $current_user['city'] ?></p>
    <p><?= $current_user['psc'] ?></p>	
    </div>	
		
		
		
	<?php if($goods2) {
	 ?>
	
	<div class="nice">
	<form class="nice1" action="" method="POST">
		<table>
		<tr>
			
			<th>Name</th>
			<th>Your Price</th>
			<th>Size</th>
			<th>Amount</th>

		<?php foreach($goods2 as $row) { 
        if (!isset($subtotals)) {
            $subtotals = 0;
             }
         if (!isset($totalPrices)) {
            $totalPrices = 0;
             }    
             
         
         $subtotals=$row['Amount']*$row['Price']; 
         $totalPrices+=$subtotals;  
        	?> 	
			<tr>
            
      <td><?= $row['nameGoods']?></td>
      <td><?= number_format($row['Amount']*$row['Price'], 2) ?> CZK</td>    
      <td> <?= $row['Big']  ?></td>
      <td><?= $row['Amount'] ?></td>
			</tr>
		<?php }  ?>
			<tr>
		    <th>Price total</th>
		    <th colspan="3"><?= number_format($totalPrices, 2) ?> CZK</th>
		  </tr>
		
	</table>
	<input name="totalPrice" type="hidden" value="<?= $totalPrices ?>">
    <button type="submit" name="submit">Buy</button>  
    <a href="cart.php"><button type="button">Back</button> </a>     
	</form>
	
	<?php } else { ?>
		No goods
		<?php } ?>
	</div>	
	
	<?php include 'footer.html' ?>
    
</body>

</html>
