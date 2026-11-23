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
						<span class="icon"><i class="fas fa-user"></i></span>
						<span class="text">Bailleur</span>
					</a>
				</li>
				<li class="active_nav_click" id="button_2">
					<a href="#">
						<span class="icon"><i class="fas fa-file"></i></span>
						<span class="text">Rapport</span>
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
				<h1>Bailleur</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Bailleur</a></li>
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
				<h1>Post paiement</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Post paiement</a></li>
				</ol>
			</div>
			<div class="body">
				<div class="wrapper">
					<div class="contour">
						<button id="prev"><i class="fa fa-angle-left"></i></button>
						<div id="flipbook" class="flipbook">

						</div>
						<button id="next"><i class="fa fa-angle-right"></i></button>

					</div>
				</div>
			</div>
			<!----------------PAGINATION----------->
		</div>

		<!---------FIN SOUS CONTAINT 2----------->
	</div>


	<!------MODAL AJOUT INSCRIPTION-------->

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
		function data_bailleur() {
			var id = $("#id_reference").val()
			$.ajax({
				url: "../controller/post/post-paiement",
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('.content-list1').html(""); //insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var a = 0; a < gp_data.length; a++) {
						var div1 = `
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
							<div class="see-more see-more3">
                                <span class="switch">
									<input type="checkbox" class="check-add-bailleur check-add-bailleur_${gp_data[a].id_bailleur}" id="" data-id="${gp_data[a].id_bailleur}">
									<label for=""></label>
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

		function fetchdata() {
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
		$(document).on('change', '.check-add-bailleur', function(e) {
			var id_bailleur = $(this).data('id');
			var $checks = $('.check-add-bailleur_' + id_bailleur);
			if ($checks.is(':checked')) {
				$('.check-add-bailleur').prop('checked', false);
				$('.check-add-bailleur_' + id_bailleur).prop('checked', true);
				$.ajax({
					url: "../controller/post/rapport",
					type: "POST",
					data: {
						id_bailleur: id_bailleur
					},
					//dataType: 'html',
					success: function(response) {
						$('#flipbook').html();
						$('#flipbook').append(response);
						if ($(window).width() >= 820) {
							var oTurn = $("#flipbook").turn({
								display: 'double',
								autoCenter: true,
								next: true,
								duration: 2000,
								page: 1,
							});

						} else {
							var oTurn = $("#flipbook").turn({
								display: 'single',
								autoCenter: true,
								next: true,
								duration: 2000,
								page: 1,
							});

						}

						$("#prev").click(function(e) {
							e.preventDefault();
							oTurn.turn("previous");
						});

						$("#next").click(function(e) {
							e.preventDefault();
							oTurn.turn("next");
						});
					}
				})
				$('.main-sous-content2').addClass('active-content')
				$('.main-sous-content1').removeClass('active-content')
			} else {
				$('#pages').append(`
						<div class="page rapport-vide">
						   <div>
							  Veillez selectionner un bailleur pour afficher le rapport 
						   </div> 
						</div>`);
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