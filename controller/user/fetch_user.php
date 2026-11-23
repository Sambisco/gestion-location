<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
if(isset($_POST['id_user'])){
 $id=encryptor('decrypt',$_POST['id_user']);
 $query="SELECT * FROM sub_users WHERE id_sub_users='$id' ";
    $statement=$db->prepare($query);
	$statement->execute();
$result=$statement->fetchAll();
$total_row=$statement->rowCount();
    $data = array();
  foreach($result as $row){
    $data["id_sub_users"]=encryptor('encrypt',$row["id_sub_users"]);
    $data["nom_sub_user"]=$row["nom_sub_user"];
    $data["telephone_sub_user"]=$row["telephone_sub_user"];
    $data["sub_email"]=$row["sub_email"]; 
    $data["profil"]=$row["profil"];
    $data["id_reference"] = encryptor('encrypt', $row["id_reference"]);
    if($row["photo"] == null)
		{
      $data['photo'] ="../img/image/image-profil.jpg";
		}else{
      $data['photo'] = $row['photo'];

    }
		
  }
  echo json_encode($data);
}

if (isset($_POST['id'])) {
  $id = encryptor('decrypt', $_POST['id']);
  $query = "SELECT * FROM sub_users 
  INNER JOIN reference ON reference.id_reference=sub_users.id_reference
INNER JOIN user ON user.iduser=reference.iduser
  WHERE user.iduser='$id' ORDER BY user.iduser DESC";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  $data = array();
  $response = array();
  foreach ($result as $row) {
    $response["id_sub_users"] = encryptor('encrypt', $row["id_sub_users"]);
    $response["nom_sub_user"] = $row["nom_sub_user"];
    $response["telephone_sub_user"] = $row["telephone_sub_user"];
    $response["sub_email"] = $row["sub_email"];
    $response["profil"] = $row["profil"];
    if ($row["photo"] == null) {
      $response['photo'] = "../img/image/image-profil.jpg";
    } else {
      $response['photo'] = $row['photo'];
    }
    array_push($data, $response);
  }
  echo json_encode($data);
}
?>

