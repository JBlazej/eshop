<?php
# pripojeni do db
require 'db.php';
require 'user_required.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
    if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
        $newpassword = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        
    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        header('Location: errHandle2.php');
        die();
        
    }
    elseif(!preg_match("#[0-9]+#",$newpassword)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
        header('Location: errHandle2.php');
        die();
    }
    elseif(!preg_match("#[A-Z]+#",$newpassword)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        header('Location: errHandle2.php');
        die();
    }
    elseif(!preg_match("#[a-z]+#",$newpassword)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        header('Location: errHandle2.php');
        die();
    }
    }
    elseif(!empty($_POST["password"])) {
        $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
        header('Location: errHandle2.php');
        die();
    }
    
  $hashed = password_hash($newpassword, PASSWORD_DEFAULT);
	$stmt = $db->prepare("UPDATE Users SET passwd=? WHERE id=?");
	$stmt->execute(array($hashed ,$current_user['id']));
	
	header('Location: signOut.php');
	
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
           <h2>Change your password</h2>
    </div>
  
	<form class="updateProfile" action="" method="POST">
	    
		<fieldset>
            
            <div class="updateProfile3">
                    <label for="password">New password</label>
                    <input type="password" name="password" value="" placeholder="New password">
                 </div>
            <div class="updateProfile9">
                    <label for="cpassword">Confirm password</label>
                    <input type="password" name="cpassword" value="" placeholder="Confirm password">
                 </div>
            
			<div class="updateProfile8">
		      <button type="submit" value="Save">Change</button>
		      <a href="updateProfile.php"> <button type="button">Cancle</button> </a> 
		      </div>              
            		
		
	 </fieldset>	
        
	</form>
	
	<?php include 'footer.html' ?>
    
</body>

</html>
