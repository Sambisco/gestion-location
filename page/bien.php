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
	<input type="text" id="id_reference" value="<?php echo $_GET['id']; ?>" hidden>

	<div class="main-content main-content1">
		<!---------SOUS CONTAINT 1----------->
		<div class="content-navigation">
			<ul class="navigation">
				<li class="active_nav active_nav_click" id="button_1">
					<a href="#">
						<span class="icon"><i class="fas fa-building"></i></span>
						<span class="text">Bien</span>
					</a>
				</li>
				<li class="active_nav_click" id="button_2">
					<a href="#">
						<span class="icon"><i class="fas fa-user"></i></span>
						<span class="text">Bailleur</span>
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
		<div class="main-sous-content main-sous-content1 active-sous-content active-content">
			<div class="title-page">
				<h1>Bien</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Bien</a></li>
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
				<h1>Bailleur</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Bailleur</a></li>
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
			<div class="modal-panel-petit modal-petit-3d">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">AJOUTER Bien</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box">
									<img src="../img/image/image.jpg" alt="" id="imgPreview">
									<div class="round">
										<input type="file" name="photo_bien" id="photo" class="file-upload vider_champ">
										<i class="fa fa-camera"></i>
									</div>
								</div>
								<div class="content-box">
									<input type="text" name="id_bailleur" id="id_bailleur" hidden>
									<div class="container-form">
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-register">
												<div class="input-group">
													<label class="label-details">Nom du bien </label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-home fa-icon"></i></span>
														<input type="text" class="text-input vider_champ"
															required="required" name="nom_bien" placeholder="Nom bien"
															onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Adresse</label>
													<div class="input-box">
														<span class="span-left"><i
																class="fa fa-map-marker fa-icon"></i></span>
														<input type="text" class="text-input vider_champ"
															name="adresse_bien" placeholder="Adresse" required="required"
															onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Type de bien</label>
													<div class="input-box">
														<span class="span-left"><i
																class="fa  fa-signature fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="type"
															placeholder="Type de bien" required="required"
															onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Valeur locative</label>
													<div class="input-box">
														<span class="span-left"><i
																class="fa  fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input vider_champ"
															name="valeur_locative" placeholder="Valeur locative"
															required="required">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Commission</label>
													<div class="input-box">
														<span class="span-left"><i
																class="fa  fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="commission"
															placeholder="Commission" required="required">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Destination</label>
													<div class="input-box">
														<span class="span-left"><i
																class="fa  fa-signature fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="destination"
															placeholder="Destination"
															onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Contrat de gestion</label>
													<div class="input-box">
														<span class="span-left"><i
																class="fa fa-signature fa-icon"></i></span>
														<select name="contrat_gestion" class="js-searchBox"
															required="required">
															<option value="">Selectionnez</option>
															<option value="Pré paiement">Pré paiement</option>
															<option value="Post paiement">Post paiement</option>
														</select>
													</div>
												</div>
											</div>
											<div class="footer-modal">
												<button type="submit" class="footer-button-register btn-next-progress11"
													id="">Enregistrer</button>
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

	<!------FIN MODAL AJOUT INSCRIPTION-------->
	<!------MODAL MODIFIER-------->
	<form id="updateForm">

		<div class="petit close-modal" id="modifier-modal">
			<div class="modal-panel-petit modal-petit-3d">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">MODIFIER Bien</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box">
									<img src="../img/image/image.jpg" alt="" id="update_imgPreview">
									<div class="round">
										<input type="file" name="photo_bien" id="update_photo" class="file-upload">
										<i class="fa fa-camera"></i>
									</div>
								</div>
								<div class="content-box">
									<input type="hidden" name="edit_id" id="edit_id">
									<div class="container-form">
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-register">
												<div class="input-group">
													<label class="label-details">Nom du bien </label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-home fa-icon"></i></span>
														<input type="text" class="text-input" required="required"
															name="nom_bien" id="nom_bien" placeholder="Nom bien" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Adresse</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-map-marker fa-icon"></i></span>
														<input type="text" class="text-input" name="adresse_bien" id="adresse_bien" placeholder="Adresse" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Type de bien</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-signature fa-icon"></i></span>
														<input type="text" class="text-input" name="type" id="type" placeholder="Type de bien" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Valeur locative</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input" name="valeur_locative" id="valeur_locative" placeholder="Valeur locative" required="required">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Commission</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input" name="commission" id="commission" placeholder="Commission" required="required">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Destination</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-signature fa-icon"></i></span>
														<input type="text" class="text-input" name="destination" id="destination" placeholder="Destination" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Contrat de gestion</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-signature fa-icon"></i></span>
														<select name="contrat_gestion" id="contrat_gestion" class="js-searchBox"
															required="required">
															<option value="">Selectionnez</option>
															<option value="Pré paiement">Pré paiement</option>
															<option value="Post paiement">Post paiement</option>
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
						<span class="title">SUPPRIMER Bailleur</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box">
									<img src="../img/image/image.jpg" alt="" id="delete_imgPreview">
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
						<span class="title">Bien</span>
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
									<th>Nom bien</th>
									<th>Adresse</th>
									<th>Valeur locative</th>
									<th>Commission</th>
									<th>Contrat de gestion</th>
									<th>Nom bailleur</th>
									<th>Telephone</th>
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
				url: "../controller/bien/fetch_bien",
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
					           <li class="active_nav_list active_nav_click_list active_nav_click_list_${gp_data[a].id_bien}" id="updatebtn" data-id="${gp_data[a].id_bien}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-fw fa-edit"></i></span>
					           		<span class="text">Modifier</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
					           <li class="active_nav_click_list active_nav_click_list_${gp_data[a].id_bien}" id="deletebtn" data-id="${gp_data[a].id_bien}">
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

		function data_bailleur() {
			var id = $("#id_reference").val()
			$.ajax({
				url: "../controller/bailleur/fetch_bailleur",
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
							<img src="${gp_data[a].photob}" alt="" id="">
						</div>
						<div class="content-box">
							<h1 class="card-title">${gp_data[a].nom_bailleur}</h1>
							<div class="card-content">
								<div class="card-content-info">
									<i class="fa fa-map-marker"></i><span>${gp_data[a].adresseb}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-phone fa-rotate-90"></i><span>${gp_data[a].telephoneb}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-envelope"></i><span>${gp_data[a].emailb}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-sort-numeric-down"></i>${gp_data[a].cinb}</span>
								</div>
							</div>
							<ul class="navigation_list">
					           <li class="active_nav_list" id="servicebtn" data-id="${gp_data[a].id_bailleur}">
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

		fetchtb_conge_annuel();

		function fetchtb_conge_annuel() {
			var id = $("#id_reference").val()
			$("#example").dataTable().fnDestroy()
			$.ajax({
				url: "../controller/bien/fetch_bien",
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
				<td style="text-align:center;">${gp_data[b].nom_bien}</td>
				<td style="text-align:center;">${gp_data[b].adresse_bien}</td>
				<td style="text-align:center;">${gp_data[b].valeur_locative}</td>
				<td style="text-align:center;">${gp_data[b].commission}</td>
				<td style="text-align:center;">${gp_data[b].contrat_gestion}</td>
				<td style="text-align:center;">${gp_data[b].nom_bailleur}</td>
				<td style="text-align:center;">${gp_data[b].telephoneb}</td>
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
			data_bailleur()
			fetchdata()
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
			fetchtb_conge_annuel();
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
		$(document).on('click', '.toggle-btn', function(e) {
			var id = $(this).data('id');
			$("#nav_" + id).toggleClass("active");
			$("#toggle-btn-close_" + id).toggleClass("fa-times");
		})
		$(document).on('click', '.fab-button1', function(e) {
			var id = $(this).data('id');
			$("#fab-show1_" + id).toggle("slow");
			$("#fas1_" + id).toggleClass("fa-times");
			$("#fab-show1_" + id).attr(('style', 'display:block'))
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
					url: '../controller/bien/insert',
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
				$(this).find('input:text, input:password, input:file, textarea').val('');
				$(this).find('select').val(null).trigger('change');
				$("#imgPreview").attr("src", "../img/image/image.jpg");
			});
			//UPDATE
			$("#updateForm").on('submit', function(e) {
				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: '../controller/bien/update',
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
				$(this).find('input:text, input:password, input:file, textarea').val('');
				$(this).find('select').val(null).trigger('change');
			});
			// SUPPRIMER
			$("#deleteForm").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '../controller/bien/delete',
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

			var id_bien = $(this).data('id');
			$.ajax({
				url: "../controller/bien/fetch_bien",
				type: "post",
				data: {
					id_bien: id_bien
				},
				dataType: 'json',
				success: function(data) {

					$("#edit_id").val(data.id_bien);
					$("#nom_bien").val(data.nom_bien);
					$("#adresse_bien").val(data.adresse_bien);
					$("#type").val(data.type);
					$("#valeur_locative").val(data.valeur_locative);
					$("#commission").val(data.commission);
					$("#destination").val(data.destination);
					$("#contrat_gestion").val(data.contrat_gestion).trigger("change");
					$(".title-name").html(data.nom_bailleur);
					$(".title-matricule").html(data.telephoneb);
					$(".profil_imgPreview").attr("src", data.photob);
					$("#update_imgPreview").attr("src", data.photo_bien);
					$("#modifier-modal").fadeIn();

				}

			});

		});
		//SHOW DELETE
		$(document).on('click', '#deletebtn', function(e) {

			e.preventDefault();

			var id_bien = $(this).data('id');
			$.ajax({
				url: "../controller/bien/fetch_bien",
				type: "post",
				data: {
					id_bien: id_bien
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)

					$("#delete_id").val(data.id_bien);
					$("#nom_del").val(data.nom_bien);
					$("#delete_imgPreview").attr("src", data.photo_bien);
					$("#supprimer-modal").fadeIn();

				}

			});

		});

		//SHOW INFO
		//SHOW INSCRIPTION
		$(document).on('click', '#servicebtn', function(e) {
			e.preventDefault();
			var id_bailleur = $(this).data('id');
			$.ajax({
				url: '../controller/bailleur/fetch_bailleur',
				type: "post",
				data: {
					id_bailleur: id_bailleur
				},
				dataType: 'json',
				success: function(data) {
					console.log(data.logo)
					$("#id_bailleur").val(data.id_bailleur);
					$("#ad_title-name").html(data.nom_bailleur);
					$("#ad_title-matricule").html(data.telephoneb);
					$("#ad_profil_imgPreview").attr("src", data.photob);
					$("#ajouter-modal").fadeIn();
					checkInputs1();

				}
			});
		});
	</script>
	<script>
		$('#Exportbailleur').click(function() {
			let table = $("#example").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `bailleur.xlsx`,
				sheet: {
					name: 'bailleur'
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
			doc.save('Bien')
		})
		$('#Exportconge').click(function() {
			let table = $("#example").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `Bien.xlsx`,
				sheet: {
					name: 'Bien'
				}
			});
		});
	</script>
<?php } else {
	header("Location:../");
} ?>