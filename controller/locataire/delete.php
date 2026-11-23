
          <!-- Topbar Search -->
          <?php 
          include('../../include/connect.php'); 
          include('../../include/config.php');

session_start();
 
  $id=trim(encryptor('decrypt',$_POST['delete_id']));

 $query="DELETE FROM locataire WHERE id_locataire=?";
 $statement=$db->prepare($query);
$statement->execute(array($id));
 ?>