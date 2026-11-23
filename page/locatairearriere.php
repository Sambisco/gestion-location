<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['email'])) {
	include("../include/connect.php");

	include("../include/css.php");
	include("../include/script.php");

	//------SIDEBAR--------//
	include("../include/sidebar.php");
	//------HEADER--------//
	include("../include/header.php");
	//------SCRIPT--------//

?>
	<!------MAIN-CONTENT-------->
	<input type="hidden" id="id_reference" value="<?php echo $_GET['id']; ?>">
	<div class="main-content main-content1">
		<div class="content-navigation">
			<ul class="navigation">
				<li class="active_nav active_nav_click" id="btn-modal-excel">
					<a href="#">
						<span class="icon"><i class="fas fa-file-excel"></i></span>
						<span class="text">Exporter</span>
					</a>
				</li>
			</ul>
		</div>
		<!---------SOUS CONTAINT 1----------->
		<div class="main-sous-content main-sous-content1">
			<div class="title-page">
				<h1>Arriérer</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Arriérer</a></li>
				</ol>
			</div>

			<div class="content-list content-list1">

			</div>
			<!----------------PAGINATION----------->
			<div class="pagination">
				<div class="showingInfo" id="showingInfo1"></div>
				<div class="showingPage" id="pagination1"></div>
			</div>

		</div>
		<!---------FIN SOUS CONTAINT 1----------->
		<!---------SOUS CONTAINT 2----------->

		<!---------FIN SOUS CONTAINT 2----------->
		<!---------SOUS CONTAINT 3----------->

		<!---------FIN SOUS CONTAINT 2----------->
	</div>

	<div class="grand close-modal" id="exporter-modal">
		<div class="modal-panel-grand">
			<div class="overlay-inner">
				<div class="modal-close">
					<span class="title">Export</span>
					<div class="btn-close-modal close-modal">
						<i class="fa fa-times-circle"></i>
					</div>
				</div>
				<div class="corps-modal">
					<div class="user-details-register user-details-register-dasboard">
						<div class="input-group">
							<div class="input-box">
								<button type="submit" class="footer-button-export" id="ExportExcel">EXCEL</button>
								<button type="submit" class="footer-button-export" id="ExportPdf">PDF</button>
							</div>
						</div>
					</div>
					<div class="tb_conge_maternite">
						<table id="example" class="stripe hover mytab" style="width:100%;" data-order='[[0,"desc"]]'>
							<thead>
								<tr>
									<th class="no-export">Photo</th>
									<th>Nom locataire</th>
									<th>Telephone</th>
									<th>Nom du bien</th>
									<th>Etat</th>
									<th>Montant du loyer</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
				<div class="footer-modal">
					<button type="button" class="footer-button-close close-modal">Fermer</button>
				</div>
			</div>
		</div>
	</div>

	<!------FOOTER-------->
	<script src="../script/script/script-letter.js"></script>

	<?php
	include("../include/footer.php");
	?>
	<script>
		function fetchdata() {
			var id = $("#id_reference").val()

			$.ajax({
				url: "../controller/bailleurpaiement/fetch_locatairearriere",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('.content-list1').html("");
					var gp_data = $.parseJSON(response);
					for (var a = 0; a < gp_data.length; a++) {
						var checked = gp_data[a].checked;
						var div1 = `
						<div class="parent box result well">
					<div class="card">
						<div class="date-box">
							<img src="${gp_data[a].photol}" alt="">
						</div>
						<div class="content-box">
							<h1 class="card-title">${gp_data[a].nom_locataire}</h1>
							<div class="card-content">
							    <div class="card-content-info">
									<i class="fa fa-phone fa-rotate-90"></i><span>${gp_data[a].telephonel}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-home"></i><span>${gp_data[a].nom_bien}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-map-marker"></i><span>${gp_data[a].adresse_bien}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-calendar"></i><span>${gp_data[a].mois}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-calendar"></i><span>${gp_data[a].date_paiement}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-money-bill"></i>${gp_data[a].montant} (${gp_data[a].arrierecheck} mois)</span>
								</div>
							</div>
							<div class="see-more see-more2">
								<span class="switch">
									<input type="checkbox" disabled ${checked} id="switcher">
									<label for="switcher"></label>
								</span>
							</div>
						</div>
					</div>
				</div>`;
						$('.content-list1').append(div1);
					}
					var flexiblePagination = $('.content-list1').flexiblePagination({
						itemsPerPage: 20,
						itemSelector: 'div.result:visible',
						pagingControlsContainer: '#pagination1',
						showingInfoSelector: '#showingInfo1',
						css: {
							btnNumberingClass: 'btn-primary',
							btnFirstClass: 'btn-primary',
							btnLastClass: 'btn-primary',
							btnNextClass: 'btn-primary',
							btnPreviousClass: 'btn-primary'
						}
					});
					flexiblePagination.getController().onPageClick = function(pageNum, e) {
						console.log('Cliquez sur la Page: ' + pageNum)
					};

					// Direct JS Object method of using the FlexiblePagination
					//        var pager = new Flexible.Pagination();
					//        pager.itemsPerPage = 1;
					//        pager.pagingContainer = '#content';
					//        pager.itemSelector = 'div.result:visible';  //That is, Select and paginate only the filtered visible '.result' div.
					//        pager.pagingControlsContainer = '#pagingControls';
					// 
				}
			})
		}

		function fetch_data_table() {
			var id = $("#id_reference").val()
			$("#example").dataTable().fnDestroy()
			$.ajax({
				url: "../controller/bailleurpaiement/fetch_locatairearriere",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('#example tbody').html(""); //insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var b = 0; b < gp_data.length; b++) {
						$('#example tbody').append(`
			  <tr>
				<td style="text-align:center;" class="no-export"><img src="${gp_data[b].photol}" alt="" width="30" height="30"></td>
				<td style="text-align:center;">${gp_data[b].nom_locataire}</td>
				<td style="text-align:center;">${gp_data[b].telephonel}</td>
				<td style="text-align:center;">${gp_data[b].nom_bien}</td>
				<td style="text-align:center;">${gp_data[b].arriere}</td>
				<td style="text-align:center;">${gp_data[b].montant} * (${gp_data[b].nbr_mois})</span></td>
				<td style="text-align:center;">${gp_data[b].total_percu}</td>
			  </tr>
						`);
					}
					$("#example").DataTable({
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

					});

				},
			})
		}


		$('document').ready(function() {
			fetchdata()
			fetch_data_table()
		})




		$("#btn-modal-export").click(function() {
			$("#exporter-modal").fadeIn();
		});
	</script>
	<script>
		$("#btn-modal-excel").click(function() {
			fetch_data_table();
			$("#exporter-modal").fadeIn();
		});
	</script>
	<script>
		$('#ExportExcel').click(function() {
			let table = $("#example").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `Arrierer.xlsx`,
				sheet: {
					name: 'Arrierer'
				}
			});
		});

		$('#ExportPdf').click(function() {
			let table = $("#example").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			const doc = new jsPDF('l', 'mm')
			doc.autoTable({
				html: table[0],
				styles: {
					overflow: 'linebreak',
					fontSize: 8,
					halign: 'center'
				},
			})
			doc.save('Arrierer')
		})
	</script>
<?php } else {
	header("Location:../");
} ?>