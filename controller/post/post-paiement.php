<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if (isset($_POST['id'])) {
	$id = encryptor('decrypt', $_POST['id']);
	$query = "SELECT * FROM contrat
       INNER JOIN bien ON bien.id_bien=contrat.id_bien
       INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
       INNER JOIN reference ON reference.id_reference=bailleur.id_reference
        WHERE reference.id_reference='$id' AND contrat_gestion='Post paiement' AND etat='Actif' GROUP BY bailleur.id_bailleur ORDER BY contrat.id_contrat DESC";
	$statement = $db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$data = array();
	$response = array();
	$count = 0;
	foreach ($result as $row) {
		$count++;
		$response["id_bailleur"] = encryptor('encrypt', $row["id_bailleur"]);
		$response["nom_bailleur"] = $row["nom_bailleur"];
		$response["adresseb"] = $row["adresseb"];
		$response["telephoneb"] = $row["telephoneb"];
		$response["emailb"] = $row["emailb"];
		$response["cinb"] = $row["cinb"];
		if ($row["photob"] == null) {
			$response['photob'] = "../img/image/image-profil.jpg";
		} else {
			$response['photob'] = $row['photob'];
		}
		
		array_push($data, $response);
	}
	echo json_encode($data);
}
