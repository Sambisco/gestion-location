<?php
include('../../include/connect.php');
include('../../include/config.php');
$tmp_name_img = $_FILES['photob']['tmp_name'];

$ext_img = pathinfo($tmp_name_img, PATHINFO_EXTENSION);

$data = file_get_contents($tmp_name_img);

$img_base64 = base64_encode($data);
if ($_FILES['photob']['tmp_name'] == "") {
   $image = "";
} else {
   $image = 'data:image/' . $ext_img . ';base64,' . $img_base64;
}
$id_reference = trim(encryptor('decrypt', $_POST['id_reference']));
$nom_bailleur = trim($_POST['nom_bailleur']);
$adresseb = trim($_POST['adresseb']);
$telephoneb = trim($_POST['telephoneb']);
$emailb = trim($_POST['emailb']);
$cinb = trim($_POST['cinb']);
$query = "INSERT INTO bailleur(nom_bailleur, adresseb, telephoneb, emailb, cinb, photob, id_reference) VALUES (?,?,?,?,?,?,?)";
$statement = $db->prepare($query);
$statement->execute(array($nom_bailleur, $adresseb, $telephoneb, $emailb, $cinb, $image, $id_reference));
