<?php
include("../../include/connect.php");
include('../../include/config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');
if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{  

   $update_query = "UPDATE demande_absence SET comment_status = 1 WHERE comment_status=0";
  $statement=$db->prepare($update_query);
$statement->execute();
}
$id=trim(encryptor('decrypt',$_POST['id']));

$query = "SELECT * FROM demande_absence 
INNER JOIN contrat ON contrat.id_contrat=demande_absence.id_contrat
INNER JOIN employe ON employe.id_employe=contrat.id_employe 
   INNER JOIN reference ON reference.id_reference=employe.id_reference 
   WHERE reference.id_reference='$id'
 ORDER BY id_demande_absence DESC LIMIT 5";
 $statement=$db->prepare($query);
	$statement->execute();
$result=$statement->fetchAll();
$output = '';
$total_row=$statement->rowCount();
  if ( $total_row>0) 
{
foreach($result as $row){
	if($row['avis']==""){

						}else if($row['avis']=="Non"){
							
						}else{
							 if($row["photo"] == null)
		{
      $photo="../img/image/image-profil.png";
		}else{
      $photo = $row['photo'];

    }
  $output .= '
  <div class="notification-text">
	<img src="'.$photo.'" class="img-notification">
	<div class="text-sub-text">
		<h4>'.$row['prenom']." ".$row['nom'].'</h4>
		<h5>'.$row['poste_occupe'].'</h5>
		<h6>'.strftime('%A %d %B %Y', strtotime($row['date_v'])).'</h6>
	</div>
</div>
  ';

$status_query = "SELECT COUNT(*) AS rowcount FROM demande_absence WHERE comment_status=0";
$statement=$db->prepare($status_query);
	$statement->execute();
$result=$statement->fetch();
$data = array();

$data['notification'] = $output;
   $data['unseen_notification']  = $result["rowcount"];

	
}
}
}
echo json_encode($data);

}
?>