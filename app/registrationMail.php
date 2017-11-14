<?php

require_once 'class.phpmailer.php';

$pom = $email;
define('ADRESA', $pom);
define('ADRESAM', "StreetChange@vse.cz");


$mailer=new PHPMailer();
$mailer->isSendmail();//nastavení, že se mail má odeslat přes sendmail

//přidání adres (obdobně jdou přidat adresy do polí CC a BCC
$mailer->addAddress(ADRESA);
$mailer->setFrom(ADRESAM);

//nastavíme předmět
$mailer->CharSet='utf-8';
$mailer->Subject='Activation email';

//přidáme HTML obsah (může jim být celý HTML dokument, nebo jen kousek body)
$mailer->msgHTML('<!DOCTYPE html>
<html>
<head><meta charset="utf-8" /></head>
<body>
Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.$base_url.''.$activation.'">'.$base_url.''.$activation.'</a>

</body>
</html>');

//volitelně lze přidat alternativní obsah (pokud nemá být vytvořen z HTML obsahu)
//$mailer->AltBody='alternativní obsah';


if ($mailer->send()) {
    echo 'E-mail byl odeslán.';
} else {
    echo "Vyskytla se chyba: " . $mailer->ErrorInfo;
}
