<?php
require 'db.php';
require 'user_required.php';
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
		<div class="errorH4">
 		<h1>Bad password</h1> 
		<a href="signIn.php">Lets try again.</a>
	</div>
  
		
           
   
     <?php include("footer.html");?>       
    </body>

</html>



