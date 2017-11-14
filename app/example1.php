<?php
require 'db.php';
require 'user_required.php';
require 'admin_required.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = (String)$_POST['id']; 

if (!$id){
header('Location: administration.php');
}

$stmt = $db->prepare("SELECT Orders2.NumberOrder, Goods.nameGoods, Orders2.Amount, Orders2.Big, Orders2.TotalPrice, Orders2.Ok FROM Orders2 INNER JOIN Goods ON Orders2.ID_Product=Goods.id WHERE Orders2.NumberOrder = ? ");
$stmt->bindValue(1, $id, PDO::PARAM_STR);
$stmt->execute();
$detail = $stmt->fetchAll();
date_default_timezone_set("Europe/Prague");

$st = $db->prepare("SELECT TotalPrice, NumberOrder FROM Orders2 Where NumberOrder = ? GROUP BY TotalPrice LIMIT 1 ");
$st->bindValue(1, $id, PDO::PARAM_STR);
$st->execute();
$tot = $st->fetchAll();

$userstm = $db->prepare("SELECT Orders2.ID_User, Users.firstName, Users.lastName, Users.adress, Users.city, Users.psc FROM Orders2 INNER JOIN Users ON Orders2.ID_User=Users.id WHERE Orders2.NumberOrder = ? GROUP BY Orders2.ID_User ");
$userstm->bindValue(1, $id, PDO::PARAM_STR);
$userstm->execute();
$user = $userstm->fetchAll();

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML text flow.
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('author');
$pdf->SetTitle('TCPDF Example');
$pdf->SetSubject('TCPDF Tutorial');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '<h1>Orders information for Customer</h1><center><h3>Customer</h3></center>
	<center>
	<table border="1">
	<tr>
	<th>First Name</th><th>Last Name</th><th>Adress</th><th>City</th><th>PSC</th>
	</tr>
	<tr>';

foreach($user as $row) { 
$html .= '<td>'.$row['firstName'].'</td><td>' . $row['lastName']. '</td><td>' . $row['adress']. '</td><td>' . $row['city']. '</td><td>' . $row['psc']. '</td>';
}
$html .= '</tr>
</table></center>
</br>
</br>
<center><h3>Products</h3></center>
<center>
<table border="1">
<tr>
<th>PName</th><th>Amount</th><th>Size</th>
</tr>
';
foreach($detail as $rows) { 
$html .= '<tr><td>'.$rows['nameGoods'].'</td><td>' . $rows['Amount']. '</td><td>' . $rows['Big']. '</td></tr>';
}
$html .= '
</table></center>
<center><h3>Total Price</h3></center>';
foreach($tot as $row) { 
$html .= '<h2>'.number_format($row['TotalPrice'], 2).' CZK</h2>';
}

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('infos.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
}
