
<?php
include('../../include/connect.php');
include('../../include/config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');
$id=trim(encryptor('decrypt',$_POST['edit_id']));
$date_debut = trim($_POST['date_debut']);
$date_fin = trim($_POST['date_fin']);
$loyer_estime = str_replace(',', '.', str_replace(' ', '', trim($_POST['loyer_estime'])));
$loyer_estime_lettre = trim($_POST['loyer_estime_lettre']);
$type_contrat = trim($_POST['type_contrat']);
$etat = trim($_POST['etat']);

$query="UPDATE contrat SET date_debut=?,date_fin=?,loyer_estime=?,loyer_estime_lettre=?,type_contrat=?,etat=? WHERE id_contrat=?";
 $statement=$db->prepare($query);
$statement->execute(array($date_debut, $date_fin, $loyer_estime, $loyer_estime_lettre, $type_contrat, $etat,$id));


?>