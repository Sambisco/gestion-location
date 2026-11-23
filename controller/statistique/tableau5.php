<?php
include("../../include/connect.php");
include('../../include/config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');
?>
<table id="example5" class="stripe hover mytab" style="width:100%;" data-order='[[0,"desc"]]'>
	<thead>
		<tr>
			<th>#</th>
			<th class="no-export">Photo</th>
			<th style="min-width:200px;">Prenom</th>
			<th style="min-width:100px;">Nom</th>
			<th style="min-width:100px;">Matricule</th>
			<th style="min-width:200px;">Categorie</th>
			<th style="min-width:200px;">Poste occupe</th>
			<th style="min-width:150px;">Telephone</th>
			<th style="min-width:150px;">Periode paie</th>
			<th style="min-width:200px;">Date paie</th>
			<th style="min-width:150px;">Mode paie</th>
			<th style="min-width:200px;">Cotisation amicale</th>
			<th style="min-width:200px;">Retenue Tabaski</th>
			<th style="min-width:200px;">Autre</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$id = trim(encryptor('decrypt', $_POST['id']));
		$date = trim($_POST['date']);
		$date_du5 = trim($_POST['date_du5']);
		$date_au5 = trim($_POST['date_au5']);
		if ($date_du5 == "" && $date_au5 == "") {
			$query = "SELECT salaire.*,DATE_FORMAT(salaire.date_du,'%M-%Y') AS date_du,employe.*,contrat.date_embauche,reference.* FROM salaire 
INNER JOIN contrat ON contrat.id_contrat=salaire.id_contrat
INNER JOIN employe ON employe.id_employe=contrat.id_employe
INNER JOIN reference ON reference.id_reference=employe.id_reference
 WHERE  reference.id_reference='$id' AND DATE_FORMAT(salaire.date_du,'%Y')='$date'
                   ";
		} else {
			$query = "SELECT salaire.*,DATE_FORMAT(salaire.date_du,'%M-%Y') AS date_du,employe.*,contrat.date_embauche,reference.*  FROM salaire 
INNER JOIN contrat ON contrat.id_contrat=salaire.id_contrat
INNER JOIN employe ON employe.id_employe=contrat.id_employe
INNER JOIN reference ON reference.id_reference=employe.id_reference
 WHERE  reference.id_reference='$id' AND DATE_FORMAT(salaire.date_du,'%Y-%m') BETWEEN '$date_du5' AND '$date_au5'
                   ";
		}
		$statement = $db->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();

		$count = 0;
		foreach ($result as $row) {
			$count++;
		?>

			<tr>
				<td><?php echo $count; ?></td>
				<td class="no-export">
					<?php if ($row["photo"] == null) { ?>
						<img src="../img/image/image-profil.png" alt="" width="30" height="30">
					<?php } else { ?>
						<img src="<?php echo $row["photo"]; ?>" alt="" width="30" height="30">
					<?php
					}
					?>
				</td>
				<td style="text-align:center;"><?php echo $row["prenom"]; ?></td>
				<td style="text-align:center;"><?php echo $row["nom"]; ?></td>
				<td style="text-align:center;"><?php echo $row["matricule"]; ?></td>
				<td style="text-align:center;"><?php echo $row["s_categorie"]; ?></td>
				<td style="text-align:center;"><?php echo $row["s_poste_occupe"]; ?></td>
				<td style="text-align:center;"><?php echo $row["telephone_e"]; ?></td>
				<td style="text-align:center;"><?php echo strftime('%B %Y', strtotime($row["date_du"])); ?></td>
				<td style="text-align:center;">
					<?php
					if ($row["date_paiement"] == "0000-00-00") {
						echo "";
					} else {
						echo strftime('%A %d %B %Y', strtotime($row["date_paiement"]));
					}
					?>
				</td>
				<td style="text-align:center;">
					<?php
					echo $row["mode_paie"];
					?>
				</td>
				<td style="text-align:center;">
					<?php if ($row["s_amicale"] == 0.000) {
					} else {
						echo number_format($row["s_amicale"], 0, ",", " ");
					} ?>
				</td>
				<td style="text-align:center;">
					<?php if ($row["s_tabaski"] == 0.000) {
					} else {
						echo number_format($row["s_tabaski"], 0, ",", " ");
					} ?>
				</td>
				<td style="text-align:center;">
					<?php if ($row["s_aute_cotisation"] == 0.000) {
					} else {
						echo number_format($row["s_aute_cotisation"], 0, ",", " ");
					} ?>
				</td>
			</tr>
		<?php } ?>

	</tbody>
	<tfoot>
		<tr>
			<th>Total</th>
			<th class="no-export"></th>
			<th style="min-width:200px;"></th>
			<th style="min-width:100px;"></th>
			<th style="min-width:100px;"></th>
			<th style="min-width:200px;"></th>
			<th style="min-width:200px;"></th>
			<th style="min-width:150px;"></th>
			<th style="min-width:150px;"></th>
			<th style="min-width:200px;"></th>
			<th style="min-width:150px;"></th>
			<th style="min-width:200px;"></th>
			<th style="min-width:200px;"></th>
			<th style="min-width:200px;"></th>
		</tr>
	</tfoot>
