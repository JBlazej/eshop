<?php
# pripojeni do db
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
	
	<?php include 'header.php' ?>
	<div id="box">
           <h2>Thank you!</h2>
    </div>
    <div class="finish">
    <h2>Order was received</h2>
    <p>All information was send on your email but only if you are from VSE.</p>
    <a href="xIndex.php"><p>Back to HomePage</p></a>
    
    
    </div>
    
	<?php include 'footer.html' ?>
    
</body>

</html>
