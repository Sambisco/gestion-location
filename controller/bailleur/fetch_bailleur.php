<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if (isset($_POST['id_bailleur'])) {
  $id_bailleur = encryptor('decrypt', $_POST['id_bailleur']);
  $query = "SELECT * FROM bailleur 
 WHERE id_bailleur='$id_bailleur'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  if ($total_row > 0) {
    $data = array();
    foreach ($result as $row) {
      $data["id_bailleur"] = encryptor('encrypt', $row["id_bailleur"]);
      $data["nom_bailleur"] = $row["nom_bailleur"];
      $data["adresseb"] = $row["adresseb"];
      $data["telephoneb"] = $row["telephoneb"];
      $data["emailb"] = $row["emailb"];
      $data["cinb"] = $row["cinb"];
      if ($row["photob"] == null) {
        $data['photob'] = "../img/image/image-profil.jpg";
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
  $query = "SELECT * FROM bailleur 
  INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE reference.id_reference='$id' ORDER BY bailleur.id_bailleur DESC";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  $data = array();
  $response = array();
  foreach ($result as $row) {
    $response["id_bailleur"] = encryptor('encrypt', $row["id_bailleur"]);
    $response["nom_bailleur"] = $row["nom_bailleur"];
    $response["adresseb"] = $row["adresseb"];
    $response["telephoneb"] = $row["telephoneb"];
    $response["emailb"] = $row["emailb"];
    $response["cinb"] = $row["cinb"];
    if ($row["photob"] == null) {
      $response['photob'] = "../img/image/image-profil.jpg";
    } else {
      $response['photob'] = $row['photob'];
    }
    array_push($data, $response);
  }
  echo json_encode($data);
}
