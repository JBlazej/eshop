<?php
# pripojeni do db
require 'db.php';
require 'user_required.php';

if (isset($_GET['id'])) {
	$idprod = (int)$_GET['id'];
} else {
	die("Unable to find goods!");
}

$help = $db->query("SELECT * FROM TypeGoods")->fetchAll();
$stmt = $db->prepare("SELECT * FROM Goods WHERE id=?");
$stmt->execute(array($_GET['id']));
$goods = $stmt->fetch();


if (!$goods){
	die("Unable to find goods!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stm = $db->prepare("SELECT last_updated_at FROM Goods WHERE id = ?");
	$stm->execute(array($_POST['id']));
	$last_update = $stm->fetchColumn();
    
    if ($_POST['last_updated_at'] != $last_update) {
		
	header('Location: update.php?id=$idprod');
		
	}
    
    
    
	$stmt = $db->prepare("UPDATE Goods SET nameGoods=?, note=?, price=?, type=?, ks=?, last_updated_at=now() WHERE id=?");
	$stmt->execute(array($_POST['name'], $_POST['description'], (int)$_POST['price'],$_POST['taskOption'], $_POST['ks'], $_POST['id']));
	
	header('Location: administration.php');
	
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
           <h2>Update <?= $goods['id'] ?></h2>
    </div>
  
	<form class="updateForm" action="" method="POST">
	    
		<fieldset>
            <div class="updateForm1">
                <label for="name">Name Goods*</label>
		        <input type="text" name="name" value="<?= $goods['nameGoods'] ?>"><br/><br/>
		    </div>
            
		    <div class="updateForm2">
                <label for="price">Price</label>
		        <input type="text" name="price" value="<?= $goods['price'] ?>"><br/><br/>
		    </div>
	   	
            <div class="updateForm3">
                <label for="description">Description</label>
		        <textarea name="description"><?= $goods['note'] ?></textarea><br/><br/>
		    </div>
          
            <div class="updateForm6">
                <label for="ks">Amount</label>
		        <textarea name="ks"><?= $goods['ks'] ?></textarea><br/><br/>
		    </div>  
                    
            <div class="updateForm4">
                <label for="taskOption">Type Goods</label>
                 <select name="taskOption">  
                    <?php foreach($help as $row) { ?>

                        <option value="<?= $row['id'] ?>"><?= $row['typeGods'] ?></option>

		          	<?php } ?>
                </select>     		
            </div>
            		
		<div class="updateForm5">
        <input type="hidden" name="id" value="<?= $goods['id'] ?>">
		<input type="hidden" name="last_updated_at" value="<?= $goods['last_updated_at'] ?>">
        
        <button type="submit" value="Save">Update</button>
        <a href="administration.php"> <button type="button">Cancle</button> </a> 
        </div>
	 </fieldset>	
        
	</form>
   
   
   <div class="show">
    <img src="./images/<?= $goods['image'] ?>" height="320px" width="320px">
   </div>
	<?php include 'footer.html' ?>
    
</body>

</html>
