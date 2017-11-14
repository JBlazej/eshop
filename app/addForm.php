<?php
# pripojeni do db
require 'db.php';

require 'user_required.php';
require 'admin_required.php';

# pristup jen pro admina
require 'admin_required.php';
$msg= "";
$help = $db->query("SELECT * FROM TypeGoods")->fetchAll();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "./images/"  ;
    $target = $target_dir.basename($_FILES['image']['name']);

	$stmt = $db->prepare("INSERT INTO Goods(`nameGoods`, `image`, `price`, `type`, `ks`, `note`) VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->execute(array($_POST['nameGoods'], $_FILES['image']['name'] , (int)$_POST['price'], (int)$_POST['type'], (int)$_POST['ks'], (int)$_POST['note']));
	if(move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
        $msg = "Success";
                       
    }else{
    
    $msg = "Not success!!";
    }
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
           <h2>Add new good</h2>
    </div>
    
    <div class="bordel">
    <a href="administration.php"><h3>Admin</h3></a>
    <a href="newOrders.php"><h3>New Orders</h3></a>
    <a href="oldOrders.php"><h3>Finished orders</h3></a>
    <a href="addForm.php"><h3>New good</h3></a>
    <a href="star.php"><h3>Statistics</h3></a>
    </div>
        <form class="addForm" action="addForm.php" enctype="multipart/form-data" method="POST">
            <fieldset>
                <div class="addForm1">
                    <label for="nameGoods">Name of Good</label>
                    <input type="text" name="nameGoods" value="" placeholder="Name" required >
                   
                </div> 
                
                 <div class="addForm2">
                    <label for="price">Price</label>
                    <input type="text" name="price" value="" placeholder="Price" required>
                 </div>
                 
                 <div class="addForm3">
                     <label for="taskOption">Type Goods</label>
                        <select name="taskOption">  
                            <?php foreach($help as $row) { ?>
                                <option value="<?= $row['id'] ?>"><?= $row['typeGods'] ?></option>

		          	       <?php } ?>
                        </select> 
                 </div>
                 
                 <div class="addForm4">
                    <label for="ks">KS</label>
                    <input type="text" name="ks" value="" placeholder="KS" required>
                 </div>
                        
                  <div class="addForm6">
                  <label for="description">Description</label>
		          <textarea name="description" value="" placeholder="Description" required></textarea><br/><br/>
                 </div>
                 
                  <div class="addForm7">
                    <label for="image">Image</label>
                    <input type="file" name="image" value="" placeholder="Image" required>
                 </div>
                 
	            <div class="addForm8">
                    <button onclick="checkAdd()" type="submit" value="Save">Add</button>
                    <a href="administration.php"> <button type="button">Cancle</button> </a> 
                    
                    
                </div>
            </fieldset>
	   </form>
        <script language="JavaScript" type="text/javascript">
            function checkAdd(){
            return confirm('Do you want add it?');
                        }
        </script> 


</body>

</html>
