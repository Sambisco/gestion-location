
<?php
include('../../include/connect.php');
include('../../include/config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');
$id=trim(encryptor('decrypt',$_POST['edit_id']));
$mois = trim($_POST['mois'] . "-" . "01");
$date_paiement = trim($_POST['date_paiement']);
$montant = str_replace(',', '.', str_replace(' ', '', trim($_POST['montant'])));
$montant_lettre = trim($_POST['montant_lettre']);
$etat_loyer = trim($_POST['etat_loyer']);

$query= "UPDATE loyer SET mois=?,date_paiement=?,montant=?,montant_lettre=?,etat_loyer=? WHERE id_loyer=?";
 $statement=$db->prepare($query);
$statement->execute(array($mois, $date_paiement, $montant, $montant_lettre, $etat_loyer, $id));


?>