</table>
<script>
	$(document).ready(function() {
		$("#example5").DataTable({
			scrollX: true,
			lengthMenu: [
				[10, 25, 50, 250, -1],
				[10, 25, 50, 250, "Tous"]
			],
			layout: {
				topStart: {
					buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
				}
			},
			"language": {

				"sEmptyTable": "Aucune donnée disponible dans le tableau",
				"sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
				"sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
				"sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
				"sInfoPostFix": "",
				"sInfoThousands": ",",
				"sLengthMenu": "Afficher _MENU_ éléments",
				"sLoadingRecords": "Chargement...",
				"sProcessing": "Traitement...",
				"sSearch": "Rechercher :",
				"sZeroRecords": "Aucun élément correspondant trouvé",
				"oPaginate": {
					"sFirst": "Premier",
					"sLast": "Dernier",
					"sNext": "Suivant",
					"sPrevious": "Précédent"
				},
				"oAria": {
					"sSortAscending": ": activer pour trier la colonne par ordre croissant",
					"sSortDescending": ": activer pour trier la colonne par ordre décroissant"
				},
				"select": {
					"rows": {
						"_": "%d lignes sélectionnées",
						"0": "Aucune ligne sélectionnée",
						"1": "1 ligne sélectionnée"
					}
				}
			},
			footerCallback: function(tfoot, data, start, end, display) {
				var api = this.api();
				$(api.column(11).footer()).html(
					api.column(11, {
						page: 'current'
					}).data().reduce(function(a, b) {
						var intVal = function(i) {
							return typeof i === 'string' ?
								i.replace(/\,/g, '.').replace(/[^\d.-]/g, '') * 1 :
								typeof i === 'number' ?
								i : 0;
						};
						return intVal(a) + intVal(b);

					}, 0).toLocaleString("fi-FI", {
						minimumFractionDigits: 0,
						maximumFractionDigits: 0
					})
				);
				$(api.column(12).footer()).html(
					api.column(12, {
						page: 'current'
					}).data().reduce(function(a, b) {
						var intVal = function(i) {
							return typeof i === 'string' ?
								i.replace(/\,/g, '.').replace(/[^\d.-]/g, '') * 1 :
								typeof i === 'number' ?
								i : 0;
						};
						return intVal(a) + intVal(b);

					}, 0).toLocaleString("fi-FI", {
						minimumFractionDigits: 0,
						maximumFractionDigits: 0
					})
				);
				$(api.column(13).footer()).html(
					api.column(13, {
						page: 'current'
					}).data().reduce(function(a, b) {
						var intVal = function(i) {
							return typeof i === 'string' ?
								i.replace(/\,/g, '.').replace(/[^\d.-]/g, '') * 1 :
								typeof i === 'number' ?
								i : 0;
						};
						return intVal(a) + intVal(b);

					}, 0).toLocaleString("fi-FI", {
						minimumFractionDigits: 0,
						maximumFractionDigits: 0
					})
				);
			}
		});

	});
</script>