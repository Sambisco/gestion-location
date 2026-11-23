<!-- Topbar Search -->
<?php
include('../../include/connect.php');
include('../../include/config.php');
for ($count = 0; $count < $_POST["cinl"]; $count++) {
	$id_reference = encryptor('decrypt', $_POST['id_reference']);
	$nom_locataire = $_POST['nom_locataire'];
	$adressel = $_POST['adressel'];
	$telephonel = $_POST['telephonel'];
	$emaill = $_POST['emaill'];
	$cinl = $_POST['cinl'];
	$query = "INSERT INTO locataire(nom_locataire, adressel, telephonel, emaill, cinl, id_reference) VALUES (?,?,?,?,?,?)";
	$statement = $db->prepare($query);
	$statement->execute(array($nom_locataire[$count], $adressel[$count], $telephonel[$count], $emaill[$count], $cinl[$count], $id_reference));
}

?>