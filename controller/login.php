<?php
include('../include/connect.php');
if (session_status() == PHP_SESSION_NONE) {
     session_start();
}
include('../include/config.php');
if (isset($_POST['login'])) {
     $emailconnect = strtolower(trim($_POST['emailconnect']));
     $mdpconnect = trim(md5($_POST['mdpconnect']));
     $query = "SELECT *,reference.id_reference AS id_ref FROM user 
    LEFT JOIN reference ON user.iduser=reference.iduser
    LEFT JOIN sub_users ON reference.id_reference=sub_users.id_reference
    WHERE user.login='" . $emailconnect . "' AND user.password='" . $mdpconnect . "' OR user.telephone_user='" . $emailconnect . "' AND user.password='" . $mdpconnect . "'
    OR sub_email='" . $emailconnect . "' AND sub_password='" . $mdpconnect . "' OR telephone_sub_user='" . $emailconnect . "' AND sub_password='" . $mdpconnect . "' LIMIT 1";
     $statement = $db->prepare($query);
     $statement->execute();
     $userexist = $statement->rowCount();
     if ($userexist == 1) {
          $userinfo = $statement->fetch();
          $_SESSION['email'] = $emailconnect;
          $id  = encryptor('encrypt', $userinfo['id_ref']);
          if ($userinfo['sub_email'] == $emailconnect || $userinfo['telephone_sub_user'] == $emailconnect) {
               $_SESSION['nom_sub_user'] = $userinfo['nom_sub_user'];
               $_SESSION['profil'] = $userinfo['profil'];
               if ($userinfo['profil'] == "Administrateur") {
                    header("location:../page/dashboard?id=$id");
                    exit();
               } else if ($userinfo['profil'] == "Utilisateur") {
                    header("location:../page/dashboard?id=$id");
                    exit();
               } else {
                    $_SESSION['message_delete'] = "Identifiants incorrects";
                    $_SESSION['msg_type_delete'] = "danger";
                    header("location:../");
                    exit();
               }
          } else {
               $_SESSION['nomuser'] = $userinfo['nomuser'];
               if ($userinfo['entreprise'] == null) {
                    header("location:../page/reference?id=$id");
                    exit();
               } else {
                    header("location:../page/dashboard?id=$id");
                    exit();
               }
          }
     } else {
          $_SESSION['message_delete'] = "Identifiants incorrects";
          $_SESSION['msg_type_delete'] = "danger";
          header("location:../");
          exit();
     }
}
