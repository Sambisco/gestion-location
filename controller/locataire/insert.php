<?php
include('../../include/connect.php');
include('../../include/config.php');
$tmp_name_img = $_FILES['photol']['tmp_name'];

$ext_img = pathinfo($tmp_name_img, PATHINFO_EXTENSION);

$data = file_get_contents($tmp_name_img);

$img_base64 = base64_encode($data);
if ($_FILES['photol']['tmp_name'] == "") {
   $image = "";
} else {
   $image = 'data:image/' . $ext_img . ';base64,' . $img_base64;
}
$id_reference = trim(encryptor('decrypt', $_POST['id_reference']));
$nom_locataire = trim($_POST['nom_locataire']);
$adressel = trim($_POST['adressel']);
$telephonel = trim($_POST['telephonel']);
$emaill = trim($_POST['emaill']);
$cinl = trim($_POST['cinl']);
$query = "INSERT INTO locataire(nom_locataire, adressel, telephonel, emaill, cinl, photol, id_reference) VALUES (?,?,?,?,?,?,?)";
$statement = $db->prepare($query);
$statement->execute(array($nom_locataire, $adressel, $telephonel, $emaill, $cinl, $image, $id_reference));
