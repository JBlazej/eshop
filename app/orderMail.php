<?php

require_once 'class.phpmailer.php';

$pom = $current_user['email'];
define('ADRESA', $pom);
define('ADRESAM', "StreetChange@vse.cz");

$mailer=new PHPMailer();
$mailer->isSendmail();//nastavení, že se mail má odeslat přes sendmail

//přidání adres (obdobně jdou přidat adresy do polí CC a BCC
$mailer->addAddress(ADRESA);
$mailer->setFrom(ADRESAM);

//nastavíme předmět
$mailer->CharSet='utf-8';
$mailer->Subject='XChange System order replay';

//přidáme HTML obsah (může jim být celý HTML dokument, nebo jen kousek body)
$mailer->msgHTML('<!DOCTYPE html>
<html>
<head><meta charset="utf-8" /></head>
<body>
<h2>Thank you for you order </h2>
<p>We received your order and we will inform you!</p> 
</br>
You bought new products from <a href="http://eso.vse.cz/~blaj05">XChange</a>
</br>
<img src="./images/XLogo4.png"/ height="220" width="220"></img>


</body>
</html>');

//volitelně lze přidat alternativní obsah (pokud nemá být vytvořen z HTML obsahu)
//$mailer->AltBody='alternativní obsah';


if ($mailer->send()) {
    echo 'E-mail byl odeslán.';
} else {
    echo "Vyskytla se chyba: " . $mailer->ErrorInfo;
}
