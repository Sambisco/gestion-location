<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if (isset($_POST['id_locataire'])) {
  $id_locataire = encryptor('decrypt', $_POST['id_locataire']);
  $query = "SELECT * FROM locataire 
 WHERE id_locataire='$id_locataire'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  if ($total_row > 0) {
    $data = array();
    foreach ($result as $row) {
      $data["id_locataire"] = encryptor('encrypt', $row["id_locataire"]);
      $data["nom_locataire"] = $row["nom_locataire"];
      $data["adressel"] = $row["adressel"];
      $data["telephonel"] = $row["telephonel"];
      $data["emaill"] = $row["emaill"];
      $data["cinl"] = $row["cinl"];
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
  $query = "SELECT * FROM locataire 
  INNER JOIN reference ON reference.id_reference=locataire.id_reference
 WHERE reference.id_reference='$id' ORDER BY locataire.id_locataire DESC";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  $data = array();
  $response = array();
  foreach ($result as $row) {
    $response["id_locataire"] = encryptor('encrypt', $row["id_locataire"]);
    $response["nom_locataire"] = $row["nom_locataire"];
    $response["adressel"] = $row["adressel"];
    $response["telephonel"] = $row["telephonel"];
    $response["emaill"] = $row["emaill"];
    $response["cinl"] = $row["cinl"];
    if ($row["photol"] == null) {
      $response['photol'] = "../img/image/image-profil.jpg";
    } else {
      $response['photol'] = $row['photol'];
    }
    array_push($data, $response);
  }
  echo json_encode($data);
}
