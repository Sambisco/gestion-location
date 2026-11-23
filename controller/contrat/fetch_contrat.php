<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if (isset($_POST['id_contrat'])) {
   $id_contrat = encryptor('decrypt', $_POST['id_contrat']);
   $query = "SELECT * FROM contrat 
   INNER JOIN bien ON bien.id_bien=contrat.id_bien
INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE id_contrat='$id_contrat'";
   $statement = $db->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $total_row = $statement->rowCount();
   if ($total_row > 0) {
      $data = array();
      foreach ($result as $row) {
         $data["id_contrat"] = encryptor('encrypt', $row["id_contrat"]);
         $data["id_bien"] = encryptor('encrypt', $row["id_bien"]);
         $data["id_locataire"] = encryptor('encrypt', $row["id_locataire"]);
         $data["date_debut"] = $row["date_debut"];
         $data["date_fin"] = $row["date_fin"];
         $data["loyer_estime"] = number_format($row["loyer_estime"], 3, ",", " ");
         $data["loyer_estime_lettre"] = $row["loyer_estime_lettre"];
         $data["type_contrat"] = $row["type_contrat"];
         $data["etat"] = $row["etat"];
         $data["nom_locataire"] = $row["nom_locataire"];
         $data["telephonel"] = $row["telephonel"];
         $data["nom_bien"] = $row["nom_bien"];
         $data["adresse_bien"] = $row["adresse_bien"];
         if ($row["photol"] == null) {
            $data['photol'] = "../img/image/image-profil.jpg";
         } else {
            $data['photol'] = $row['photol'];
         }
         if ($row["photo_bien"] == null) {
            $data['photo_bien'] = "../img/image/image.jpg";
         } else {
            $data['photo_bien'] = $row['photo_bien'];
         }
      }
      echo json_encode($data);
   } else {
      echo "0";
   }
}

if (isset($_POST['id'])) {
   $id = encryptor('decrypt', $_POST['id']);
   $query = "SELECT * FROM contrat
INNER JOIN bien ON bien.id_bien=contrat.id_bien
INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE reference.id_reference='$id' ORDER BY contrat.id_contrat DESC";
   $statement = $db->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $total_row = $statement->rowCount();
   $data = array();
   $response = array();
   foreach ($result as $row) {
      $response["id_contrat"] = encryptor('encrypt', $row["id_contrat"]);
      $response["date_debut"] = ucfirst(strftime('%A %d %B %Y', strtotime($row["date_debut"])));
      $response["date_fin"] = ucfirst(strftime('%A %d %B %Y', strtotime($row["date_fin"])));
      $response["loyer_estime"] = number_format($row["loyer_estime"], 3, ",", " ");
      $response["etat"] = $row["etat"];
      $response["nom_locataire"] = $row["nom_locataire"];
      $response["telephonel"] = $row["telephonel"];
      $response["nom_bien"] = $row["nom_bien"];
      $response["type"] = $row["type"];
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
