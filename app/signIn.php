<?php
session_start();
require 'db.php';
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$email = $_POST['email'];
		$password = $_POST['passwd'];
	
		
		$stmt = $db->prepare("SELECT * FROM Users WHERE email = ? AND status = '1' LIMIT 1"); //limit 1 jen jako vykonnostni optimalizace, 2 stejne maily se v db nepotkaji
		$stmt->execute(array($email));
		$existing_user = @$stmt->fetchAll()[0];
	
		if(password_verify($password, $existing_user["passwd"])){
	
			$_SESSION['user_id'] = $existing_user["id"];
		
			header('Location: xIndex.php');
	
		} else {
	
            header('Location: errHandle5.php');
			die();
	
		}		
	
}
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
     <h1>Sign In</h1>
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas justo nisl, volutpat rutrum porta non, consequat id mauris.</p>
    </div>
    
    <div id="sin">
        
        <form class="signInForm" action="" method="POST">
            <fieldset>
                <div class="signInForm1">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email adress">
                   
                </div>
                
                 <div class="signInForm2">
                    <label for="passwd">Password</label>
                    <input type="password" value="" name="passwd" placeholder="Password" required>
                 </div>
                 
	            <div class="signControl">
                <button type="submit" value="Sign in">Sign In</button> 
                   <a href="signUp.php"><p>Registracion</p></a>
                    
                </div>
                
            </fieldset>
		
	   </form>
         <div class="plusButton">
                   

                </div>
        
    </div>
    
   
     </div>
     
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
  </div>

</body>
</html>
