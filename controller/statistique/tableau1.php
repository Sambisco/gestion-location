<?php
include("../../include/connect.php");
include('../../include/config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

		$id = trim(encryptor('decrypt', $_POST['id']));
		$date = trim($_POST['date']);
		$date_du1 = trim($_POST['date_du1']);
		$date_au1 = trim($_POST['date_au1']);
$data = array();
$response = array();
		if ($date_du1 == "" && $date_au1 == "") {
			$query = "SELECT * FROM loyer
INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat
INNER JOIN bien ON bien.id_bien=contrat.id_bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
  WHERE reference.id_reference='$id' AND DATE_FORMAT(loyer.mois,'%Y')='$date'
                   ";
		} else {
			$query = "SELECT * FROM loyer
INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat
INNER JOIN bien ON bien.id_bien=contrat.id_bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
  WHERE reference.id_reference='$id' AND DATE_FORMAT(loyer.mois,'%Y-%m') BETWEEN '$date_du1' AND '$date_au1'
                   ";
		}
		$statement = $db->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();

		$count = 0;
		foreach ($result as $row) {
	$response["numero"] = $row["numero"];
	$response["mois"] = ucfirst(strftime('%B %Y', strtotime($row["mois"])));
	$response["date_paiement"] = ucfirst(strftime('%A %d %B %Y', strtotime($row["date_paiement"])));
	$response["montant"] = number_format($row["montant"], 3, ",", " ");
	$response["nom_bailleur"] = $row["nom_bailleur"];
	$response["telephoneb"] = $row["telephoneb"];
	$response["nom_bien"] = $row["nom_bien"];
	$response["valeur_locative"] = number_format($row["valeur_locative"], 3, ",", " ");
	$response["commission"] = number_format($row["commission"], 3, ",", " ");
	if ($row["photob"] == null) {
		$response['photob'] = "../img/image/image-profil.png";
	} else {
		$response['photob'] = $row['photob'];
	}
	array_push($data, $response);
}
echo json_encode($data);
		?>