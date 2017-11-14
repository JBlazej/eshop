<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$email = $_POST['email'];    
    $firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$adress = $_POST['adress'];
	$city = $_POST['city'];
	$psc = $_POST['psc'];
	$status = $_POST['status'];
    
    if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        
    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        header('Location: errHandle.php');
        die();
        
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
        header('Location: errHandle.php');
        die();
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        header('Location: errHandle.php');
        die();
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        header('Location: errHandle.php');
        die();
    }
    }
    elseif(!empty($_POST["password"])) {
        $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
        header('Location: errHandle.php');
        die();
    }
    
  
		
	$hashed = password_hash($password, PASSWORD_DEFAULT);
	$bytes = openssl_random_pseudo_bytes(32);
	$activation = base64_encode($bytes);
	
	#vlozime usera do databaze
	$stmt = $db->prepare("INSERT INTO Users(`email`, `firstName`, `lastName`, `passwd`, `adress`, `city`, `psc`, `activation`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->execute(array($email, $firstName, $lastName ,$hashed, $adress, $city, $psc, $activation, $status));
	include 'registrationMail.php';
	
	
	#ted je uzivatel ulozen, bud muzeme vzit id posledniho zaznamu pres last insert id (co kdyz se to potka s vice requesty = nebezpecne), nebo nacist uzivatele podle mailove adresy (ok, bezpecne)
	/*$stmt = $db->prepare("SELECT id FROM Users WHERE email = ? LIMIT 1"); //limit 1 jen jako vykonnostni optimalizace, 2 stejne maily se v db nepotkaji
	$stmt->execute(array($email));
	$user_id = (int)$stmt->fetchColumn();
		
	$_SESSION['user_id'] = $user_id;
    http://www.9lessons.info/2013/11/php-email-verification-script.html	
    */
		
	header('Location: signIn.php');


	
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
    
    <div id="UPMain">
     <h1>WELCOME TO OUR CLUB</h1>
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    
    <div id="sun">
        
        <form class="signUpForm" action="" method="POST">
            <fieldset>
                <div class="signUpForm1">
                    <label for="email">Email*</label>
                    <input type="email" name="email" value="@" placeholder="Email Adress" required >
                   
                </div> 
                
                 <div class="signUpForm2">
                    <label for="password">Password*</label>
                    <input type="password" name="password" value="" placeholder="Password" required>
                 </div>
                 <div class="signUpForm8">
                    <label for="cpassword">PasswordCon</label>
                    <input type="password" name="cpassword" value="" placeholder="PasswordConf" required>
                 </div>
                 
                 <div class="signUpForm3">
                    <label for="firstName">First Name*</label>
                    <input type="text" name="firstName" value="" placeholder="First Name" required>
                 </div>
                 
                 <div class="signUpForm4">
                    <label for="lastName">Last Name*</label>
                    <input type="text" name="lastName" value="" placeholder="Last Name" required>
                 </div>
                 
                 <div class="signUpForm5">
                    <label for="adress">Adress*</label>
                    <input type="text" name="adress" value="" placeholder="Adress" required>
                 </div>
                 
                  <div class="signUpForm6">
                    <label for="city">City*</label>
                    <input type="text" name="city" value="" placeholder="City" required>
                 </div>
                 
                  <div class="signUpForm7">
                    <label for="psc">PSC*</label>
                    <input type="text" name="psc" value="" placeholder="PSC" required>
                 </div>
                 
	            <div class="signUpControl">
                    <button type="submit" value="Sign up">Sign Up</button>
                    <a href="index.php"> <button type="button">Cancle</button> </a> 
                    <input name="status" type="hidden" value="0">
                    
                    
                </div>
            </fieldset>
	   </form> 
    </div>
 
     

			
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
  </div>

</body>
</html>
