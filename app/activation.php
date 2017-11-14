<?php
include 'db.php';
$msg='';

if(!empty($_GET['code']) && isset($_GET['code']))
{
	
	
$code = (String)$_GET['code'];
	
	
$st = $db->prepare("UPDATE Users SET status='1' WHERE activation=?");
$st->execute(array($code));

header('Location: signIn.php');

}
?>
