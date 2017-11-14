<?php
require 'db.php';
require 'user_required.php';


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

  <div id="container">
      
    <!--Include HEADER-->
    <?php include("header.php");?>
 
    <div id="box">
           <h2>Info about profile</h2>
    </div>
    <div class="InfoUser">
			<table>
			<tr>
		
						
				<th>Email</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Adress</th>
				<th>City</th>
				<th>PSC</th>
					
			
		
				<tr>
        <td><?= $current_user['email'] ?></td>
        <td><?= $current_user['firstName'] ?></td>    
        <td><?= $current_user['lastName'] ?></td>
        <td><?= $current_user['adress'] ?></td>
        <td><?= $current_user['city'] ?></td>
        <td><?= $current_user['psc'] ?></td>
			</tr>
		</table>
		
	</div>	
	   <div class="InfoUserBtn">
                    <a href="updateProfile.php"> <button type="button">Update</button> </a> 
                    <a href="xIndex.php"> <button type="button">Back</button> </a>  
                    <a href="showOrd.php"> <button type="button">Orders</button> </a> 
        </div>		
				
    
     <!--Include FOOTER-->
    <?php include("footer.html");?> 
    
    
  </div>

</body>
</html>

