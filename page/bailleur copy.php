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
	$timezone = "UTC";
	date_default_timezone_set($timezone);
	setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');
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
				<span class="fab-label">Importer</span>
				<div class="fab-icon-holder" id="btn-modal-importer">
					<i class="fas fa-file-import"></i>
				</div>
			</li>
			<li>
				<span class="fab-label">Exporter</span>
				<div class="fab-icon-holder" id="infocomplete">
					<i class="fas fa-file-export"></i>
				</div>
			</li>

			<li style="display:none">
				<span class="fab-label">PDF</span>
				<div class="fab-icon-holder" id="modclient">
					<a href="../pdf/all-employe" target="_blank">
						<i class="fas fa-file-export"></i>
					</a>
				</div>
			</li>

		</ul>
	</div>
	<!------MAIN-CONTENT-------->

	<div class="bouton-add-div">
		<div class="tooltip-add">Ajouter</div>
		<button type="button" class="boutton-petit-modal petit-modal" id="btn-modal-ajouter"><i
				class="fas fa-plus"></i></button>
	</div>
	<div class="main-content">
		<div class="main-sous-content main-sous-content1">
			<div class="title-page">
				<h1>Bailleur</h1>
				<ol>
					<li><a href="#">Accueil</a></li>/
					<li><a href="#">Bailleur</a></li>
				</ol>
			</div>
			<input type="hidden" id="id_reference" value="<?php echo $_GET['id']; ?>">

			<div class="content-list content-list1">

			</div>
			<!----------------PAGINATION----------->
			<div class="pagination">
				<div class="showingInfo" id="showingInfo"></div>
				<div class="showingPage" id="pagination"></div>
			</div>
		</div>
	</div>

	<!------MODAL AJOUT-------->
	<form id="insertForm">
		<div class="petit close-modal" id="ajouter-modal">
			<div class="modal-panel-petit">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">AJOUTER Bailleur</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="corps-modal">
						<input type="text" name="id_reference" id="get_id_reference" hidden>

						<div class="container-form">
							<div class="upload">
								<img src="../img/image/image-profil.png" alt="" id="imgPreview">
								<div class="round">
									<input type="file" name="photob" id="photo" class="file-upload vider_champ">
									<i class="fa fa-camera"></i>
								</div>
							</div>

							<div class="nextstep nextstep-active">
								<div class="user-details-register">
									<div class="input-group">
										<label class="label-details">Nom bailleur</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-user fa-icon"></i></span>
											<input type="text" class="text-input etablissement input-required1"
												name="nom_bailleur" id="" placeholder="Nom bailleur">
										</div>
									</div>
									<div class="input-group">
										<label class="label-details">Adresse</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-map-marker fa-icon"></i></span>
											<input type="text" class="text-input input-required1" name="adresseb" id=""
												required="required" placeholder="Adresse" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
										</div>
									</div>
									<div class="input-group">
										<label class="label-details">Telephone</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-phone fa-rotate-90 fa-icon"></i></span>
											<input type="text" class="text-input input-required1" name="telephoneb" id=""
												placeholder="Telephone">
										</div>
									</div>
									<div class="input-group">
										<label class="label-details">Email</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-envelope fa-icon"></i></span>
											<input type="text" class="text-input input-required1" name="emailb"
												placeholder="Email">
										</div>
									</div>

									<div class="input-group">
										<label class="label-details">N° carte d'identite</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-sort-numeric-down fa-icon"></i></span>
											<input type="text" class="text-input etablissement input-required1" name="cinb"
												placeholder="N° carte d'identite">
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
	</form>

	<!------FIN MODAL AJOUT-------->
	<!------MODAL MODIFIER-------->
	<form id="updateForm">

		<div class="petit close-modal" id="modifier-modal">
			<div class="modal-panel-petit">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">MODIFIER Bailleur</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="corps-modal">
						<div class="container-form">
							<input type="hidden" name="edit_id" id="edit_id" hidden>
							<div class="upload">
								<img src="../img/image/image-profil.png" alt="" id="update_imgPreview">
								<div class="round">
									<input type="file" name="photob" id="update_photo" class="file-upload">
									<i class="fa fa-camera"></i>
								</div>
							</div>

							<div class="nextstep-update nextstep-active-update">
								<div class="user-details-register">
									<div class="input-group">
										<label class="label-details">Nom bailleur</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-user fa-icon"></i></span>
											<input type="text" class="text-input etablissement input-required1"
												name="nom_bailleur" id="nom_bailleur" placeholder="Nom bailleur">
										</div>
									</div>
									<div class="input-group">
										<label class="label-details">Adresse</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-map-marker fa-icon"></i></span>
											<input type="text" class="text-input input-required1" name="adresseb"
												id="adresseb" required="required" placeholder="Adresse" onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
										</div>
									</div>
									<div class="input-group">
										<label class="label-details">Telephone</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-phone fa-rotate-90 fa-icon"></i></span>
											<input type="text" class="text-input input-required1" name="telephoneb"
												id="telephoneb" placeholder="Telephone">
										</div>
									</div>
									<div class="input-group">
										<label class="label-details">Email</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-envelope fa-icon"></i></span>
											<input type="text" class="text-input input-required1" name="emailb" id="emailb"
												placeholder="Email">
										</div>
									</div>

									<div class="input-group">
										<label class="label-details">N° carte d'identite</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-sort-numeric-down fa-icon"></i></span>
											<input type="text" class="text-input etablissement input-required1" name="cinb"
												id="cinb" placeholder="N° carte d'identite">
										</div>
									</div>
								</div>
								<div class="footer-modal">
									<button type="submit" class="footer-button-register btn-next-progress-update2"
										id="inscriptdata">Modifier</button>
									<button type="button" class="footer-button-close close-modal">Fermer</button>
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
	<div class="petit close-modal" id="supprimer-modal">
		<div class="modal-panel-petit">
			<div class="overlay-inner">
				<div class="modal-close">
					<span class="title">SUPPRIMER Bailleur</span>
					<div class="btn-close-modal close-modal">
						<i class="fa fa-times-circle"></i>
					</div>
				</div>
				<div class="corps-modal">
					<div class="container-form">
						<form id="deleteForm">
							<input type="hidden" name="delete_id" id="delete_id">
							<div class="upload">
								<img src="../img/image/image-profil.png" alt="" id="delete_imgPreview">
							</div>
							<div class="user-details-login">
								<div class="input-group">
									<label class="label-details">Voulez-vous vraiment supprimer ?</label>
									<div class="input-box">
										<span class="span-left"><i class="fa fa-trash"></i> </span>
										<input type="text" class="text-input" name="" id="nom_del" readonly>
									</div>
								</div>
							</div>
					</div>
				</div>
				<div class="footer-modal">
					<button type="submit" class="footer-button-register" id="deletedata">Supprimer</button>
					<button type="button" class="footer-button-close close-modal">Fermer</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!------FIN MODAL SUPPRIMER-------->
	<!------MODAL INFO-------->

	<!------FIN MODAL INFO-------->
	<!------MODAL IMPORTER-------->
	<div class="grand close-modal" id="importer-modal">
		<div class="modal-panel-grand">
			<div class="overlay-inner">
				<div class="modal-close">
					<span class="title">Importer Bailleur</span>
					<div class="btn-close-modal close-modal">
						<i class="fa fa-times-circle"></i>
					</div>
				</div>

				<div class="corps-modal">
					<div class="upload-wrapper">
						<form id="importForm" enctype="multipart/form-data">
							<input type="file" class="file-input" name="file-import" id="fileupload" hidden>
							<div class="form-importer">
								<i class="fas fa-cloud-upload-alt"></i>
								<p>Télécharger un fichier Excel <span id="message_show"
										style="color:red; display:none;">(requis *)</span></p>
							</div>
						</form>
						<section class="progress-area"></section>
						<section class="uploaded-area"></section>
						<form id="saveImport">
							<div style="overflow: auto; height:500px;">
								<input type="text" name="id_reference" id="get_id_reference_import"
									value="<?php echo $_GET["id"] ?>" hidden>

								<table id="tblItems" class="mytab1">
									<thead>
										<tr>
											<th>Nom bailleur</th>
											<th>Adresse</th>
											<th>Telephone</th>
											<th>Email</th>
											<th>N° carte d'identite</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
					</div>
				</div>
				<div class="footer-modal">
					<button type="submit" class="footer-button-register" id="importdata">Enregistrer</button>
					<button type="button" class="footer-button-close close-modal" id="vider_import">Fermer</button>
				</div>
			</div>
		</div>
	</div>
	</form>

	<!------FIN MODAL IMPORTER-------->
	<!--------MODAL INFO GENERAL------->
	<div class="grand close-modal" id="infocomplet-modal">
		<div class="modal-panel-grand">
			<div class="overlay-inner">
				<div class="modal-close">
					<span class="title">Information complete Bailleur</span>
					<div class="btn-close-modal close-modal">
						<i class="fa fa-times-circle"></i>
					</div>
				</div>
				<div class="corps-modal">
					<div class="user-details-register user-details-register-dasboard">
						<div class="input-group">
							<div class="input-box">
								<button type="submit" class="footer-button-export" id="Exportdata">EXCEL</button>
								<button type="submit" class="footer-button-export" id="ExportdataPdf">PDF</button>
							</div>
						</div>
					</div>
					<div class="tb_employe">
						<table id="example" class="stripe hover mytab" style="width:100%;" data-order='[[0,"desc"]]'>
							<thead>
								<tr>
									<th class="no-export">Photo</th>
									<th>Nom bailleur</th>
									<th>Adresse</th>
									<th>Telephone</th>
									<th>Email</th>
									<th>N° carte d'identite</th>
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

	<!--------FIN MODAL INFO GENERAL------->
	<!------FOOTER-------->
	<?php
	include("../include/footer.php");
	?>
	<script>
		$('document').ready(function() {
			fetchdata()
		})

		function fetchdata() {
			var id = $("#id_reference").val()
			$.ajax({
				url: "../controller/bailleur/fetch_bailleur",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('.content-list1').html(""); //insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var a = 0; a < gp_data.length; a++) {
						var div1 = `<div class="col-list box result well">
	<div class="col-list-card">
		<img src="${gp_data[a].photob}" alt="">
		
		<div class="col-list-card-info">
			<h3>${gp_data[a].nom_bailleur}</h3>
			<h1><small>${gp_data[a].adresseb}</small></h1>
		</div>
		<div class="col-list-card-ord">
			<h4>${gp_data[a].emailb}</h4>
			<h2>${gp_data[a].telephoneb}</h2>
		</div>
	</div>
	<div class="nav" id="nav_${gp_data[a].id_bailleur}">
		<div class="nav-content">
			<div class="toggle-btn" id="toggle-btn_${gp_data[a].id_bailleur}"
				data-id="${gp_data[a].id_bailleur}">
				<i class="fas fa-cog toggle-btn-close"
					id="toggle-btn-close_${gp_data[a].id_bailleur}"></i>
			</div>
			<div style="--i:1;" class="span"><a href="#">
					<div class="tooltip">Modification</div>
					<div class="icon-circular" id="updatebtn"
						data-id="${gp_data[a].id_bailleur}"><i class="fas fa-edit"></i>
					</div>
				</a></div>
			<div style="--i:3;" class="span"><a href="#">
					<div class="tooltip">Suppression</div>
					<div class="icon-circular" id="deletebtn"
						data-id="${gp_data[a].id_bailleur}"><i class="fas fa-trash"></i>
					</div>
				</a></div>
		</div>
	</div>
</div>`;
						$('.content-list1').append(div1);
					}
					var flexiblePagination = $('.content-list1').flexiblePagination({
						itemsPerPage: 20,
						itemSelector: 'div.result:visible',
						pagingControlsContainer: '#pagination',
						showingInfoSelector: '#showingInfo',
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
					//        pager.showCurrentPage();
				},
			})
		}
		fetch_data_table()

		function fetch_data_table() {
			var id = $("#id_reference").val()
			$("#example").dataTable().fnDestroy()

			$.ajax({
				url: "../controller/bailleur/fetch_bailleur",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('#example tbody').html("");
					//insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var b = 0; b < gp_data.length; b++) {
						$('#example tbody').append(`
			  <tr>
				<td style="text-align:center;" class="no-export"><img src="${gp_data[b].photob}" alt="" width="30" height="30"></td>
				<td style="text-align:center;">${gp_data[b].nom_bailleur}</td>
				<td style="text-align:center;">${gp_data[b].adresseb}</td>
				<td style="text-align:center;">${gp_data[b].telephoneb}</td>
				<td style="text-align:center;">${gp_data[b].emailb}</td>
				<td style="text-align:center;">${gp_data[b].cinb}</td>
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
		$("#btn-modal-ajouter").click(function() {
			$("#get_id_reference").val($("#id_reference").val());
			$("#ajouter-modal").fadeIn();
		});
		$("#btn-modal-importer").click(function() {
			$("#get_id_reference_import").val($("#id_reference").val());
			$("#importer-modal").fadeIn();
		});
		$("#infocomplete").click(function() {
			$("#infocomplet-modal").fadeIn();
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

		$(document).on('click', '.toggle-btn', function(e) {
			var id = $(this).data('id');
			$("#nav_" + id).toggleClass("active");
			$("#toggle-btn-close_" + id).toggleClass("fa-times");
		})
		$(document).on('click', '.fab-button', function(e) {
			var id = $(this).data('id');
			$("#fab-show_" + id).toggle("slow");
			$("#fas_" + id).toggleClass("fa-times");
			$("#fab-show_" + id).attr(('style', 'display:block'))
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
			$("#insertForm").on('submit', function(e) {

				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: '../controller/bailleur/insert',
					data: new FormData(this),
					//dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,
					success: function(response) {
						console.log(response)
						Swal.fire({
							icon: 'success',
							title: 'Enregistré',
							text: "Enregistrement effectué avec succés.",
							confirmButtonColor: '#127b8e',
							showConfirmButton: false,
							timer: 2000
						}).then(function() {
							fetchdata();
							fetch_data_table();
						});
					}

				});
				$(this).find('input:text, input:password, input:file, textarea').val('');
				$(this).find('select').val(null).trigger('change');
				$("#imgPreview").attr("src", "../img/image/image-profil.png");
				$("#ajouter-modal").fadeOut();


			});
			//UPDATE
			$("#updateForm").on('submit', function(e) {
				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: '../controller/bailleur/update',
					data: new FormData(this),
					//dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,

					success: function(response) {
						console.log(response)
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
					fetch_data_table();
				});
				$(this).find('input:text, input:password, input:file, textarea').val('');
				$(this).find('select').val(null).trigger('change');
			});
			// SUPPRIMER
			$("#deleteForm").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '../controller/bailleur/delete',
					data: new FormData(this),
					dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,

					success: function(response) {
						console.log(response)
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
					fetch_data_table();
				});
			});
			//IMPORTER FICHIER
			$("#saveImport").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '../controller/bailleur/import',
					data: new FormData(this),
					//dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,

					success: function(response) {
						console.log(response)
					}
				});
				$("#importer-modal").fadeOut();
				Swal.fire({
					icon: 'success',
					title: 'Importé',
					text: "Importation effectuée avec succés.",
					confirmButtonColor: '#127b8e',
					showConfirmButton: false,
					timer: 2000
				}).then(function() {
					fetchdata();
					fetch_data_table();
					$("#tblItems tr.body_caption_top").remove();
					$(".progress-area").html("");
					$(".uploaded-area").html("");
				});
			});
		})
		$(document).on("click", "#togglePassword", function(e) {
			// toggle the type attribute
			var password = $('#password');
			if (password.attr("type") === "password") {
				password.attr("type", "text");
			} else {
				password.attr("type", "password");
			}
			$("#show-eye").toggleClass('fa-eye');
			$("#show-eye").toggleClass('fa-eye-slash');
			// toggle the eye icon
		});
		$(document).on("click", "#update_togglePassword", function(e) {
			// toggle the type attribute
			var password = $('#update_password');
			if (password.attr("type") === "password") {
				password.attr("type", "text");
			} else {
				password.attr("type", "password");
			}
			$("#update_show-eye").toggleClass('fa-eye');
			$("#update_show-eye").toggleClass('fa-eye-slash');
			// toggle the eye icon
		});
		$(document).on("keyup", ".etablissement", function(event) {
			var textBox = event.target;
			var start = textBox.selectionStart;
			var end = textBox.selectionEnd;

			// Capitalize the first letter of each word after a space
			textBox.value = textBox.value.toLowerCase().replace(/(?:^|\s)\w/g, function(match) {
				return match.toUpperCase();
			});

			textBox.setSelectionRange(start, end);
		});


		// SHOW UPDATE
		$(document).on('click', '#updatebtn', function(e) {
			e.preventDefault();
			var id_bailleur = $(this).data('id');
			$.ajax({
				url: "../controller/bailleur/fetch_bailleur",
				type: "post",
				data: {
					id_bailleur: id_bailleur
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)
					$("#edit_id").val(data.id_bailleur);
					$("#nom_bailleur").val(data.nom_bailleur);
					$("#adresseb").val(data.adresseb);
					$("#telephoneb").val(data.telephoneb);
					$("#emailb").val(data.emailb);
					$("#cinb").val(data.cinb);
					$("#update_imgPreview").attr("src", data.photob);
					$("#modifier-modal").fadeIn();
				}
			});
		});
		//SHOW DELETE
		$(document).on('click', '#deletebtn', function(e) {
			e.preventDefault();
			var id_bailleur = $(this).data('id');
			$.ajax({
				url: "../controller/bailleur/fetch_bailleur",
				type: "post",
				data: {
					id_bailleur: id_bailleur
				},
				dataType: 'json',
				success: function(data) {
					console.log(data.logo)
					$("#delete_id").val(data.id_bailleur);
					$("#delete_imgPreview").attr("src", data.photob);
					$("#nom_del").val(data.nom_bailleur);
					$("#supprimer-modal").fadeIn();
				}
			});
		});
		//SHOW DELETE

		//SHOW INFO
		$(document).on('click', '#infobtn', function(e) {
			e.preventDefault();
			var id_bailleur = $(this).data('id');
			$.ajax({
				url: '../controller/employe/fetch_employe',
				type: "post",
				data: {
					id_bailleur: id_bailleur
				},
				dataType: 'json',
				success: function(data) {
					console.log(data.logo)
					$("#up_title-name").html(data.prenom + " " + data.nom);
					$("#up_title-matricule").html(data.matricule);
					$("#up_profil_imgPreview").attr("src", data.photo);
					$("#info-modal").fadeIn();
				}
			});
		});
		$(document).ready(function() {
			$('.form-importer').on("click", function() {
				$("#fileupload").click();
			});
			$('#fileupload').on("change", function() {
				var validExts = new Array(".xlsx", ".xls", ".csv");
				var fileExt = $('#fileupload').val();
				fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
				if (validExts.indexOf(fileExt) < 0) {
					$('#message_show').show().delay(5000).hide(0);
					return false;
				} else {
					$("#importForm").submit()
					return true;
				}
			});

			// File upload via Ajax
			$("#importForm").on('submit', function(e) {
				e.preventDefault();
				var fileName = $('#fileupload').val().replace(/C:\\fakepath\\/i, '');
				if (fileName.length >= 12) {
					var splitName = fileName.split(".");
					fileName = splitName[0].substring(0, 12) + "... ." + splitName[1];
				}
				// get start time
				var startTime = new Date().getTime();
				var xhr = $.ajax({
					xhr: function() {
						var xhr = new XMLHttpRequest();
						xhr.upload.addEventListener("progress", function(e) {
							if (e.lengthComputable) {
								var fileLoaded = Math.floor((e.loaded / e.total) * 100);
								var fileTotal = Math.floor(e.total / 100);
								var fileSize;
								(fileTotal > 1024) ? fileSize = fileTotal + " KB":
									fileSize = (e.loaded / (1024 * 1024)).toFixed(2) +
									" MB";
								var progressHTML = `
                        <li class="row">
                            <i class="fas fa-file-excel"></i>
                            <div class="content">
                                <div class="details">
                                    <span class="name">${fileName} * téléchargement</span>
                                    <span class="percent">${fileLoaded}%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width:${fileLoaded}%"></div>
                                </div>
                            </div>
                        </li>
                        `;
								$(".progress-area").html(progressHTML);
								$(".uploaded-area").html("");

								if (e.loaded == e.total) {

									$(".progress-area").html("");
									var uploadedHTML = `<li class="row">
                            <div class="content">
                                <i class="fas fa-file-excel"></i>
                                <div class="details">
                                    <span class="name">${fileName} * télécharger</span>
                                    <span class="size">${fileSize}</span>
                                </div>
                            </div>
                            <i class="fas fa-check"></i>
                        </li>
                        <div class="compteur"></div>
                        `;
									$(".uploaded-area").html(uploadedHTML);

								}
							}
						}, false);
						return xhr;
					},
					type: 'POST',
					url: '../controller/import_export/upload/upload',
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(response) {
						// get response on successful uploading
						console.log(response);
					}
				});

				// remove value form input button
			});
		});

		var ExcelToJSON = function() {
			this.parseExcel = function(file) {
				var reader = new FileReader();

				reader.onload = function(e) {
					var data = e.target.result;
					var workbook = XLSX.read(data, {
						type: 'binary',
						cellText: false,
						cellDates: true

					});
					workbook.SheetNames.forEach(function(sheetName) {
						var XL_row_object = XLSX.utils.sheet_to_json(workbook.Sheets[
							sheetName], {
							header: 1,
							raw: false,
							dateNF: 'dd"/"mm"/"yyyy',
						});
						var productList = JSON.parse(JSON.stringify(XL_row_object));
						var rows = $('#tblItems tbody');
						// console.log(productList)
						var count = 0;
						for (i = 0; i < productList.length; i++) {
							count++;
							var columns = Object.values(productList[i])

							if (columns[0] == null) {
								columns[0] = "";
							} else {
								columns[0];
							}
							if (columns[1] == null) {
								columns[1] = "";
							} else {
								columns[1];
							}
							if (columns[2] == null) {
								columns[2] = "";
							} else {
								columns[2];
							}
							if (columns[3] == null) {
								columns[3] = "";
							} else {
								columns[3];
							}

							if (columns[4] == null) {
								columns[4] = "";
							} else {
								columns[4];
							}

							rows.append(`
                        <tr class="body_caption_top">
                            <td><input type="text" class="text-import" name="nom_bailleur[]" value="${columns[0]}"></td>
                            <td><input type="text" class="text-import" name="adresseb[]" value="${columns[1]}"></td>
                            <td><input type="text" class="text-import" name="telephoneb[]" value="${columns[2]}"></td>
                            <td><input type="text" class="text-import" name="emailb[]" value="${columns[3]}"></td>
							<td><input type="text" class="text-import" name="cinb[]" value="${columns[4]}"></td>
            
                        </tr>
                    `);
							$('#fileupload').val("")

						}

					})
				};
				reader.onerror = function(ex) {
					console.log(ex);
				};

				reader.readAsBinaryString(file);
			};
		};

		function get_years() {
			var can = false;
			$('.get_years').each(function() {
				if ($(this).val() === '') {
					can = true;
				}
			});
			if (can) {
				$('#importdata').attr('disabled', 'disabled')
				let c = getComputedStyle(document.getElementById("importdata"), null).getPropertyValue(
					'--disabled-form');

				$("#importdata").css({
					background: c
				});
				$("#importdata").on('mouseenter', function() {
					$("#importdata").css({
						background: c
					})
				})
				$("#importdata").mouseout(function() {
					$("#importdata").css({
						background: c
					})
				})
			} else {
				$('#importdata').removeAttr('disabled')
				let c = getComputedStyle(document.getElementById("importdata"), null).getPropertyValue('--background-icon',
					'--background-hover');
				$("#importdata").css({
					background: c
				})
				let d = getComputedStyle(document.getElementById("importdata"), null).getPropertyValue('--background-hover');

				$("#importdata").mouseover(function() {
					$("#importdata").css({
						background: d
					})
				})
				$("#importdata").mouseout(function() {
					$("#importdata").css({
						background: c
					})
				})
			}
		}

		function handleFileSelect(evt) {
			var files = evt.target.files; // FileList object
			var xl2json = new ExcelToJSON();
			xl2json.parseExcel(files[0]);
		}

		document.getElementById('fileupload').addEventListener('change', handleFileSelect, false);

		$("#vider_import").on("click", function() {
			$("#tblItems tr.body_caption_top").remove();
			$(".progress-area").html("");
			$(".uploaded-area").html("");

		})

		//SHOW INFO

		// SLIDER FORM NEXT ADD


		function checkInputs1() {
			var can = false;
			$('.input-required1').each(function() {
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
				let c = getComputedStyle(document.getElementById("btn-next-progress1"), null).getPropertyValue(
					'--background-icon', '--background-hover');
				$("#btn-next-progress1").css({
					background: c
				})
				let d = getComputedStyle(document.getElementById("btn-next-progress1"), null).getPropertyValue(
					'--background-hover');

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
			$('.input-required-update').each(function() {
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
				let c = getComputedStyle(document.getElementById("btn-next-progress-update1"), null).getPropertyValue(
					'--background-icon', '--background-hover');
				$("#btn-next-progress-update1").css({
					background: c
				})
				let d = getComputedStyle(document.getElementById("btn-next-progress-update1"), null).getPropertyValue(
					'--background-hover');

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
			checkInputs1()
		});

		function checkimport() {

		}
		$(document).on('input', '.input-required1', function(e) {
			checkInputs1()
		})
		$(document).on('keyup', '.input-required-update', function(e) {
			checkInputsupdate1()
		})
		$('#ExportdataPdf').click(function() {
			// PDF export using jsPDF's core html support
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
					fontSize: 8
				},
			})
			doc.save('Bailleur')
		})

		$('#Exportdata').click(function() {
			let table = $("#example").clone();
			console.log(table);
			table.find(".no-export").each(function() {
				$(this).remove();
			});
			TableToExcel.convert(table[0], {
				name: `Bailleur.xlsx`,
				sheet: {
					name: 'Bailleur'
				}
			});
		});

		var tabs = document.querySelectorAll(".tab_btn");
		var all_content_tab = document.querySelectorAll(".content_tab");

		tabs.forEach((tab, index) => {
			tab.addEventListener("click", (e) => {
				tabs.forEach(tab => {
					tab.classList.remove('active_tab')
				})
				tab.classList.add('active_tab');
				all_content_tab.forEach(content_tab => {
					content_tab.classList.remove('active_tab')
				})
				all_content_tab[index].classList.add('active_tab');
			})
		})
	</script>
<?php } else {
	header("Location:../");
} ?>