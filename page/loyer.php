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
				<li class="active_nav active_nav_click" id="button_1">
					<a href="#">
						<span class="icon"><i class="fas fa-file"></i></span>
						<span class="text">Loyer</span>
					</a>
				</li>
				<li class="active_nav_click" id="button_2">
					<a href="#">
						<span class="icon"><i class="fas fa-user"></i></span>
						<span class="text">Locataire</span>
					</a>
				</li>
				<li class="active_nav_click" id="btn-modal-excel">
					<a href="#">
						<span class="icon"><i class="fas fa-file-excel"></i></span>
						<span class="text">Exporter</span>
					</a>
				</li>
			</ul>
		</div>
		<!---------SOUS CONTAINT 1----------->
		<div class="main-sous-content main-sous-content1 active-sous-content active-content">
			<div class="title-page">
				<h1>Loyer</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Loyer</a></li>
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
				<h1>Locataire</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Locataire</a></li>
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
	</div>

	<!---------FIN SOUS CONTAINT 2----------->


	<!------MODAL AJOUT INSCRIPTION-------->
	<form id="insertConge">
		<div class="petit close-modal" id="ajouter-modal">
			<div class="modal-panel-petit  modal-petit-3d">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">AJOUTER Loyer</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box">
									<img src="../img/image/image.jpg" alt="" id="ad_profil_imgPreview">
								</div>
								<div class="content-box">
									<input type="text" name="id_contrat" id="id_contrat" hidden>
									<input type="text" name="id_reference" value="<?php echo $_GET['id']; ?>" hidden>
									<div class="container-form">
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-register">
												<div class="input-group">
													<label class="label-details">Période</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-calendar fa-icon"></i></span>
														<input type="month" class="text-input vider_champ" required="required"
															name="mois" placeholder="Mois" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Date paiement</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-calendar fa-icon"></i></span>
														<input type="date" class="text-input vider_champ" name="date_paiement" placeholder="Adresse" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Montant du loyer</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="montant" id="add_montant" placeholder="Montant" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);" readonly>
														<input type="text" class="text-input vider_champ" name="montant_lettre" id="add_montant_lettre" placeholder="Montant" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);" hidden>
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Etat du loyer</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-signature  fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="etat_loyer" placeholder="Etat du loyer" required="required">
													</div>
												</div>
											</div>
											<div class="footer-modal">
												<button type="submit" class="footer-button-register btn-next-progress11"
													id="">Enregistrer</button>
												<button type="button" class="footer-button-close close-modal">Fermer</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!------FIN MODAL AJOUT INSCRIPTION-------->
	<!------MODAL MODIFIER-------->
	<form id="updateForm">

		<div class="petit close-modal" id="modifier-modal">
			<div class="modal-panel-petit modal-petit-3d">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">MODIFIER Loyer</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box">
									<img src="../img/image/image.jpg" alt="" id="up_profil_imgPreview">
								</div>
								<div class="content-box">
									<div class="container-form">
										<input type="text" name="edit_id" id="edit_id" hidden>
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-register">
												<div class="input-group">
													<label class="label-details">Période</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-calendar fa-icon"></i></span>
														<input type="month" class="text-input vider_champ" required="required"
															name="mois" id="mois" placeholder="Mois" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Date paiement</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-calendar fa-icon"></i></span>
														<input type="date" class="text-input vider_champ" name="date_paiement" id="date_paiement" placeholder="Adresse" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Montant du loyer</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="montant" id="edit_montant" placeholder="Montant" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);" readonly>
														<input type="text" class="text-input vider_champ" name="montant_lettre" id="edit_montant_lettre" placeholder="Montant" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);" hidden>
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Etat du loyer</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-signature  fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="etat_loyer" id="etat_loyer" placeholder="Etat du loyer" required="required">
													</div>
												</div>
											</div>
											<div class="footer-modal">
												<button type="submit" class="footer-button-register btn-next-progress11"
													id="">Modifier</button>
												<button type="button"
													class="footer-button-close close-modal">Fermer</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!------FIN MODAL MODIFIER-------->


	<!------MODAL SUPPRIMER-------->
	<form id="deleteForm">
		<div class="petit close-modal" id="supprimer-modal">
			<div class="modal-panel-petit modal-petit-3d">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">SUPPRIMER loyer</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box">
									<img src="../img/image/image.jpg" alt="" id="del_profil_imgPreview">
								</div>
								<div class="content-box">
									<div class="container-form">
										<input type="hidden" name="delete_id" id="delete_id">
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-login">
												<div class="input-group">
													<label class="label-details">Voulez-vous vraiment supprimer ?</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-trash"></i> </span>
														<input type="text" class="text-input" name="" id="nom_del" readonly>
													</div>
												</div>
											</div>
											<div class="footer-modal">
												<button type="submit" class="footer-button-register btn-next-progress-update2"
													id="inscriptdata">Supprimer</button>
												<button type="button" class="footer-button-close close-modal">Fermer</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!------FIN MODAL SUPPRIMER-------->
	<!------MODAL INFO-------->

	<!------FIN MODAL INFO-------->
	<!--------MODAL INFO GENERAL------->
	<form id="conge">
		<div class="grand close-modal" id="infocessation-modal">
			<div class="modal-panel-grand">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">Loyer</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="corps-modal">
						<div class="container-letter">
							<input type="hidden" name="id_reference" id="get_id_reference">
							<input type="hidden" name="id_lettre_conge_annuel" id="id_lettre_conge_annuel">
							<textarea name="corps_text" class="text-input1 document_cessation" id="document_conge" cols="30"
								rows="10"></textarea>
						</div>
					</div>
					<div class="footer-modal">
						<button type="submit" class="footer-button-register">Enregistrer</button>
						<button type="button" class="footer-button-close close-modal">Fermer</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--------FIN MODAL INFO GENERAL------->


	<!--------FIN MODAL INFO PERSONNEL------->

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
								<button type="submit" class="footer-button-export" id="Exportconge">EXCEL</button>
								<button type="submit" class="footer-button-export" id="ExportdataPdf">PDF</button>
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
									<th>Mois</th>
									<th>Date paiement</th>
									<th>Montant du loyer</th>
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
				url: "../controller/Loyer/fetch_Loyer",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('.content-list1').html("");
					var gp_data = $.parseJSON(response);
					for (var a = 0; a < gp_data.length; a++) {
						var div1 = `
						<div class="parent box result well">
					<div class="card">
					    <div class="date-box">
							<img src="${gp_data[a].photol}" alt="" id="">
						</div>
						<div class="content-box">
							<h1 class="card-title">${gp_data[a].nom_locataire}</h1>
							<div class="card-content">
							   <div class="card-content-info">
									<i class="fa fa-phone fa-rotate-90"></i><span>${gp_data[a].telephonel}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-building"></i><span>${gp_data[a].nom_bien}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-calendar"></i><span>${gp_data[a].mois}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-calendar"></i><span>${gp_data[a].date_paiement}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-money-bill"></i>${gp_data[a].montant}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-sort-numeric-down"></i>${gp_data[a].numero}</span>
								</div>
							</div>
							<ul class="navigation_list">
					           <li class="active_nav_list active_nav_click_list active_nav_click_list_${gp_data[a].id_loyer}" id="updatebtn" data-id="${gp_data[a].id_loyer}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-fw fa-edit"></i></span>
					           		<span class="text">Modifier</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
					           <li class="active_nav_click_list active_nav_click_list_${gp_data[a].id_loyer}" id="deletebtn" data-id="${gp_data[a].id_loyer}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-trash"></i></span>
					           		<span class="text">Supprimer</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
					           <li class="active_nav_click_list active_nav_click_list_${gp_data[a].id_loyer}" id="imprimer" data-id="${gp_data[a].id_loyer}">
					           	<a href="#" target="_blank">
					           		<span class="icon"><i class="fas fa-print"></i></span>
					           		<span class="text">Imprimer</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
							   <li class="active_nav_click_list active_nav_click_list_${gp_data[a].id_loyer} shared-nav" id="sharebtn" data-id="${gp_data[a].id_loyer}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-share-alt"></i></span>
					           		<span class="text">Partager</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
				           </ul>
						</div>
					</div>
				</div>
						`;
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

		function data_contrat() {
			var id = $("#id_reference").val()
			$.ajax({
				url: "../controller/contrat/fetch_contrat",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('.content-list2').html(""); //insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var a = 0; a < gp_data.length; a++) {
						var div2 = `
						<div class="parent box result well">
					<div class="card">
					    <div class="date-box">
							<img src="${gp_data[a].photol}" alt="" id="">
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
									<i class="fa fa-calendar"></i><span>${gp_data[a].date_debut}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-calendar"></i><span>${gp_data[a].date_fin}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-money-bill"></i>${gp_data[a].loyer_estime}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-file-contract"></i>${gp_data[a].etat}</span>
								</div>
							</div>
							<ul class="navigation_list">
					           <li class="active_nav_list" id="servicebtn" data-id="${gp_data[a].id_contrat}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-fw fa-plus"></i></span>
					           		<span class="text">Ajouter</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
				           </ul>
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


		function fetch_data_table() {
			var id = $("#id_reference").val()
			$("#example").dataTable().fnDestroy()
			$.ajax({
				url: "../controller/Loyer/fetch_Loyer",
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
				<td style="text-align:center;">${gp_data[b].mois}</td>
				<td style="text-align:center;">${gp_data[b].date_paiement}</td>
				<td style="text-align:center;">${gp_data[b].montant}</td>
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
				}
			})
		}

		$('document').ready(function() {
			data_contrat()
			fetchdata()
			fetch_data_table()
		})
	</script>
	<script>
		$('#shared-download').on('click', function(e) {
			var id_carte_link = $("#id_carte_link").val();
			navigator.share({
				text: 'Cliquez sur le lien pour télécharger la carte scolaire !', // Text to be shared
				url: "../pdf/download/carte?carte=" + id_carte_link, // URL to be shared
				files: [] // An array of File objects to be shared
			})
		})
		$(document).on('click', '.shared-nav', function(e) {
			e.preventDefault()
			var id = $(this).data('id');
			var link = "../pdf/download?id=" + id
			navigator.share({
				text: 'Cliquez sur le lien pour télécharger le quittance du loyer!', // Text to be shared
				url: link, // URL to be shared
				files: [] // An array of File objects to be shared
			})
		})
		$("#btn-modal-excel").click(function() {
			fetch_data_table();
			$("#exporter-modal").fadeIn();
		});
		$("#infocessation").click(function() {
			$("#get_id_reference").val($("#id_reference").val());
			fetchletter();
			$("#infocessation-modal").fadeIn();
		});
		$("#infoattestation").click(function() {
			$("#attestation-modal").fadeIn();
		});
		$("#infodecision").click(function() {
			$("#decision-modal").fadeIn();
		});
		$("#infotransmission").click(function() {
			$("#transmission-modal").fadeIn();
		});

		$(document).on('click', '#imprimer', function(e) {
			var id = $(this).data('id');
			window.open(`../pdf/quittance?id=${id}`, '_blank');
		})

		$(document).on("click", ".active_nav_click_list", function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			$(".active_nav_click_list_" + id).removeClass("active_nav_list");
			$(this).addClass("active_nav_list");
		})

		$('.js-searchBox').select2({
			width: '100%'
		});

		//PHOTO
		$(document).on("change", "#photo", function() {
			var file = this.files[0];
			console.log(file);
			if (file) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#imgPreview').attr('src', e.target.result);
				}
				reader.readAsDataURL(file);
			}
		})
		$(document).on("change", "#update_photo", function() {
			var file = this.files[0];
			console.log(file);
			if (file) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#update_imgPreview').attr('src', e.target.result);
				}
				reader.readAsDataURL(file);
			}
		})
		$(document).ready(function(e) {
			//INSERTION
			$("#insertConge").on('submit', function(e) {
				e.preventDefault();
				$("#ajouter-modal").fadeOut();

				$.ajax({
					type: 'POST',
					url: '../controller/Loyer/insert',
					data: new FormData(this),
					//dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,
					success: function(response) {

						Swal.fire({
							icon: 'success',
							title: 'Enregistré',
							text: "Enregistrement effectué avec succés.",
							confirmButtonColor: '#127b8e',
							showConfirmButton: false,
							timer: 2000
						}).then(function() {
							fetchdata()
							fetch_data_table()
						});
					}
				});
				$(".vider_champ").val('');
			});
			//UPDATE
			$("#updateForm").on('submit', function(e) {
				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: '../controller/Loyer/update',
					data: new FormData(this),
					//dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,
					success: function(response) {

						console.log(response);
					}
				});
				$("#modifier-modal").fadeOut();
				Swal.fire({
					icon: 'success',
					title: 'Modifié',
					text: "Modification effectuée avec succés.",
					confirmButtonColor: '#127b8e',
					showConfirmButton: false,
					timer: 2000
				}).then(function() {
					fetchdata();
					fetch_data_table()
				});
			});
			// SUPPRIMER
			$("#deleteForm").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '../controller/Loyer/delete',
					data: new FormData(this),
					dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,

					success: function(response) {

						console.log(response);

					}
				});
				$("#supprimer-modal").fadeOut();

				Swal.fire({
					icon: 'error',
					title: 'Supprimé',
					text: "Suppression effectuée avec succés.",
					confirmButtonColor: '#127b8e',
					showConfirmButton: false,
					timer: 2000
				}).then(function() {
					fetchdata();
					fetch_data_table()
				});

			});
			// INSERT LETTER


		})
		//UPDATE LETTER


		// SHOW UPDATE
		$(document).on('click', '#updatebtn', function(e) {

			e.preventDefault();

			var id_loyer = $(this).data('id');
			$.ajax({
				url: "../controller/Loyer/fetch_Loyer",
				type: "post",
				data: {
					id_loyer: id_loyer
				},
				dataType: 'json',
				success: function(data) {
					$("#edit_id").val(data.id_loyer);
					$("#mois").val(data.mois);
					$("#date_paiement").val(data.date_paiement);
					$("#edit_montant").val(data.montant);
					$("#edit_montant_lettre").val(data.montant_lettre);
					$("#etat_loyer").val(data.etat_loyer);
					$("#up_profil_imgPreview").attr("src", data.photol);
					$("#modifier-modal").fadeIn();

				}

			});

		});
		//SHOW DELETE
		$(document).on('click', '#deletebtn', function(e) {

			e.preventDefault();

			var id_loyer = $(this).data('id');
			$.ajax({
				url: "../controller/Loyer/fetch_Loyer",
				type: "post",
				data: {
					id_loyer: id_loyer
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)

					$("#delete_id").val(data.id_loyer);
					$("#nom_del").val(data.mois);
					$("#del_profil_imgPreview").attr("src", data.photol);
					$("#supprimer-modal").fadeIn();

				}

			});

		});

		//SHOW INFO
		//SHOW INSCRIPTION
		$(document).on('click', '#servicebtn', function(e) {
			e.preventDefault();
			var id_contrat = $(this).data('id');
			$.ajax({
				url: '../controller/contrat/fetch_contrat',
				type: "post",
				data: {
					id_contrat: id_contrat
				},
				dataType: 'json',
				success: function(data) {
					console.log(data.logo)
					$("#id_contrat").val(data.id_contrat);
					$("#add_montant").val(data.loyer_estime);
					$("#add_montant_lettre").val(data.loyer_estime_lettre);
					$("#ad_title-name").html(data.nom_locataire);
					$("#ad_title-matricule").html(data.telephonel);
					$("#ad_profil_imgPreview").attr("src", data.photol);
					$("#ajouter-modal").fadeIn();
					checkInputs1();

				}
			});
		});
	</script>
	<script>
		function checkInputs1() {
			var can = false;
			$('').each(function() {
				if ($(this).val() === '') {
					can = true;
				}
			});
			if (can) {
				$('#btn-next-progress1').attr('disabled', 'disabled')
				let c = getComputedStyle(document.getElementById("btn-next-progress1"), null).getPropertyValue(
					'--disabled-form');

				$("#btn-next-progress1").css({
					background: c
				});
				$("#btn-next-progress1").on('mouseenter', function() {
					$("#btn-next-progress1").css({
						background: c
					})
				})
				$("#btn-next-progress1").mouseout(function() {
					$("#btn-next-progress1").css({
						background: c
					})
				})
			} else {
				$('#btn-next-progress1').removeAttr('disabled')
				let c = getComputedStyle(document.getElementById("btn-next-progress1"), null).getPropertyValue('--background-icon', '--background-hover');
				$("#btn-next-progress1").css({
					background: c
				})
				let d = getComputedStyle(document.getElementById("btn-next-progress1"), null).getPropertyValue('--background-hover');

				$("#btn-next-progress1").mouseover(function() {
					$("#btn-next-progress1").css({
						background: d
					})
				})
				$("#btn-next-progress1").mouseout(function() {
					$("#btn-next-progress1").css({
						background: c
					})
				})
			}
		}

		function checkInputsupdate1() {
			var can = false;
			$('.input-required-update1').each(function() {
				if ($(this).val() === '') {
					can = true;
				}
			});
			if (can) {
				$('#btn-next-progress-update1').attr('disabled', 'disabled')
				let c = getComputedStyle(document.getElementById("btn-next-progress-update1"), null).getPropertyValue(
					'--disabled-form');

				$("#btn-next-progress-update1").css({
					background: c
				});
				$("#btn-next-progress-update1").on('mouseenter', function() {
					$("#btn-next-progress-update1").css({
						background: c
					})
				})
				$("#btn-next-progress-update1").mouseout(function() {
					$("#btn-next-progress-update1").css({
						background: c
					})
				})
			} else {
				$('#btn-next-progress-update1').removeAttr('disabled')
				let c = getComputedStyle(document.getElementById("btn-next-progress-update1"), null).getPropertyValue('--background-icon', '--background-hover');
				$("#btn-next-progress-update1").css({
					background: c
				})
				let d = getComputedStyle(document.getElementById("btn-next-progress-update1"), null).getPropertyValue('--background-hover');

				$("#btn-next-progress-update1").mouseover(function() {
					$("#btn-next-progress-update1").css({
						background: d
					})
				})
				$("#btn-next-progress-update1").mouseout(function() {
					$("#btn-next-progress-update1").css({
						background: c
					})
				})
			}
		}
		$(function() {
			checkInputs1();
		})

		//Enable or disable button based on if inputs are filled or not
		$(document).on('input', '', function(e) {
			checkInputs1()
		})
		$(document).on('change', '', function(e) {
			checkInputs1()
		})

		$(document).on('input', '.input-required-update1', function(e) {
			checkInputsupdate1()
		})

		$('#Exportcontrat').click(function() {
			let table = $("#example").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `contrat.xlsx`,
				sheet: {
					name: 'contrat'
				}
			});
		});
		$('#Exportindemnite').click(function() {
			let table = $("#example1").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `Indemnite.xlsx`,
				sheet: {
					name: 'Indemnite'
				}
			});
		});
		$('#ExportdataPdf').click(function() {
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
			doc.save('Loyer')
		})
		$('#Exportconge').click(function() {
			let table = $("#example").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `Loyer.xlsx`,
				sheet: {
					name: 'Loyer'
				}
			});
		});
	</script>
<?php } else {
	header("Location:../");
} ?>