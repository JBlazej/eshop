  $newpassword = $_POST['password']; 
	  
  $hashed = password_hash($newpassword, PASSWORD_DEFAULT);
	$stmt = $db->prepare("UPDATE Users SET passwd=? WHERE id=?");
	$stmt->execute(array($hashed ,$current_user['id']));
	
	header('Location: signOut.php');
	
	
	  <input type="text" name="totalprice" value="<?= $totalprice ?>" readonly><br/><br/> 
		
		
		
 for ($i=0;$i < count($ids);$i++){
	
	$helpos[] = $ids[$i][0];
	$stmt = $db->prepare("INSERT INTO Orders2(`NumberOrder`, `ID_User`, `ID_Product`, `Amount`, `Big`, `TotalPrice`) VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->execute(array((string)$numberOrder, $current_user['id'], $helpos[$i], (int)$kss[$i], (string)$vel[$i], 			(int)$_POST['totalPrice']));
	}
	
	
	 
    header('Location: xIndex.php');
    unset($_SESSION['cart']);
	}
	
	
	
	 /*foreach ($_SESSION['cart'] as $key=>$itm) //loop through session array
            {
                if($itm[0] == $_GET['id']){ //the item exist in array
					
					
					$_SESSION['cart'][$itm] s.= $velikost;
					$_SESSION['cart'][$itm] .= $ks;
                    $found = true;
                 
                    /*header('Location: bio.php');*/
               /* }else{
                    //item doesn't exist in the list, just retrieve old info and prepare array for session var
                    
                }
            }
*/
