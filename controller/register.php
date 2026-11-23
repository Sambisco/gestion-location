<?php 
include('../include/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	
}
include('../include/config.php');
if(isset($_POST['register'])){
    $nom=trim($_POST['nom']);
    $telephone=trim($_POST['telephone']);
    $emailconnect=strtolower(trim($_POST['emailconnect']));
    $mdp=trim($_POST['mdpconnect']);
    $mdpconnect=trim(md5($_POST['mdpconnect']));
    $date=date("Y-m-d");
    $query="SELECT * FROM user 
    LEFT JOIN reference ON user.iduser=reference.iduser
    LEFT JOIN sub_users ON reference.id_reference=sub_users.id_reference
     WHERE login='$emailconnect' OR telephone_user='$telephone' OR sub_email='$emailconnect' OR telephone_sub_user='$telephone' LIMIT 1";
    $statement=$db->prepare($query);
    $statement->execute();
    $result=$statement->rowCount();
    if($result>0){
        $_SESSION['message_delete']="L'identifiant existe déja. Veillez créér un nouveau identifiant!";
        $_SESSION['msg_type_delete']="danger";
        header("location:../register");
    }else{
        $query= "INSERT INTO user(nomuser,telephone_user,login,password,date_user) VALUES (?,?,?,?,?)";
        $statement=$db->prepare($query);
        $statement->execute(array($nom,$telephone,$emailconnect,$mdpconnect,$date));
        $query = "SELECT * FROM user WHERE login='$emailconnect' OR telephone_user='$telephone'";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $iduser=$result["iduser"];
        $query = "INSERT INTO reference(iduser) VALUES (?)";
        $statement = $db->prepare($query);
        $statement->execute(array($iduser));
        $_SESSION['emailconnect']=$emailconnect;
        $_SESSION['mdpconnect']=$mdp;
        header("location:../");
    }
}
?>