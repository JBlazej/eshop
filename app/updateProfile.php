<?php
# pripojeni do db
require 'db.php';
require 'user_required.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$stmt = $db->prepare("UPDATE Users SET firstName=? ,lastName=?, email=?, adress=?, city=?, psc=? WHERE id=?");
	$stmt->execute(array($_POST['namef'], $_POST['namel'], $_POST['email'],$_POST['adress'], $_POST['city'], $_POST['psc'] ,$current_user['id']));
	
	header('Location: profileInfo.php');
	
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
           <h2>Update your profile</h2>
    </div>
  
	<form class="updateProfile" action="" method="POST">
	    
		<fieldset>
            <div class="updateProfile1">
                <label for="namef">First name</label>
		        <input type="text" name="namef" value="<?= $current_user['firstName'] ?>">
		    </div>
            
            <div class="updateProfile2">
              <label for="namel">Last name</label>
		        <input type="text" name="namel" value="<?= $current_user['lastName'] ?>">
		    </div>
            
             <div class="updateProfile4">
                <label for="email">Email</label>
		        <input type="email" name="email" value="<?= $current_user['email'] ?>">
		    </div>
            
		    <div class="updateProfile5">
                <label for="adress">Adress</label>
		        <input type="text" name="adress" value="<?= $current_user['adress'] ?>">
		    </div>
            
            <div class="updateProfile6">
                <label for="city">City</label>
		        <input type="text" name="city" value="<?= $current_user['city'] ?>">
		    </div>
            
            <div class="updateProfile7">
                <label for="psc">PSC</label>
		        <input type="text" name="psc" value="<?= $current_user['psc'] ?>">
		    </div>
			<div class="updateProfile8">
		      <button type="submit" value="Save">Update</button>
					<a href="profilePasswd.php"> <button type="button">Change passwd</button> </a> 
		      <a href="profileInfo.php"> <button type="button">Cancle</button> </a> 
		      </div>              
            		
		
	 </fieldset>	
        
	</form>
	
	<?php include 'footer.html' ?>
    
</body>

</html>
