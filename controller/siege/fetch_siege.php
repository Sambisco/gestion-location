<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if(isset($_POST['id_siege'])){
  $id_siege=encryptor('decrypt',$_POST['id_siege']);
 $query="SELECT * FROM siege 
 WHERE id_siege='$id_siege'";
    $statement=$db->prepare($query);
	$statement->execute();
$result=$statement->fetchAll();
$total_row=$statement->rowCount();
  if ( $total_row>0) {
    $data = array();
  foreach($result as $row){
    $data["id_siege"]=encryptor('encrypt',$row["id_siege"]);
    $data["siege"]= $row["siege"];
     $data["telephones"]=$row["telephones"];
  }
  echo json_encode($data);
	}
  else {
    echo "0" ; 
  }
}

if (isset($_POST['id'])) {
  $id = encryptor('decrypt', $_POST['id']);
  $query = "SELECT * FROM siege 
  INNER JOIN reference ON reference.id_reference=siege.id_reference
 WHERE reference.id_reference='$id' ORDER BY siege.id_siege DESC";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
    $data = array();
    $response = array();
    foreach ($result as $row) {
      $response["id_siege"] = encryptor('encrypt', $row["id_siege"]);
      $response["siege"] = $row["siege"];
      $response["telephones"] = $row["telephones"];
      array_push($data, $response);
    }
    echo json_encode($data);
}
?>