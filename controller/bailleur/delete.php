
          <!-- Topbar Search -->
          <?php 
          include('../../include/connect.php'); 
          include('../../include/config.php');

session_start();
 
  $id=trim(encryptor('decrypt',$_POST['delete_id']));

 $query="DELETE FROM bailleur WHERE id_bailleur=?";
 $statement=$db->prepare($query);
$statement->execute(array($id));
 ?>