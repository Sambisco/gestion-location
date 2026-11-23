<?php 
include('../../include/connect.php');
include('../../include/config.php');
$id=trim(encryptor('decrypt',$_POST['delete_id']));
$query="DELETE FROM siege  WHERE id_siege ='$id'";
 $statement=$db->prepare($query);
$statement->execute();
?>