<?php
include('../../include/connect.php');
include('../../include/config.php');

$tmp_name_img=$_FILES['logo']['tmp_name'];

$ext_img=pathinfo($tmp_name_img,PATHINFO_EXTENSION);

$data=file_get_contents($tmp_name_img);

$img_base64=base64_encode($data);
if($_FILES['logo']['tmp_name']==""){
   $image="";
}else{
$image='data:image/'.$ext_img.';base64,'.$img_base64;
}
$id= trim(encryptor('decrypt',$_POST['edit_id']));
$ninea = trim($_POST['ninea']);
$entreprise = trim($_POST['entreprise']);
$adresse = trim($_POST['adresse']);
$telephone = trim($_POST['telephone']);
$fax = trim($_POST['fax']);
$bp = trim($_POST['bp']);
$email = trim($_POST['email']);
$web = trim($_POST['web']);

$tmp_name_dr=$_FILES['logo']['tmp_name'];

$ext_dr=pathinfo($tmp_name_dr,PATHINFO_EXTENSION);

$data_dr=file_get_contents($tmp_name_dr);

$dr_base64=base64_encode($data_dr);
if($_FILES['logo']['tmp_name']==""){
   $image_dr="";
}else{
$image_dr='data:image/'.$ext_dr.';base64,'.$dr_base64;
}

if($_FILES['logo']['tmp_name']==""){
 $query="UPDATE reference SET entreprise=?,adresse=?,telephone=?,email=?,ninea=?,fax=?,bp=?,web=? WHERE id_reference='$id'";
    $statement=$db->prepare($query);
   $statement->execute(array($entreprise, $adresse, $telephone, $email, $ninea, $fax, $bp, $web));
}else{
	 $query="UPDATE reference SET logo=?,entreprise=?,adresse=?,telephone=?,email=?,ninea=?,fax=?,bp=?,web=? WHERE id_reference='$id'";
    $statement=$db->prepare($query);
   $statement->execute(array($image,$entreprise,$adresse,$telephone,$email,$ninea,$fax,$bp,$web));
}


?>