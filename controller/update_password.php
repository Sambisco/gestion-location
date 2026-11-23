<?php 
include('../include/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	
}
 if(isset($_POST['submit'])){
 $emailconnect=$_POST['emailconnect'];
$mdpconnect=trim(md5($_POST['mdpconnect']));
$query= "SELECT *,user.iduser AS iduser,reference.id_reference AS id_reference  FROM user 
    LEFT JOIN reference ON user.iduser=reference.iduser
    LEFT JOIN sub_users ON reference.id_reference=sub_users.id_reference
    WHERE user.login='".$emailconnect."' 
    OR sub_email='".$emailconnect."' LIMIT 1";
    $statement=$db->prepare($query);
    $statement->execute();
     $userinfo=$statement->fetch();
      if($userinfo['sub_email']==$emailconnect){
$query="UPDATE sub_users SET sub_password='$mdpconnect' WHERE sub_email='$emailconnect'";
$statement = $db->prepare($query);
$statement->execute();
 $_SESSION['message_sucess']="Le mot de passe a été modifier&nbsp;<a href='../' style='text-decoration: none;color:#127b8e;'>Se connecter</a>";
 $_SESSION['emailconnect']=$emailconnect;
 $_SESSION['mdpconnect']=$mdp;
header("Location:initialise_password?code=$emailconnect");
      }else{
        $query="UPDATE user SET password='$mdpconnect' WHERE login='$emailconnect'";
$statement = $db->prepare($query);
$statement->execute();
 $_SESSION['message_sucess']="Le mot de passe a été modifier&nbsp;<a href='../' style='text-decoration: none;color:#127b8e;'>Se connecter</a>";
 $_SESSION['emailconnect']=$emailconnect;
 $_SESSION['mdpconnect']=$mdp;
header("Location:initialise_password?code=$emailconnect");
      }
}
 

?>
