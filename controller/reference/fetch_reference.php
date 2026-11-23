<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include('../../include/connect.php');
include('../../include/config.php');

setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if (isset($_POST['id_reference'])) {
  $id = encryptor('decrypt', $_POST['id_reference']);
  $query = "SELECT * FROM reference WHERE id_reference='$id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
    $data = array();
    foreach ($result as $row) {
      $data["id_reference"] = encryptor('encrypt', $row["id_reference"]);
      $data["entreprise"] = $row["entreprise"];
      $data["adresse"] = $row["adresse"];
      $data["telephone"] = $row["telephone"];
      $data["fax"] = $row["fax"];
      $data["bp"] = $row["bp"];
      $data["email"] = $row["email"];
      $data["ninea"] = $row["ninea"];
      $data["web"] = $row["web"];
      if ($row["logo"] == null) {
        $data['logo'] = "../img/image/image.jpg";
      } else {
        $data['logo'] = $row['logo'];
      }
    }

    echo json_encode($data);
 
}
