<?php
include('../include/connect.php');
include('../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');
$id = encryptor('decrypt', $_GET['id']);
$query = "SELECT * FROM loyer
INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat
INNER JOIN bien ON bien.id_bien=contrat.id_bien
INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire
INNER JOIN reference ON reference.id_reference=locataire.id_reference
 WHERE loyer.id_loyer='$id'";
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetch();
$output = '';
$output .= '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quittance loyer</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="header">
<table>
<td>Quittance de loyer</td>
<td>Imprimer le :'.strftime('%d %B %Y', strtotime(date("d-m-Y"))).'</td>
</table>
</div>
<div class="content">
<table>
<tr>
<td><img src="'.$result["logo"]. '" alt="" srcset=""></td>
<td>
<span>' . $result["entreprise"] . '</span><br>
<span>' . $result["adresse"] . '</span><br>
<span>' . $result["telephone"] . '</span><br>
<span>' . $result["email"] . '</span><br>
</td>
</tr>
</table>
<table>
<tr>
<td>N° :</td>
<td>' . $result["numero"] . '</td>
<td>Date de paiment :</td>
<td>' . ucfirst(strftime('%A %d %B %Y', strtotime($result["date_paiement"]))) . '</td>
</tr>
<tr>
<td>Période :</td>
<td>' . ucfirst(strftime('%B %Y', strtotime($result["mois"]))) . '</td>
<td>Montant du loyer :</td>
<td>' . number_format($result["montant"], 3, ",", " ") . '</td>
</tr>
</table>
<table>
<td>Nom locataire :</td>
<td>' . $result["nom_locataire"] . '</td>
</table>
<table>
<td>Telephone :</td>
<td>' . $result["telephonel"] . '</td>
</table>
<table>
<td>Nom bien :</td>
<td>' . $result["nom_bien"] . '</td>
</table>
<table>
<td>Montant du loyer (en lettre) :</td>
<td>' . $result["montant_lettre"] . '</td>
</table>
<table>
<td>Etat du loyer :</td>
<td>' . $result["etat_loyer"] . '</td>
</table>
<table>
<tr>
<td>&nbsp;</td>
<td><u>Signature et cachet</u></td>
</tr>
</table>
</div>
<div class="footer">
Téléphone :' . $result['telephone'] . " | Email :" . $result['email'] . " <br>
Fax :" . $result['fax'] . " | BP :" . $result['bp'] . "<br>
Ninea ". $result['ninea'] ." | Site web :" . $result['web'] . '
</div>
</body>
</html>';
require_once '../dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($output);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('quittance-loyer', array("Attachment" => false));
