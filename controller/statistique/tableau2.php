<?php
include("../../include/connect.php");
include('../../include/config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

$id = trim(encryptor('decrypt', $_POST['id']));
$date = trim($_POST['date']);
$date_du2 = trim($_POST['date_du2']);
$date_au2 = trim($_POST['date_au2']);
if ($date_du2 == "" && $date_au2 == "") {
	$query = "SELECT * FROM depense 
INNER JOIN bien ON bien.id_bien=depense.id_bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE  reference.id_reference='$id' AND DATE_FORMAT(depense.date_depense,'%Y')='$date'
                   ";
} else {
	$query = "SELECT * FROM depense 
INNER JOIN bien ON bien.id_bien=depense.id_bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE  reference.id_reference='$id' AND DATE_FORMAT(depense.date_depense,'%Y-%m') BETWEEN '$date_du2' AND '$date_au2'
                   ";
}
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$count = 0;
$data = array();
$response = array();
foreach ($result as $row) {
	$response["id_depense"] = encryptor('encrypt', $row["id_depense"]);
	$response["date_depense"] = strftime('%A %d %B %Y', strtotime($row["date_depense"]));
	$response["type_depense"] = $row["type_depense"];
	$response["montant_depense"] = number_format($row["montant_depense"], 3, ",", " ");
	$response["prestataire"] = $row["prestataire"];
	$response["telephone_prestataire"] = $row["telephone_prestataire"];
	$response["charge_depense"] = $row["charge_depense"];
	$response["nom_bien"] = $row["nom_bien"];
	$response["adresse_bien"] = $row["adresse_bien"];
	if ($row["photo_bien"] == null) {
		$response['photo_bien'] = "../img/image/image.jpg";
	} else {
		$response['photo_bien'] = $row['photo_bien'];
	}

	array_push($data, $response);
}
echo json_encode($data);