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

	<input type="hidden" id="id_reference" value="<?php echo $_GET['id']; ?>">
	<!------MAIN-CONTENT-------->
	<div class="main-content main-content1">
		<div class="content-navigation">
			<ul class="navigation">
				<li class="active_nav active_nav_click" id="button_1">
					<a href="#">
						<span class="icon"><i class="fas fa-money-bill"></i></span>
						<span class="text">Depense</span>
					</a>
				</li>
				<li class="active_nav_click" id="button_2">
					<a href="#">
						<span class="icon"><i class="fas fa-building"></i></span>
						<span class="text">Bien</span>
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
				<h1>Depense</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Depense</a></li>
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
				<h1>bien</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">bien</a></li>
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
	</div>


	<!------MODAL AJOUT INSCRIPTION-------->
	<form id="insertConge">
		<div class="petit close-modal" id="ajouter-modal">
			<div class="modal-panel-petit  modal-petit-3d">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">AJOUTER Depense</span>
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
									<div class="container-form">
										<input type="text" name="id_bien" id="id_bien" hidden>
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-register">
												<div class="input-group">
													<label class="label-details">Date</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-calendar fa-icon"></i></span>
														<input type="date" class="text-input vider_champ" required="required"
															name="date_depense" placeholder="Nom Depense" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Type de depense</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-signature fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="type_depense" placeholder="Type de depense" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Montant depense</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="montant_depense" placeholder="Montant depense" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Prestataire</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-user fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="prestataire" placeholder="Prestataire" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Telephone</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-phone fa-rotate-90 fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="telephone_prestataire" id=""
															placeholder="Telephone">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Charge</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-list fa-icon"></i></span>
														<select name="charge_depense" id="type_contrat" class="js-searchBox vider_champ"
															required="required">
															<option value="">Selectionnez</option>
															<option value="Propriétaire">Propriétaire</option>
															<option value="Locataire">Locataire</option>
															<option value="Partagé">Partagé</option>
														</select>
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
						<span class="title">MODIFIER Depense</span>
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
									<input type="text" name="edit_id" id="edit_id" hidden>
									<div class="container-form">
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-register">
												<div class="input-group">
													<label class="label-details">Date</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-calendar fa-icon"></i></span>
														<input type="date" class="text-input" required="required"
															name="date_depense" id="date_depense" placeholder="Nom Depense" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Type de depense</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-signature fa-icon"></i></span>
														<input type="text" class="text-input" name="type_depense" id="type_depense" placeholder="Type de depense" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Montant depense</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input" name="montant_depense" id="montant_depense" placeholder="Montant depense" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Prestataire</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-user fa-icon"></i></span>
														<input type="text" class="text-input" name="prestataire" id="prestataire" placeholder="Prestataire" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Telephone</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-phone fa-rotate-90 fa-icon"></i></span>
														<input type="text" class="text-input input-required1" name="telephone_prestataire" id="telephone_prestataire"
															placeholder="Telephone">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Charge</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-list fa-icon"></i></span>
														<select name="charge_depense" id="charge_depense" class="js-searchBox"
															required="required">
															<option value="">Selectionnez</option>
															<option value="Propriétaire">Propriétaire</option>
															<option value="Locataire">Locataire</option>
															<option value="Partagé">Partagé</option>
														</select>
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
						<span class="title">SUPPRIMER Depense</span>
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
						<span class="title">Depense</span>
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
									<th>Date</th>
									<th>Nom bien</th>
									<th>Type depense</th>
									<th>Montant depense</th>
									<th>Prestataire</th>
									<th>Telephone</th>
									<th>Charge</th>
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
				url: "../controller/depense/fetch_depense",
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
							<img src="${gp_data[a].photo_bien}" alt="" id="">
						</div>
						<div class="content-box">
							<h1 class="card-title">${gp_data[a].nom_bien}</h1>
							<div class="card-content">
							<div class="card-content-info">
									<i class="fa fa-user"></i><span>${gp_data[a].prestataire}</span>
								</div>
							<div class="card-content-info">
									<i class="fa fa-phone fa-rotate-90"></i><span>${gp_data[a].telephone_prestataire}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-calendar"></i><span>${gp_data[a].date_depense}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-map-marker"></i><span>${gp_data[a].adresse_bien}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-cogs"></i><span>${gp_data[a].type_depense}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-envelope"></i><span>${gp_data[a].charge_depense}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-money-bill"></i>${gp_data[a].montant_depense}</span>
								</div>
							</div>
							<ul class="navigation_list">
					           <li class="active_nav_list active_nav_click_list active_nav_click_list_${gp_data[a].id_depense}" id="updatebtn" data-id="${gp_data[a].id_depense}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-fw fa-edit"></i></span>
					           		<span class="text">Modifier</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
					           <li class="active_nav_click_list active_nav_click_list_${gp_data[a].id_depense}" id="deletebtn" data-id="${gp_data[a].id_depense}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-trash"></i></span>
					           		<span class="text">Supprimer</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
				           </ul>
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

		function data_bien() {
			var id = $("#id_reference").val()
			$.ajax({
				url: "../controller/bien/fetch_bien",
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
							<img src="${gp_data[a].photo_bien}" alt="" id="">
						</div>
						<div class="content-box">
							<h1 class="card-title">${gp_data[a].nom_bien}</h1>
							<div class="card-content">
							<div class="card-content-info">
									<i class="fa fa-user"></i><span>${gp_data[a].nom_bailleur}</span>
								</div>
							<div class="card-content-info">
									<i class="fa fa-phone fa-rotate-90"></i><span>${gp_data[a].telephoneb}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-map-marker"></i><span>${gp_data[a].adresse_bien}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-envelope"></i><span>${gp_data[a].destination}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-money-bill"></i>${gp_data[a].valeur_locative}</span>
								</div>
							</div>
							<ul class="navigation_list">
					           <li class="active_nav_list" id="servicebtn" data-id="${gp_data[a].id_bien}">
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
				url: "../controller/depense/fetch_depense",
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
				             <td style="text-align:center;" class="no-export"><img src="${gp_data[b].photo_bien}" alt="" width="30" height="30"></td>
				             <td style="text-align:center;">${gp_data[b].date_depense}</td>
				             <td style="text-align:center;">${gp_data[b].nom_bien}</td>
				             <td style="text-align:center;">${gp_data[b].type_depense}</td>
				             <td style="text-align:center;">${gp_data[b].montant_depense}</td>
				             <td style="text-align:center;">${gp_data[b].prestataire}</td>
				             <td style="text-align:center;">${gp_data[b].telephone_prestataire}</td>
				             <td style="text-align:center;">${gp_data[b].charge_depense}</td>
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
			data_bien()
			fetchdata()
			fetch_data_table()
		})




		$("#btn-modal-lettre").click(function() {
			$("#lettre-modal").fadeIn();
		});
		$('document').ready(function() {

			$('#demo').jplist({
				itemsBox: '.list',
				itemPath: '.list-item',
				panelPath: '.jplist-panel'
				//,debug: true
			});
		});
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
			var id = $(this).data('id');
			var link = "../pdf/conge_annuel?pdf=" + id
			navigator.share({
				text: 'Cliquez sur le lien pour télécharger le document du congé annuel!', // Text to be shared
				url: link, // URL to be shared
				files: [] // An array of File objects to be shared
			})
		})
		$("#btn-modal-excel").click(function() {
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
		$(document).on("click", ".active_nav_click_list", function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			$(".active_nav_click_list_" + id).removeClass("active_nav_list");
			$(this).addClass("active_nav_list");
		})
		$(document).on('click', '.partager', function(e) {
			var id = $(this).data('id');
			$("#li-partager_" + id).toggle("slow");
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
					url: '../controller/depense/insert',
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
				$(".vider_champ").val('').trigger("change");
			});
			//UPDATE
			$("#updateForm").on('submit', function(e) {
				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: '../controller/depense/update',
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
					url: '../controller/depense/delete',
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

			var id_depense = $(this).data('id');
			$.ajax({
				url: "../controller/depense/fetch_depense",
				type: "post",
				data: {
					id_depense: id_depense
				},
				dataType: 'json',
				success: function(data) {

					$("#edit_id").val(data.id_depense);
					$("#date_depense").val(data.date_depense);
					$("#type_depense").val(data.type_depense);
					$("#montant_depense").val(data.montant_depense);
					$("#prestataire").val(data.prestataire);
					$("#telephone_prestataire").val(data.telephone_prestataire);
					$("#charge_depense").val(data.charge_depense).trigger("change");
					$("#up_profil_imgPreview").attr("src", data.photo_bien);
					$("#modifier-modal").fadeIn();

				}

			});

		});
		//SHOW DELETE
		$(document).on('click', '#deletebtn', function(e) {

			e.preventDefault();

			var id_depense = $(this).data('id');
			$.ajax({
				url: "../controller/depense/fetch_depense",
				type: "post",
				data: {
					id_depense: id_depense
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)

					$("#delete_id").val(data.id_depense);
					$("#nom_del").val(data.nom_bien);
					$("#del_profil_imgPreview").attr("src", data.photo_bien);
					$("#supprimer-modal").fadeIn();

				}

			});

		});

		//SHOW INFO
		//SHOW INSCRIPTION
		$(document).on('click', '#servicebtn', function(e) {
			e.preventDefault();
			var id_bien = $(this).data('id');
			$.ajax({
				url: '../controller/bien/fetch_bien',
				type: "post",
				data: {
					id_bien: id_bien
				},
				dataType: 'json',
				success: function(data) {
					console.log(data.logo)
					$("#id_bien").val(data.id_bien);
					$("#ad_title-name").html(data.nom_bien);
					$("#ad_title-matricule").html(data.adresse_bien);
					$("#ad_profil_imgPreview").attr("src", data.photo_bien);
					$("#ajouter-modal").fadeIn();
					checkInputs1();

				}
			});
		});
	</script>
	<script>
		$('#Exportbien').click(function() {
			let table = $("#example").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `bien.xlsx`,
				sheet: {
					name: 'bien'
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
			doc.save('Depense')
		})
		$('#Exportconge').click(function() {
			let table = $("#example").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `Depense.xlsx`,
				sheet: {
					name: 'Depense'
				}
			});
		});
	</script>
<?php } else {
	header("Location:../");
} ?>