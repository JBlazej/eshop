<?php
require 'db.php';
# php HTTP autentizace
# http://php.net/manual/en/features.http-auth.php)

$stmt = $db->prepare("SELECT email, passwd  FROM Admin ");
$stmt->execute();
$pom = $stmt->fetchAll();
$valid_passwords = array();
 
foreach ($pom as $row){
    $valid_passwords[$row["email"]] = $row["passwd"];
} 

$valid_users = array_keys($valid_passwords);

$user = @$_SERVER['PHP_AUTH_USER'];
$password = @$_SERVER['PHP_AUTH_PW'];


/*($password == $valid_passwords[$user])*/
$validated = (in_array($user, $valid_users)) && password_verify($password, $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="Dneska je venku hezky. 27 °C"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Unauthorized");
}
?>
