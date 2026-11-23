<?php 
include('../../include/connect.php');
include('../../include/config.php');

$tmp_name_img=$_FILES['photo']['tmp_name'];

$ext_img=pathinfo($tmp_name_img,PATHINFO_EXTENSION);

$data=file_get_contents($tmp_name_img);

$img_base64=base64_encode($data);

$image='data:image/'.$ext_img.';base64,'.$img_base64;

$id = trim(encryptor('decrypt',$_POST['edit_id']));
$nom_sub_user=trim($_POST['nom_sub_user']);
 $telephone_sub_user=trim($_POST['telephone_sub_user']);
 $sub_email=strtolower(trim($_POST['sub_email']));
 $profil=trim($_POST['profil']);
 $sub_password=trim(md5($_POST['sub_password']));
if($_FILES["photo"]["tmp_name"]=="" || $_POST['sub_password']==""){
$query="UPDATE sub_users SET nom_sub_user='$nom_sub_user',telephone_sub_user='$telephone_sub_user',sub_email='$sub_email',profil='$profil' WHERE id_sub_users='$id'";
 $statement=$db->prepare($query);
$statement->execute();
}else{
    $query="UPDATE sub_users SET nom_sub_user='$nom_sub_user',telephone_sub_user='$telephone_sub_user',sub_email='$sub_email',profil='$profil',photo='$image' WHERE id_sub_users='$id'";
    $statement=$db->prepare($query);
   $statement->execute(); 
}
if($_POST['sub_password']==""){
    $query="UPDATE sub_users SET nom_sub_user='$nom_sub_user',telephone_sub_user='$telephone_sub_user',sub_email='$sub_email',profil='$profil' WHERE id_sub_users='$id'";
     $statement=$db->prepare($query);
    $statement->execute();
    }else{
        $query="UPDATE sub_users SET nom_sub_user='$nom_sub_user',telephone_sub_user='$telephone_sub_user',sub_email='$sub_email',profil='$profil',sub_password='$sub_password' WHERE id_sub_users='$id'";
        $statement=$db->prepare($query);
       $statement->execute(); 
    }

?>