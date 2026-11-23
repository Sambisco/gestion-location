<?php 
include('../../include/connect.php');
include('../../include/config.php');
session_start();
$id_reference=encryptor('decrypt',$_POST['id_reference']);
$siege=trim($_POST['siege']);
$telephones = trim($_POST['telephones']);
$query="SELECT  * FROM siege WHERE id_reference='$id_reference' AND siege='$siege'";
  $statement=$db->prepare($query);
  $statement->execute();
$result=$statement->fetchAll();
$total_row=$statement->rowCount();
if ($total_row>0) {
    echo "true";
    }else{
$query= "INSERT INTO siege(id_reference,siege,telephones) VALUES (?,?,?)";
 $statement=$db->prepare($query);
$statement->execute(array($id_reference,$siege, $telephones));
	}
?>