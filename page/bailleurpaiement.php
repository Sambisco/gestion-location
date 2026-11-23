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

	<div class="fab-container" style="float: right;	position: fixed;bottom: 55%;right: 30px;z-index:900;">

		<div class="input-group mb-3">

			<div class="input-group-append">
				<div class="fab fab-icon-holder fab-button" style="cursor: pointer;">
					<i class="fas fa-file-excel" style="font-size:20px;"></i>
				</div>
				<div class="fab fab-icon-holder fab-hide" style="cursor: pointer;display: none;">
					<i class="fas fa-times" style="font-size:20px;"></i>
				</div>
			</div>
		</div>
		<ul class="fab-options fab-show" style="display: none;">
			<li>
				<span class="fab-label">Post&nbsp;paiement</span>
				<div class="fab-icon-holder" id="btn-modal-export1">
					<i class="fas fa-file-import"></i>
				</div>
			</li>
			<li>
				<span class="fab-label">Pré&nbsp;paiement</span>
				<div class="fab-icon-holder" id="btn-modal-export2">
					<i class="fas fa-file-export"></i>
				</div>
			</li>
		</ul>
	</div>
	<div class="bouton-add-div1">
		<div class="nav nav2">
			<div class="nav-content">
				<div class="toggle-btn toggle-btn1">
					<i class="fas fa-plus toggle-btn-close2"></i>
				</div>
				<div style="--i:1;" class="span span1" id="button_1">
					<a href="#">
						<div class="tooltip">Post&nbsp;paiement</div>
						<div class="icon-circular">
							<i class="fa fa-file-import"></i>
						</div>
					</a>
				</div>
				<div style="--i:2;" class="span span1" id="button_2">
					<a href="#">
						<div class="tooltip">Pré&nbsp;paiement</div>
						<div class="icon-circular">
							<i class="fa fa-file-export"></i>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!------MAIN-CONTENT-------->
	<input type="hidden" id="id_reference" value="<?php echo $_GET['id']; ?>">
	<div class="main-content main-content1">
		<!---------SOUS CONTAINT 1----------->
		<div class="main-sous-content main-sous-content1 active-sous-content active-content">
			<div class="title-page">
				<h1>Post paiement</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Post paiement</a></li>
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
		<div class="main-sous-content main-sous-content2 active-sous-content">
			<div class="title-page">
				<h1>Pré paiement</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Pré paiement</a></li>
				</ol>
			</div>
			<div class="content-list content-list2">

			</div>
			<!----------------PAGINATION----------->
			<div class="pagination">
				<div class="showingInfo" id="showingInfo2"></div>
				<div class="showingPage" id="pagination2"></div>
			</div>
		</div>
		<!---------FIN SOUS CONTAINT 2----------->
		<!---------SOUS CONTAINT 3----------->

		<!---------FIN SOUS CONTAINT 2----------->
	</div>

	<div class="grand close-modal" id="exporter-modal1">
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
								<button type="submit" class="footer-button-export" id="ExportExcel1">EXCEL</button>
								<button type="submit" class="footer-button-export" id="ExportPdf1">PDF</button>
							</div>
						</div>
					</div>
					<div class="tb_conge_maternite">
						<table id="example1" class="stripe hover mytab" style="width:100%;" data-order='[[0,"desc"]]'>
							<thead>
								<tr>
									<th class="no-export">Photo</th>
									<th>Nom bailleur</th>
									<th>Telephone</th>
									<th>Nom du bien</th>
									<th>Etat</th>
									<th>Montant du loyer</th>
									<th>Commission</th>
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
	<div class="grand close-modal" id="exporter-modal2">
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
								<button type="submit" class="footer-button-export" id="ExportExcel2">EXCEL</button>
								<button type="submit" class="footer-button-export" id="ExportPdf2">PDF</button>
							</div>
						</div>
					</div>
					<div class="tb_conge_maternite">
						<table id="example2" class="stripe hover mytab" style="width:100%;" data-order='[[0,"desc"]]'>
							<thead>
								<tr>
									<th class="no-export">Photo</th>
									<th>Nom bailleur</th>
									<th>Telephone</th>
									<th>Nom du bien</th>
									<th>Etat</th>
									<th>Montant du loyer</th>
									<th>Commission</th>
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
		function fecthdatapost() {
			var id = $("#id_reference").val()

			$.ajax({
				url: "../controller/bailleurpaiement/fetch_postpaiement",
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
							<img src="${gp_data[a].photob}" alt="">
						</div>
						<div class="content-box">
							<h1 class="card-title">${gp_data[a].nom_bailleur}</h1>
							<div class="card-content">
							    <div class="card-content-info">
									<i class="fa fa-phone fa-rotate-90"></i><span>${gp_data[a].telephoneb}</span>
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
									<i class="fa fa-calendar"></i>${gp_data[a].date_paiement}</span>
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

		function fetchdatapre() {
			var id = $("#id_reference").val()
			$.ajax({
				url: "../controller/bailleurpaiement/fetch_prepaiement",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('.content-list2').html(""); //insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var a = 0; a < gp_data.length; a++) {
						var checked = gp_data[a].checked;
						var div2 = `
						<div class="parent box result well">
					<div class="card">
						<div class="date-box">
							<img src="${gp_data[a].photob}" alt="">
						</div>
						<div class="content-box">
							<h1 class="card-title">${gp_data[a].nom_bailleur}</h1>
							<div class="card-content">
							    <div class="card-content-info">
									<i class="fa fa-phone fa-rotate-90"></i><span>${gp_data[a].telephoneb}</span>
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
									<i class="fa fa-calendar"></i>${gp_data[a].date_paiement}</span>
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
						$('.content-list2').append(div2);
					}
					var flexiblePagination = $('.content-list2').flexiblePagination({
						itemsPerPage: 20,
						itemSelector: 'div.result:visible',
						pagingControlsContainer: '#pagination2',
						showingInfoSelector: '#showingInfo2',
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



		function fetch_data_table1() {
			var id = $("#id_reference").val()
			$("#example1").dataTable().fnDestroy()
			$.ajax({
				url: "../controller/bailleurpaiement/fetch_postpaiement",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('#example1 tbody').html(""); //insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var b = 0; b < gp_data.length; b++) {
						$('#example1 tbody').append(`
			  <tr>
				<td style="text-align:center;" class="no-export"><img src="${gp_data[b].photob}" alt="" width="30" height="30"></td>
				<td style="text-align:center;">${gp_data[b].nom_bailleur}</td>
				<td style="text-align:center;">${gp_data[b].telephoneb}</td>
				<td style="text-align:center;">${gp_data[b].nom_bien}</td>
				<td style="text-align:center;">${gp_data[b].arriere}</td>
				<td style="text-align:center;">${gp_data[b].montant} * (${gp_data[b].nbr_mois})</span></td>
				<td style="text-align:center;">${gp_data[b].commission}  * (${gp_data[b].nbr_mois})</td>
				<td style="text-align:center;">${gp_data[b].total_percu}</td>
			  </tr>
						`);
					}
					$("#example1").DataTable({
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

		function fetch_data_table2() {
			var id = $("#id_reference").val()
			$("#example2").dataTable().fnDestroy()
			$.ajax({
				url: "../controller/bailleurpaiement/fetch_prepaiement",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('#example2 tbody').html(""); //insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var b = 0; b < gp_data.length; b++) {
						$('#example2 tbody').append(`
			  <tr>
				<td style="text-align:center;" class="no-export"><img src="${gp_data[b].photob}" alt="" width="30" height="30"></td>
				<td style="text-align:center;">${gp_data[b].nom_bailleur}</td>
				<td style="text-align:center;">${gp_data[b].telephoneb}</td>
				<td style="text-align:center;">${gp_data[b].nom_bien}</td>
				<td style="text-align:center;">${gp_data[b].arriere}</td>
				<td style="text-align:center;">${gp_data[b].montant} * (${gp_data[b].nbr_mois})</span></td>
				<td style="text-align:center;">${gp_data[b].commission}  * (${gp_data[b].nbr_mois})</td>
				<td style="text-align:center;">${gp_data[b].total_percu}</td>
			  </tr>
						`);
					}
					$("#example2").DataTable({
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
			fetchdatapre()
			fecthdatapost()
			fetch_data_table1()
			fetch_data_table2()
		})




		$("#btn-modal-export1").click(function() {
			$("#exporter-modal1").fadeIn();
		});
		$("#btn-modal-export2").click(function() {
			$("#exporter-modal2").fadeIn();
		});
	</script>
	<script>
		$('.fab-button').on('click', function() {
			$(".fab-show").show(600);
			$(".fab-hide").show();
			$(".fab-button").hide();
		})
		$('.fab-hide').on('click', function() {
			$(".fab-button").show();

			$(".fab-show").hide(600);
			$(".fab-hide").hide();
		})
		$("#btn-modal-excel").click(function() {
			fetch_data_table();
			$("#exporter-modal").fadeIn();
		});
	</script>
	<script>
		$('#ExportExcel1').click(function() {
			let table = $("#example1").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `Post-paiement.xlsx`,
				sheet: {
					name: 'Post-paiement'
				}
			});
		});
		$('#ExportExcel2').click(function() {
			let table = $("#example2").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `Pre-paiement.xlsx`,
				sheet: {
					name: 'Pre-paiement'
				}
			});
		});
		$('#ExportPdf1').click(function() {
			let table = $("#example1").clone();
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
			doc.save('Post-paiement')
		})
		$('#ExportPdf2').click(function() {
			let table = $("#example2").clone();
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
			doc.save('Pre-paiement')
		})
	</script>
<?php } else {
	header("Location:../");
} ?>