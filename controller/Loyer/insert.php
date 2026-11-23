<?php 
include('../../include/connect.php');
include('../../include/config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

session_start();
$id_contrat=trim(encryptor('decrypt',$_POST['id_contrat']));
$id_reference = trim(encryptor('decrypt', $_POST['id_reference']));
$mois=trim($_POST['mois'] . "-" . "01");
$date_paiement=trim($_POST['date_paiement']);
$montant= str_replace(',', '.', str_replace(' ', '', trim($_POST['montant'])));
$montant_lettre=trim($_POST['montant_lettre']);
$etat_loyer=trim($_POST['etat_loyer']);
$query="SELECT  * FROM loyer WHERE id_contrat='$id_contrat' AND mois='$mois'";
  $statement=$db->prepare($query);
  $statement->execute();
$result=$statement->fetchAll();
$total_row=$statement->rowCount();
if ($total_row>0) {
   echo  'true';
    }else{
  $query = "SELECT MAX(numero)+1 AS numero FROM loyer
INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat
INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire
INNER JOIN reference ON reference.id_reference=locataire.id_reference
  WHERE reference.id_reference='$id_reference'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetch();
  if ($result["numero"] == null) {
    $numero = "1";
  } else {
    $numero = $result["numero"];
  }

$query= "INSERT INTO loyer( numero, mois, date_paiement, montant, montant_lettre, etat_loyer, id_contrat) VALUES (?,?,?,?,?,?,?)";
 $statement=$db->prepare($query);
$statement->execute(array($numero,$mois, $date_paiement, $montant, $montant_lettre, $etat_loyer, $id_contrat));
}
?>