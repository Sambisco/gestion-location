<?php 
include('../../include/connect.php');
include('../../include/config.php');
$id=trim(encryptor('decrypt',$_POST['delete_id']));
$query="DELETE FROM depense WHERE id_depense='$id'";
 $statement=$db->prepare($query);
$statement->execute();
?>