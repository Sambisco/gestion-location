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
        WHERE reference.id_reference='$id' AND contrat_gestion='Post paiement' AND etat='Actif' ORDER BY contrat.id_contrat DESC";
	$statement = $db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$data = array();
	$response = array();
	foreach ($result as $row) {
		$id_contrat = $row["id_contrat"];
		$query = "SELECT *,DATE_FORMAT(loyer.mois,'%Y-%m') AS loyer_mois FROM loyer
INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat
INNER JOIN bien ON bien.id_bien=contrat.id_bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
             WHERE contrat.id_contrat='$id_contrat' ORDER BY loyer.id_loyer DESC";
		$statement = $db->prepare($query);
		$statement->execute();
		$result_loyer = $statement->fetch();
		$response["id_contrat"] = encryptor('encrypt', $row["id_contrat"]);
		if($result_loyer["mois"]==null){
			$response["mois"] = "";
		}else{
			$response["mois"] = ucfirst(strftime('%B %Y', strtotime($result_loyer["mois"])));
		}
		if($result_loyer["date_paiement"]==null){
			$response["date_paiement"] = "";
		}else{
			$response["date_paiement"] = ucfirst(strftime('%A %d %B %Y', strtotime($result_loyer["date_paiement"])));
		}
		$response["montant"] = number_format($result_loyer["montant"], 3, ",", " ");
		$response["etat"] = $row["etat"];
		$response["nom_bailleur"] = $row["nom_bailleur"];
		$response["telephoneb"] = $row["telephoneb"];
		$response["nom_bien"] = $row["nom_bien"];
		$response["adresse_bien"] = $row["adresse_bien"];
		$response["valeur_locative"] = number_format($row["valeur_locative"], 3, ",", " ");
		$response["commission"] = number_format($row["commission"], 3, ",", " ");
		$response["type"] = $row["type"];
		$response["type_contrat"] = $row["type_contrat"];
		if ($row["photob"] == null) {
			$response['photob'] = "../img/image/image-profil.jpg";
		} else {
			$response['photob'] = $row['photob'];
		}
		$date1 = strtotime(date("Y-m"));
		$date2 = strtotime($result_loyer['loyer_mois']);
		$diff = abs($date2 - $date1);
		$years = floor($diff / (365 * 60 * 60 * 24));
		$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
		$response["nbr_mois"] = $months;
		if ($result_loyer['loyer_mois'] < date("Y-m")) {
			$response["arriere"] =  "Arriéré :"." ".$months." "."mois";
			$response["arrierecheck"] = $months;
			$response["checked"]= "";
		} else {
			$response["arriere"] = "A jour";
			$response["arrierecheck"] = 0;
			$response["checked"]= "checked";
		}
		if($months==0){
			$total_percu = ($result_loyer["montant"] - $row["commission"]);
			$response["total_percu"] = number_format($total_percu, 3, ",", " ");
		}else{
			$total_percu = (($result_loyer["montant"] - $row["commission"])*$months);
			$response["total_percu"] = number_format($total_percu, 3, ",", " ");
		}
	
		array_push($data, $response);
	}
	echo json_encode($data);
}
