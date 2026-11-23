<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if (isset($_POST['id_depense'])) {
   $id_depense = encryptor('decrypt', $_POST['id_depense']);
   $query = "SELECT * FROM depense 
INNER JOIN bien ON bien.id_bien=depense.id_bien
 WHERE depense.id_depense='$id_depense'";
   $statement = $db->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $total_row = $statement->rowCount();
   if ($total_row > 0) {
      $data = array();
      foreach ($result as $row) {
         $data["id_depense"] = encryptor('encrypt', $row["id_depense"]);
         $data["date_depense"] = $row["date_depense"];
         $data["type_depense"] = $row["type_depense"];
         $data["montant_depense"] = number_format($row["montant_depense"], 3, ",", " ");
         $data["prestataire"] = $row["prestataire"];
         $data["telephone_prestataire"] = $row["telephone_prestataire"];
         $data["charge_depense"] = $row["charge_depense"];
         $data["nom_bien"] = $row["nom_bien"];
         $data["adresse_bien"] = $row["adresse_bien"];
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
   $query = "SELECT * FROM depense 
INNER JOIN bien ON bien.id_bien=depense.id_bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE reference.id_reference='$id' ORDER BY depense.id_depense DESC";
   $statement = $db->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $total_row = $statement->rowCount();
   $data = array();
   $response = array();
   foreach ($result as $row) {
      $response["id_depense"] = encryptor('encrypt', $row["id_depense"]);
      $response["date_depense"] = strftime('%A %d %B %Y', strtotime($row["date_depense"]));
      $response["type_depense"] = $row["type_depense"];
      $response["montant_depense"] = number_format($row["montant_depense"], 3, ",", " ");
      $response["prestataire"] = $row["prestataire"];
      $response["telephone_prestataire"] = $row["telephone_prestataire"];
      $response["charge_depense"] = $row["charge_depense"];
      $response["nom_bien"] = $row["nom_bien"];
      $response["adresse_bien"] = $row["adresse_bien"];
      if ($row["photo_bien"] == null) {
         $response['photo_bien'] = "../img/image/image.jpg";
      } else {
         $response['photo_bien'] = $row['photo_bien'];
      }
      
      array_push($data, $response);
   }
   echo json_encode($data);
}
