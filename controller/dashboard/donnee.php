<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

$data = array();
if (isset($_POST["id"])) {

  $id = encryptor('decrypt', $_POST['id']);
  $date = trim($_POST["date"]);
  $query = "SELECT COUNT(bailleur.id_bailleur) AS id_bailleur FROM bailleur  
            WHERE id_reference='$id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result_bailleur = $statement->fetch();
  if ($result_bailleur["id_bailleur"] == 0) {
    $data["bailleur"] = 0;
  } else {
    $data["bailleur"] = "0".$result_bailleur["id_bailleur"];
  }

  $query = "SELECT COUNT(locataire.id_locataire) AS id_locataire FROM locataire 
           WHERE id_reference='$id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result_locataire = $statement->fetch();
  if ($result_locataire["id_locataire"] == 0) {
    $data["locataire"] = 0;
  } else {
    $data["locataire"] = $result_locataire["id_locataire"];
  }

  $query = "SELECT COUNT(contrat.id_contrat) AS id_contrat FROM contrat
INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire
INNER JOIN reference ON reference.id_reference=locataire.id_reference
WHERE reference.id_reference='$id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result_contrat = $statement->fetch();
  if ($result_contrat["id_contrat"] == 0) {
    $data["contrat"] = 0;
  } else {
    $data["contrat"] = $result_contrat["id_contrat"];
  }

  $query = "SELECT  COUNT(bien.id_bien) AS id_bien FROM bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE reference.id_reference='$id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetch();
  if ($result["id_bien"] == 0) {
    $data["bien"] = 0;
  } else {
    $data["bien"] = $result["id_bien"];
  }
  $query = "SELECT SUM(montant) AS montant_loyer, SUM(commission) AS commission,SUM(montant-commission) AS reverser FROM loyer 
  INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat 
  INNER JOIN bien ON bien.id_bien=contrat.id_bien 
  INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire 
  INNER JOIN reference ON reference.id_reference=locataire.id_reference
 WHERE reference.id_reference='$id' AND DATE_FORMAT(loyer.mois,'%Y')='$date'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetch();
  if ($result["commission"] == 0) {
    $data["commission"] = 0;
  } else {
    $data["commission"] = number_format($result["commission"], 3, ",", " ");
  }
  if ($result["reverser"] == 0) {
    $data["reverser"] = 0;
  } else {
    $data["reverser"] = number_format($result["reverser"], 3, ",", " ");
  }
  if ($result["montant_loyer"] == 0) {
    $data["montant_loyer"] = 0;
  } else {
    $data["montant_loyer"] = number_format($result["montant_loyer"], 3, ",", " ");
  }
  $query = "SELECT SUM(montant_depense) AS montant_depense FROM depense 
INNER JOIN bien ON bien.id_bien=depense.id_bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE reference.id_reference='$id' AND DATE_FORMAT(depense.date_depense,'%Y')='$date'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetch();
  if ($result["montant_depense"] == 0) {
    $data["montant_depense"] = 0;
  } else {
    $data["montant_depense"] = number_format($result["montant_depense"], 3, ",", " ");
  }

  $query = "SELECT COUNT(id_bailleur) AS pourcentage_bailleur FROM bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE reference.id_reference='$id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetch();
  if ($result["pourcentage_bailleur"] == 0) {
    $data["pourcentage_bailleur"] = 0;
  } else {
    $data["pourcentage_bailleur"] = $result["pourcentage_bailleur"];
  }
  $query = "SELECT COUNT(id_locataire) AS pourcentage_locataire FROM locataire
INNER JOIN reference ON reference.id_reference=locataire.id_reference
 WHERE reference.id_reference='$id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetch();
  if ($result["pourcentage_locataire"] == 0) {
    $data["pourcentage_locataire"] = 0;
  } else {
    $data["pourcentage_locataire"] = $result["pourcentage_locataire"];
  }
  $query = "SELECT COUNT(id_contrat) AS pourcentage_contrat FROM contrat
INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire
INNER JOIN reference ON reference.id_reference=locataire.id_reference
 WHERE reference.id_reference='$id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetch();
  if ($result["pourcentage_contrat"] == 0) {
    $data["pourcentage_contrat"] = 0;
  } else {
    $data["pourcentage_contrat"] = $result["pourcentage_contrat"];
  }
  $query = "SELECT COUNT(id_bien) AS pourcentage_bien FROM bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE reference.id_reference='$id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetch();
  if ($result["pourcentage_bien"] == 0) {
    $data["pourcentage_bien"] = 0;
  } else {
    $data["pourcentage_bien"] = $result["pourcentage_bien"];
  }
}
echo json_encode($data);
