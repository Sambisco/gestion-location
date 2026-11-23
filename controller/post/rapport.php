<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');
if (isset($_POST['id_bailleur'])) {
	$id = encryptor('decrypt', $_POST['id_bailleur']);
	
	$query = "SELECT * FROM contrat
       INNER JOIN bien ON bien.id_bien=contrat.id_bien
       INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
       INNER JOIN reference ON reference.id_reference=bailleur.id_reference
        WHERE bailleur.id_bailleur='$id'
		 GROUP BY bien.id_bien
		";
	$statement = $db->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$count = 0;
	$outpout = "";
	foreach ($result as $row) {
		$count++;
		$id_contrat = $row["id_contrat"];
		$outpout .= '
<div class="page">
	<div class="page-front">
		<h1 class="title">' . $row["nom_bien"] . '</h1>
		<div class="workeduc-box">
			<div class="workeduc">
			';
		$query = "SELECT *,DATE_FORMAT(loyer.mois,'%Y-%m') AS loyer_mois FROM loyer
                          INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat
                          INNER JOIN bien ON bien.id_bien=contrat.id_bien
						   INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire
                          INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
                          INNER JOIN reference ON reference.id_reference=bailleur.id_reference
                          WHERE contrat.id_contrat='$id_contrat' ORDER BY loyer.id_loyer DESC";
		$statement = $db->prepare($query);
		$statement->execute();
		$result_loyer = $statement->fetchAll();
		foreach ($result_loyer as $row_loyer) {
			$reverser=($row_loyer["montant"]- $row_loyer["commission"]);
			$outpout.= '
				<div class="workeduc-content">
					 <span class="year"><i class="fa fa-calendar"></i>' . ucfirst(strftime('%B %Y', strtotime($row_loyer["mois"]))) . '</span>
					<div class="skills-box">
						<div class="skills-content">
							<h3>' . $row_loyer["nom_locataire"] . '</h3>
							<div class="content">
								<span>
									<i class="fa fa-file"></i>
									<h4>LOYER</h4>
									<h5>' . number_format($row_loyer["montant"], 0, ",", " ") . '</h5>
								</span>
								<span>
									<i class="fa fa-file-import fa-rotate-90"></i>
									<h4>Commission</h4>
									<h5>' . number_format($row_loyer["commission"], 0, ",", " ") . '</h5>
								</span>
								<span>
									<i class="fa fa-file-export"></i>
									<h4>à reverser</h4>
									<h5>' . number_format($reverser, 0, ",", " ") . '</h5>
								</span>
								<span>
									<i class="fa fa-file-contract"></i>
									<h4>contrat</h4>
									<h5>' . $row["etat"] . '</h5>
								</span>
							</div>
						</div>
					</div>
				</div>
				';
			}
			$outpout.= '
			</div>
		</div>
		<div class="number-page">' . $count . '</div>
		<!--prev button--->
	</div>
</div>
';
		}
	}
echo $outpout
?>