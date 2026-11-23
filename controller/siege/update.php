
<?php
include('../../include/connect.php');
include('../../include/config.php');
$id=trim(encryptor('decrypt',$_POST['edit_id']));
$siege = trim($_POST['siege']);
$telephones = trim($_POST['telephones']);
$query="UPDATE siege SET siege=?,telephones=? WHERE id_siege=?";
 $statement=$db->prepare($query);
$statement->execute(array($siege, $telephones,$id));
?>