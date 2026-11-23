<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
include( '../PHPMailer/Exception.php');
include( '../PHPMailer/PHPMailer.php');
include( '../PHPMailer/SMTP.php');

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['reinitialiser'])){
    $email=$_POST['emailconnect'];
try {
    //Server settings
    $mail->isSMTP();                                   // Set mailer to use SMTP
            $mail->SMTPDebug = 2;

        $mail->Host = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'taktyl@taktyl-light.com';                 // SMTP username
        $mail->Password = 'Colonel19@';                           // SMTP password
        // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = 587;   // for tls                                 // TCP port to connect to
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('taktyl@taktyl-light.com'); // from who? 
        $mail->addAddress($email);     // Add a recipient
    //Attachments

    $url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/initialise_password?code=$email"; 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Votre lien de reinitialisation de mot de passe';
    $mail->Body    = "<h1> vous avez demandé la réinitialisation du mot de passe </h1>
    Cliquez sur <a href='$url'>ce lien</a> pour modifier votre mot de passe";
    $mail->AltBody = 'Ceci est le corps en texte brut pour les clients de messagerie non HTML';
// to solve a problem 
$mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
);
    $_SESSION['message_sucess']="Le Message de reinitialisation a été envoyer";
   header("Location:../email_recupe");
   $mail->send();
   exit(); 
} catch (Exception $e) {
    $_SESSION['message_delete']="Le Message de reinitialisation n'a pas été envoyer";
 header("Location:../email_recupe");
}
}

