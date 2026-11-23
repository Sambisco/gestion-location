<?php 
include('../../include/connect.php');
include('../../include/config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

session_start();
$id_locataire=trim(encryptor('decrypt',$_POST['id_locataire']));
$id_bien=trim(encryptor('decrypt',$_POST['id_bien']));
$date_debut=trim($_POST['date_debut']);
$date_fin=trim($_POST['date_fin']);
$loyer_estime= str_replace(',', '.', str_replace(' ', '', trim($_POST['loyer_estime'])));
$loyer_estime_lettre=trim($_POST['loyer_estime_lettre']);
$type_contrat=trim($_POST['type_contrat']);
$etat=trim($_POST['etat']);
$query="SELECT  * FROM contrat WHERE id_locataire='$id_employe' AND id_bien='$id_bien'";
  $statement=$db->prepare($query);
  $statement->execute();
$result=$statement->fetchAll();
$total_row=$statement->rowCount();
if ($total_row>0) {
   echo  'true';
    }else{

$query= "INSERT INTO contrat( date_debut, date_fin, loyer_estime, loyer_estime_lettre, type_contrat, etat, id_bien, id_locataire) VALUES (?,?,?,?,?,?,?,?)";
 $statement=$db->prepare($query);
$statement->execute(array($date_debut, $date_fin, $loyer_estime, $loyer_estime_lettre, $type_contrat, $etat, $id_bien, $id_locataire));
}
?>