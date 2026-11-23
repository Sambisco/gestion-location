<!-- Topbar Search -->
<?php
include('../../include/connect.php');
include('../../include/config.php');
for ($count = 0; $count < $_POST["cinb"]; $count++) {
	$id_reference = encryptor('decrypt', $_POST['id_reference']);
	$nom_bailleur = $_POST['nom_bailleur'];
	$adresseb = $_POST['adresseb'];
	$telephoneb = $_POST['telephoneb'];
	$emailb = $_POST['emailb'];
	$cinb = $_POST['cinb'];
	$query = "INSERT INTO bailleur(nom_bailleur, adresseb, telephoneb, emailb, cinb, id_reference) VALUES (?,?,?,?,?,?)";
	$statement = $db->prepare($query);
	$statement->execute(array($nom_bailleur[$count], $adresseb[$count], $telephoneb[$count], $emailb[$count], $cinb[$count], $id_reference));
}

?>