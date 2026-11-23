<?php
include('../../include/connect.php');
include('../../include/config.php');
$tmp_name_img = $_FILES['photo_bien']['tmp_name'];

$ext_img = pathinfo($tmp_name_img, PATHINFO_EXTENSION);

$data = file_get_contents($tmp_name_img);

$img_base64 = base64_encode($data);
if ($_FILES['photo_bien']['tmp_name'] == "") {
  $image = "";
} else {
  $image = 'data:image/' . $ext_img . ';base64,' . $img_base64;
}
$id_bailleur = trim(encryptor('decrypt', $_POST['id_bailleur']));
$nom_bien = trim($_POST['nom_bien']);
$adresse_bien = trim($_POST['adresse_bien']);
$type = trim($_POST['type']);
$valeur_locative = str_replace(',','.',str_replace(' ','',trim($_POST['valeur_locative'])));
$commission = str_replace(',','.',str_replace(' ','',trim($_POST['commission'])));
$destination = trim($_POST['destination']);
$contrat_gestion=trim($_POST['contrat_gestion']);
$query = "INSERT INTO bien(nom_bien, adresse_bien, type, valeur_locative, commission,destination,contrat_gestion, photo_bien, id_bailleur) VALUES (?,?,?,?,?,?,?,?,?)";
$statement = $db->prepare($query);
$statement->execute(array($nom_bien, $adresse_bien, $type, $valeur_locative, $commission, $destination, $contrat_gestion, $image, $id_bailleur));
