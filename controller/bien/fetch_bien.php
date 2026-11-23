<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if (isset($_POST['id_bien'])) {
  $id_bien = encryptor('decrypt', $_POST['id_bien']);
  $query = "SELECT * FROM bien
  INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE id_bien='$id_bien'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  if ($total_row > 0) {
    $data = array();
    foreach ($result as $row) {
      $data["id_bien"] = encryptor('encrypt', $row["id_bien"]);
      $data["nom_bien"] = $row["nom_bien"];
      $data["adresse_bien"] = $row["adresse_bien"];
      $data["type"] = $row["type"];
      $data["valeur_locative"] = number_format($row["valeur_locative"], 3, ",", " ");
      $data["commission"] = number_format($row["commission"], 3, ",", " ");
      $data["destination"] = $row["destination"];
      $data["contrat_gestion"] = $row["contrat_gestion"];
      $data["nom_bailleur"] = $row["nom_bailleur"];
      $data["telephoneb"] = $row["telephoneb"];
      if ($row["photo_bien"] == null) {
        $data['photo_bien'] = "../img/image/image.jpg";
      } else {
        $data['photo_bien'] = $row['photo_bien'];
      }
      if ($row["photob"] == null) {
        $data['photob'] = "../img/image/image-profil.png";
      } else {
        $data['photob'] = $row['photob'];
      }
    }
    echo json_encode($data);
  } else {
    echo "0";
  }
}

if (isset($_POST['id'])) {
  $id = encryptor('decrypt', $_POST['id']);
  $query = "SELECT * FROM bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE reference.id_reference='$id' ORDER BY bien.id_bien DESC";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  $data = array();
  $response = array();
  foreach ($result as $row) {
    $id_bien = $row["id_bien"];
    $query = "SELECT * FROM contrat
INNER JOIN bien ON bien.id_bien=contrat.id_bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE bien.id_bien='$id_bien' ORDER BY contrat.id_contrat DESC LIMIT 1";
    $statement = $db->prepare($query);
    $statement->execute();
    $result_contrat = $statement->fetch();
    $response["id_bien"] = encryptor('encrypt', $row["id_bien"]);
    $response["nom_bien"] = $row["nom_bien"];
    $response["adresse_bien"] = $row["adresse_bien"];
    $response["valeur_locative"] = number_format($row["valeur_locative"], 3, ",", " ");
    $response["commission"] = number_format($row["commission"], 3, ",", " ");
    $response["destination"] = $row["destination"];
    $response["contrat_gestion"] = $row["contrat_gestion"];
    $response["nom_bailleur"] = $row["nom_bailleur"];
    $response["telephoneb"] = $row["telephoneb"];
    if ($row["photo_bien"] == null) {
      $response['photo_bien'] = "../img/image/image.jpg";
    } else {
      $response['photo_bien'] = $row['photo_bien'];
    }
    if ($result_contrat["etat"] == "Actif") {
      $response["checked"] = "checked disabled";
      $response["check_add_bien"]= "";
    } else {
      $response["checked"] = "";
      $response["check_add_bien"] = "check-add-bien check-add-bien_".encryptor('encrypt', $row["id_bien"]);
    }
    array_push($data, $response);
  }
  echo json_encode($data);
}
