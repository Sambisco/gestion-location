<?php
session_start();

include('../../include/connect.php');
include('../../include/config.php');
$tmp_name_img=$_FILES['photo']['tmp_name'];

$ext_img=pathinfo($tmp_name_img,PATHINFO_EXTENSION);

$data=file_get_contents($tmp_name_img);

$img_base64=base64_encode($data);
if($_FILES['photo']['tmp_name']==""){
   $image="";
}else{
$image='data:image/'.$ext_img.';base64,'.$img_base64;
}
 $nom_sub_user=trim($_POST['nom_sub_user']);
 $telephone_sub_user=trim($_POST['telephone_sub_user']);
 $sub_email=strtolower(trim($_POST['sub_email']));
 $profil=trim($_POST['profil']);
 $sub_password=trim(md5($_POST['sub_password']));
 $id_reference=trim(encryptor('decrypt',$_POST['id_reference']));
 $query="SELECT * FROM user 
  LEFT JOIN reference ON user.iduser=reference.iduser
    LEFT JOIN sub_users ON sub_users.id_reference=reference.id_reference 
  WHERE sub_email='$sub_email' OR telephone_sub_user='$telephone_sub_user' OR login='$sub_email' OR telephone_user='$telephone_sub_user' LIMIT 1";
   $statement=$db->prepare($query);
   $statement->execute();
$result=$statement->fetchAll();
$total_row=$statement->rowCount();
 if ($total_row>0) {
  echo 'true';
 }else{
 $query= "INSERT INTO sub_users( nom_sub_user, telephone_sub_user, sub_email, profil, sub_password, photo, id_reference) VALUES (?,?,?,?,?,?,?)";
 $statement=$db->prepare($query);
$statement->execute(array($nom_sub_user,$telephone_sub_user,$sub_email,$profil,$sub_password,$image,$id_reference));
 }
?>