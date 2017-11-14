<?php
//pripojeni do db na serveru eso.vse.cz
$db = new PDO('mysql:host=127.0.0.1;dbname=blaj05;charset=utf8', 'blaj05', 'EkkNisSk1ENWvWUOKh');
//vyhazuje vyjimky v pripade neplatneho SQL vyrazu
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$base_url="http://eso.vse.cz/~blaj05/activation.php?code=";

?>
