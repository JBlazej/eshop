<header>

    <?php  
        if($_SESSION['loggedIn']){
        echo '<div >';
        echo '<div class="left">';
        echo '<ul>';
        echo '<li><a href="cataloge2.php">Catalog</a></li>';
        echo '<div class="dropdown-content">';
        echo '<a href="tshirt.php">T-SHIRTS</a>';
        echo '<a href="accessories.php">Accessories</a> ';
        echo '<a href="art.php">Art</a>';
        echo '</div>'; 
        echo '</ul>';
        echo '</div>';
        echo '<div id="logo">  ';
        echo '<ul>';
        echo '<a href="xIndex.php"><img src="./images/XLogo4.png"/></a>  ';       
        echo '</ul>';
        echo '</div>'; 
        echo '<div class="right">';
        echo '<ul>';
        echo '<li><a href="xBio.php">Bio</a></li>';
        echo '<a href="cart.php">  <img src="./images/shopping-cart.png" alt="Shopping cart" height="24px" width="24px"> </a>';
        echo '<a href="profileInfo.php">  <img src="./images/user-man.png" alt="User" height="24px" width="24px"> </a>';
        echo '<a href="signOut.php">  <img src="./images/logout.png" alt="Logout" height="24px" width="24px"> </a>';  
        echo '</ul>';
        echo '</div> ';
        echo '</div> ';
        
   }
    else{
  
        echo '<div class="left">';
        echo '<ul>';
        echo '<li><a href="cataloge2.php">Catalog</a></li>';
        echo '<div class="dropdown-content">';
        echo '<a href="tshirt.php">T-SHIRTS</a>';
        echo '<a href="accessories.php">Accessories</a> ';
        echo '<a href="art.php">Art</a>';
        echo '</div>'; 
        echo '</ul>';
        echo '</div>';
        echo '<div id="logo">  ';
        echo '<ul>';
        echo '<a href="index.php"><img src="./images/XLogo4.png"/></a>  ';       
        echo '</ul>';
        echo '</div>'; 
        echo '<div class="right">';
        echo '<ul>';
        echo '<li><a href="bio.php">Bio</a></li>';
        echo '<li><a href="signIn.php">LogIn</a></li>'; 
        echo '</ul>';
        echo '</div> ';
    
    }   
?>
     
     
    </header>
    
    