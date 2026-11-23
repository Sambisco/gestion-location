<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if (isset($_POST['id_loyer'])) {
   $id_loyer = encryptor('decrypt', $_POST['id_loyer']);
   $query = "SELECT *,DATE_FORMAT(loyer.mois,'%Y-%m') AS loyer_mois FROM loyer
INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat
INNER JOIN bien ON bien.id_bien=contrat.id_bien
INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire
INNER JOIN reference ON reference.id_reference=locataire.id_reference
 WHERE loyer.id_loyer='$id_loyer'";
   $statement = $db->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $total_row = $statement->rowCount();
   if ($total_row > 0) {
      $data = array();
      foreach ($result as $row) {
         $data["id_loyer"] = encryptor('encrypt', $row["id_loyer"]);
         $data["mois"] = $row["loyer_mois"];
         $data["date_paiement"] = $row["date_paiement"];
         $data["montant"] = number_format($row["montant"], 3, ",", " ");
         $data["montant_lettre"] = $row["montant_lettre"];
         $data["etat_loyer"] = $row["etat_loyer"];
         $data["nom_locataire"] = $row["nom_locataire"];
         $data["telephonel"] = $row["telephonel"];
         $data["nom_bien"] = $row["nom_bien"];
         $data["type_contrat"] = $row["type_contrat"];
         if ($row["photol"] == null) {
            $data['photol'] = "../img/image/image-profil.jpg";
         } else {
            $data['photol'] = $row['photol'];
         }
      
      }
      echo json_encode($data);
   } else {
      echo "0";
   }
}

if (isset($_POST['id'])) {
   $id = encryptor('decrypt', $_POST['id']);
   $query = "SELECT * FROM loyer
INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat
INNER JOIN bien ON bien.id_bien=contrat.id_bien
INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire
INNER JOIN reference ON reference.id_reference=locataire.id_reference
 WHERE reference.id_reference='$id' ORDER BY loyer.id_loyer DESC";
   $statement = $db->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $total_row = $statement->rowCount();
   $data = array();
   $response = array();
   foreach ($result as $row) {
      $response["id_loyer"] = encryptor('encrypt', $row["id_loyer"]);
      $response["numero"] = $row["numero"];
      $response["mois"] = ucfirst(strftime('%B %Y', strtotime($row["mois"])));
      $response["date_paiement"] = ucfirst(strftime('%A %d %B %Y', strtotime($row["date_paiement"])));
      $response["montant"] = number_format($row["montant"], 3, ",", " ");
      $response["nom_locataire"] = $row["nom_locataire"];
      $response["telephonel"] = $row["telephonel"];
      $response["nom_bien"] = $row["nom_bien"];
      $response["type_contrat"] = $row["type_contrat"];
      if ($row["photol"] == null) {
         $response['photol'] = "../img/image/image-profil.jpg";
      } else {
         $response['photol'] = $row['photol'];
      }
      
      array_push($data, $response);
   }
   echo json_encode($data);
}
