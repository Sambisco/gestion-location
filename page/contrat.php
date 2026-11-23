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
				<li class="active_nav active_nav_click" id="btn-modal-ajouter">
					<a href="#">
						<span class="icon"><i class="fas fa-fw fa-plus"></i></span>
						<span class="text">Ajouter</span>
					</a>
				</li>
				<li class="active_nav_click" id="button_1">
					<a href="#">
						<span class="icon"><i class="fas fa-signature"></i></span>
						<span class="text">Contrat</span>
					</a>
				</li>
				<li class="active_nav_click" id="button_2">
					<a href="#">
						<span class="icon"><i class="fas fa-building"></i></span>
						<span class="text">Bien</span>
					</a>
				</li>
				<li class="active_nav_click" id="button_3">
					<a href="#">
						<span class="icon"><i class="fas fa-users"></i></span>
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
				<h1>Contrat</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Contrat</a></li>
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
				<h1>Bien</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Bien</a></li>
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
		<div class="main-sous-content main-sous-content3 active-sous-content">
			<div class="title-page">
				<h1>Locataire</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Locataire</a></li>
				</ol>
			</div>
			<div class="content-list content-list3">

			</div>
			<!----------------PAGINATION----------->
			<div class="pagination">
				<div class="showingInfo" id="showingInfo3"></div>
				<div class="showingPage" id="pagination3"></div>
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
						<span class="title">AJOUTER contrat</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box date-box1">
									<img src="../img/image/image-profil.jpg" alt="" id="ad_profil_locataire">
									<img src="../img/image/image.jpg" alt="" id="ad_profil_bien">
								</div>
								<div class="content-box">
									<div class="container-form">
										<input type="text" name="id_locataire" id="add_id_locataire" hidden>
										<input type="text" name="id_bien" id="add_id_bien" hidden>
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-register">
												<div class="input-group">
													<label class="label-details">Date debut</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-calendar fa-icon"></i></span>
														<input type="date" class="text-input vider_champ" required="required"
															name="date_debut" placeholder="Date debut" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Date fin</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-calendar fa-icon"></i></span>
														<input type="date" class="text-input vider_champ" required="required"
															name="date_fin" placeholder="Date fin" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Montant du loyer</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input vider_champ" name="loyer_estime" id="loyer_estime" placeholder="Montant du loyer" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
														<input type="text" name="loyer_estime_lettre" class="vider_champ" id="loyer_estime_lettre" hidden>
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Type de contrat</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-signature fa-icon"></i></span>
														<select name="type_contrat" class="js-searchBox vider_champ"
															required="required">
															<option value="">Selectionnez</option>
															<option value="Determiné">Déterminé</option>
															<option value="Indéterminé">Indéterminé</option>
														</select>
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Etat</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-list fa-icon"></i></span>
														<select name="etat" class="js-searchBox vider_champ"
															required="required">
															<option value="">Selectionnez</option>
															<option value="Actif">Actif</option>
															<option value="Terminé">Terminé</option>
															<option value="Résilié">Résilié</option>
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
						<span class="title">Modifier contrat</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box date-box1">
									<img src="../img/image/image-profil.jpg" alt="" id="edit_profil_locataire">
									<img src="../img/image/image.jpg" alt="" id="edit_profil_bien">
								</div>
								<div class="content-box">
									<div class="container-form">
										<input type="text" name="edit_id" id="edit_id" hidden>
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-register">
												<div class="input-group">
													<label class="label-details">Date debut</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-calendar fa-icon"></i></span>
														<input type="date" class="text-input" required="required"
															name="date_debut" id="date_debut" placeholder="Date debut" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Date fin</label>
													<div class="input-box">
														<span class="span-left"><i class="fa  fa-calendar fa-icon"></i></span>
														<input type="date" class="text-input" required="required"
															name="date_fin" id="date_fin" placeholder="Date fin" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Montant du loyer</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-sort-numeric-down fa-icon"></i></span>
														<input type="text" class="text-input" name="loyer_estime" id="edit_loyer_estime" placeholder="Montant du loyer" required="required" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
														<input type="text" name="loyer_estime_lettre" id="edit_loyer_estime_lettre" hidden>
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Type de contrat</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-signature fa-icon"></i></span>
														<select name="type_contrat" id="type_contrat" class="js-searchBox"
															required="required">
															<option value="">Selectionnez</option>
															<option value="Determiné">Déterminé</option>
															<option value="Indéterminé">Indéterminé</option>
														</select>
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Etat</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-list fa-icon"></i></span>
														<select name="etat" id="etat" class="js-searchBox"
															required="required">
															<option value="">Selectionnez</option>
															<option value="Actif">Actif</option>
															<option value="Terminé">Terminé</option>
															<option value="Résilié">Résilié</option>
														</select>
													</div>
												</div>
											</div>
											<div class="footer-modal">
												<button type="submit" class="footer-button-register btn-next-progress11"
													id="">Modifier</button>
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

	<!------FIN MODAL MODIFIER-------->


	<!------MODAL SUPPRIMER-------->

	<form id="deleteForm">
		<div class="petit close-modal" id="supprimer-modal">
			<div class="modal-panel-petit modal-petit-3d">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">SUPPRIMER contrat</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box">
									<img src="../img/image/image-profil.jpg" alt="" id="delete_imgPreview">
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
									<th>Date début</th>
									<th>Date fin</th>
									<th>Montant du loyer</th>
									<th>Type de contrat</th>
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
				url: "../controller/contrat/fetch_contrat",
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
					           <li class="active_nav_list active_nav_click_list active_nav_click_list_${gp_data[a].id_contrat}" id="updatebtn" data-id="${gp_data[a].id_contrat}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-fw fa-edit"></i></span>
					           		<span class="text">Modifier</span>
									<span class="lampe"></span>
					           	</a>
					           </li>
					           <li class="active_nav_click_list active_nav_click_list_${gp_data[a].id_contrat}" id="deletebtn" data-id="${gp_data[a].id_contrat}">
					           	<a href="#">
					           		<span class="icon"><i class="fas fa-trash"></i></span>
					           		<span class="text">Supprimer</span>
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
						var checked = gp_data[a].checked;
						var check_add_bien = gp_data[a].check_add_bien
						var div2 = `
						<div class="parent box result well">
					<div class="card">
						<div class="date-box">
							<img src="${gp_data[a].photo_bien}" alt="" id="img-bien_${gp_data[a].id_bien}">
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
									<i class="fa fa-money-bill"></i><div id="valeur_${gp_data[a].id_bien}">${gp_data[a].valeur_locative}</div></span>
								</div>
							</div>
							<div class="see-more">
								<span class="switch">
									<input type="checkbox" ${checked} class="${check_add_bien}" id="" data-id="${gp_data[a].id_bien}">
									<label for=""></label>
								</span>
							</div>
						</div>
					</div>
				</div>
						`;
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

		function data_locataire() {
			var id = $("#id_reference").val()
			$.ajax({
				url: "../controller/locataire/fetch_locataire",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('.content-list3').html(""); //insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var a = 0; a < gp_data.length; a++) {
						var div3 = `
						<div class="parent box result well">
					<div class="card">
					    <div class="date-box">
							<img src="${gp_data[a].photol}" alt="" id="img-locataire_${gp_data[a].id_locataire}">
						</div>
						<div class="content-box">
							<h1 class="card-title">${gp_data[a].nom_locataire}</h1>
							<div class="card-content">
								<div class="card-content-info">
									<i class="fa fa-map-marker"></i><span>${gp_data[a].adressel}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-phone fa-rotate-90"></i><span>${gp_data[a].telephonel}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-envelope"></i><span>${gp_data[a].emaill}</span>
								</div>
								<div class="card-content-info">
									<i class="fa fa-sort-numeric-down"></i>${gp_data[a].cinl}</span>
								</div>
							</div>
							<div class="see-more see-more1">
								<span class="switch">
									<input type="checkbox"  class="check-add-locataire check-add-locataire_${gp_data[a].id_locataire}" id="switcher" data-id="${gp_data[a].id_locataire}">
									<label for="switcher"></label>
								</span>
							</div>
						</div>
					</div>
				</div>`;
						$('.content-list3').append(div3);
					}
					var flexiblePagination = $('.content-list3').flexiblePagination({
						itemsPerPage: 20,
						itemSelector: 'div.result:visible',
						pagingControlsContainer: '#pagination3',
						showingInfoSelector: '#showingInfo3',
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
				url: "../controller/contrat/fetch_contrat",
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
				<td style="text-align:center;">${gp_data[b].date_debut}</td>
				<td style="text-align:center;">${gp_data[b].date_fin}</td>
				<td style="text-align:center;">${gp_data[b].loyer_estime}</td>
				<td style="text-align:center;">${gp_data[b].type_contrat}</td>
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
			data_locataire()
			fetch_data_table()
		})




		$("#btn-modal-lettre").click(function() {
			$("#lettre-modal").fadeIn();
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
			fetch_data_table();
			$("#exporter-modal").fadeIn();
		});
		$("#btn-modal-ajouter").click(function() {
			if ($("#add_id_locataire").val() == "") {
				Swal.fire({
					icon: 'error',
					title: 'Locataire',
					text: "Veillez choisir un locataire.",
					confirmButtonColor: '#127b8e',
					showConfirmButton: false,
					timer: 4000
				})
			} else if ($("#add_id_bien").val() == "") {
				Swal.fire({
					icon: 'error',
					title: 'Bien',
					text: "Veillez choisir un bien.",
					confirmButtonColor: '#127b8e',
					showConfirmButton: false,
					timer: 4000
				})
			} else {
				$("#ajouter-modal").fadeIn();
			}
		});
		$(document).on('input', '#loyer_estime', function(e) {
			var options_sn = {
				lang: "fr",
				digitsLengthW2F: 3,
				decimalSeperator: "virgule"
			}
			var contrat16 = $('#loyer_estime').val();
			var sum2 = contrat16.toString().replace(/\,/g, '.');
			var salaire_lettre = sum2.replace(/\s+/g, '');
			if ($('#loyer_estime').val() == "") {
				$("#loyer_estime_lettre").val("")
			} else {
				$("#loyer_estime_lettre").val($.spellingNumber(salaire_lettre, options_sn));
			}
		})
		$(document).on('input', '#edit_loyer_estime', function(e) {
			var options_sn = {
				lang: "fr",
				digitsLengthW2F: 3,
				decimalSeperator: "virgule"
			}
			var contrat16 = $('#edit_loyer_estime').val();
			var sum2 = contrat16.toString().replace(/\,/g, '.');
			var salaire_lettre = sum2.replace(/\s+/g, '');
			if ($('#edit_loyer_estime').val() == "") {
				$("#edit_loyer_estime_lettre").val("")
			} else {
				$("#edit_loyer_estime_lettre").val($.spellingNumber(salaire_lettre, options_sn));
			}
		})
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
					url: '../controller/contrat/insert',
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
							data_bien()
						});


					}
				});
				$("#add_id_locataire").val("")
				$("#add_id_bien").val("")
				$(".vider_champ").val('');
				$(".vider_champ").val('').trigger("change");
				$('.check-add-locataire').prop('checked', false);
			});
			//UPDATE
			$("#updateForm").on('submit', function(e) {
				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: '../controller/contrat/update',
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
					data_bien()
				});
			});
			// SUPPRIMER
			$("#deleteForm").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '../controller/contrat/delete',
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
					data_bien()
				});

			});
			// INSERT LETTER

			$("#conge").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '../controller/conge_annuel/insert_letter',
					data: new FormData(this),
					//dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,
					success: function(response) {
						fetchletter()
					}
				});
				$("#infocessation-modal").fadeOut();

				Swal.fire({
					icon: 'success',
					title: 'Enregistré',
					text: "Enregistrement effectué avec succés.",
					confirmButtonColor: '#127b8e',
					showConfirmButton: false,
					timer: 2000
				}).then(function() {

					fetchletter();
				});

			});
		})
		//UPDATE LETTER


		// SHOW UPDATE
		$(document).on('click', '#updatebtn', function(e) {

			e.preventDefault();

			var id_contrat = $(this).data('id');
			$.ajax({
				url: "../controller/contrat/fetch_contrat",
				type: "post",
				data: {
					id_contrat: id_contrat
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)
					$("#edit_id").val(data.id_contrat);
					$('#date_debut').val(data.date_debut);
					$('#date_fin').val(data.date_fin);
					$('#edit_loyer_estime').val(data.loyer_estime);
					$('#edit_loyer_estime_lettre').val(data.loyer_estime_lettre);
					$('#type_contrat').val(data.type_contrat).trigger("change");
					$('#etat').val(data.etat).trigger("change");
					$("#edit_profil_locataire").attr("src", data.photol);
					$("#edit_profil_bien").attr("src", data.photo_bien);
					$("#modifier-modal").fadeIn();

				}

			});

		});
		//SHOW DELETE
		$(document).on('click', '#deletebtn', function(e) {

			e.preventDefault();

			var id_contrat = $(this).data('id');
			$.ajax({
				url: "../controller/contrat/fetch_contrat",
				type: "post",
				data: {
					id_contrat: id_contrat
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)

					$("#delete_id").val(data.id_contrat);
					$("#nom_del").val(data.type_contrat);
					$("#delete_imgPreview").attr("src", data.photol);
					$("#supprimer-modal").fadeIn();

				}

			});

		});

		//SHOW INFO
		//SHOW INSCRIPTION
		$(document).on('change', '.check-add-bien', function(e) {
			var id_bien = $(this).data('id');
			var $checks = $('.check-add-bien_' + id_bien);
			var image = $("#img-bien_" + id_bien).attr('src');
			var valeur = $("#valeur_" + id_bien).text();
			var options_sn = {
				lang: "fr",
				digitsLengthW2F: 3,
				decimalSeperator: "virgule"
			}
			var sum2 = valeur.toString().replace(/\,/g, '.');
			var salaire_lettre = sum2.replace(/\s+/g, '');
			if ($checks.is(':checked')) {
				$('#add_id_bien').val(id_bien);
				$('#loyer_estime').val(valeur);
				$("#loyer_estime_lettre").val($.spellingNumber(salaire_lettre, options_sn));
				$("#ad_profil_bien").attr("src", image);
				$('.check-add-bien').prop('checked', false);
				$('.check-add-bien_' + id_bien).prop('checked', true);
			} else {
				$('#add_id_bien').val("");
				$('#loyer_estime').val("");
				$("#loyer_estime_lettre").val("");
				$("#ad_profil_bien").attr("src", "../img/image/image.jpg");
			}
		})
		$(document).on('change', '.check-add-locataire', function(e) {
			var id_locataire = $(this).data('id');
			var $checks = $('.check-add-locataire_' + id_locataire);
			var image = $("#img-locataire_" + id_locataire).attr('src');

			if ($checks.is(':checked')) {
				$('#add_id_locataire').val(id_locataire);
				$("#ad_profil_locataire").attr("src", image);
				$('.check-add-locataire').prop('checked', false);
				$('.check-add-locataire_' + id_locataire).prop('checked', true);
			} else {
				$('#add_id_locataire').val("");
				$("#ad_profil_locataire").attr("src", "../img/image/image-profil.png");
			}
		})
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
			doc.save('contrat')
		})
		$('#Exportconge').click(function() {
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
	</script>
<?php } else {
	header("Location:../");
} ?>