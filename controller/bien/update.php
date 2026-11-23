
<?php
include('../../include/connect.php');
include('../../include/config.php');
$id=trim(encryptor('decrypt',$_POST['edit_id']));
$tmp_name_img = $_FILES['photo_bien']['tmp_name'];

$ext_img = pathinfo($tmp_name_img, PATHINFO_EXTENSION);

$data = file_get_contents($tmp_name_img);

$img_base64 = base64_encode($data);
if ($_FILES['photo_bien']['tmp_name'] == "") {
	$image = "";
} else {
	$image = 'data:image/' . $ext_img . ';base64,' . $img_base64;
}
$nom_bien = trim($_POST['nom_bien']);
$adresse_bien = trim($_POST['adresse_bien']);
$type = trim($_POST['type']);
$valeur_locative = str_replace(',', '.', str_replace(' ', '', trim($_POST['valeur_locative'])));
$commission = str_replace(',', '.', str_replace(' ', '', trim($_POST['commission'])));
$destination = trim($_POST['destination']);
$contrat_gestion = trim($_POST['contrat_gestion']);
if($_FILES["photo_bien"]["tmp_name"]==""){
$query= "UPDATE bien SET nom_bien=?,adresse_bien=?,type=?,valeur_locative=?,commission=?,destination=?,contrat_gestion=? WHERE id_bien=?";
 $statement=$db->prepare($query);
	$statement->execute(array($nom_bien, $adresse_bien, $type, $valeur_locative, $commission, $destination, $contrat_gestion, $id));
}else{
$query= "UPDATE bien SET nom_bien=?,adresse_bien=?,type=?,valeur_locative=?,commission=?,destination=?,contrat_gestion=?,photo_bien=? WHERE id_bien=?";
 $statement=$db->prepare($query);
	$statement->execute(array($nom_bien, $adresse_bien, $type, $valeur_locative, $commission, $destination, $contrat_gestion, $image, $id));
}

?>