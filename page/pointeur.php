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
<div class="fab-container" style="float: right;	position: fixed;bottom: 10%;right: 30px;z-index:900;">

	<div class="input-group mb-3">

		<div class="input-group-append">
			<div class="fab fab-icon-holder fab-button" style="cursor: pointer;">
				<i class="fas fa-video" style="font-size:20px;"></i>
			</div>
			<div class="fab fab-icon-holder fab-hide" style="cursor: pointer;display: none;">
				<i class="fas fa-times" style="font-size:20px;"></i>
			</div>
		</div>
	</div>
	<ul class="fab-options fab-show" style="display: none;">
		<li>
			<span class="fab-label">Pointage</span>
			<div class="fab-icon-holder" id="btn-modal-importer">
				<i class="fas fa-video"></i>
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

<div class="main-content">
	<div class="main-sous-content">
		<div class="title-page">
			<h1>Pointage</h1>
			<ol>
				<li><a href="#">Accueil</a></li>/
				<li><a href="#">Pointage</a></li>
			</ol>
		</div>
		<input type="hidden" id="id_reference" value="<?php echo $_GET['id']; ?>">
<input type="hidden" id="id_pointeur" value="<?php echo $_GET['idu']; ?>">
		<div class="content-list">

		</div>
		<!----------------PAGINATION----------->
		<div class="pagination">
			<div class="showingInfo" id="showingInfo"></div>
			<div class="showingPage" id="pagination"></div>
		</div>
	</div>

</div>

<!------MODAL AJOUT-------->
<div class="petit close-modal" id="ajouter-modal">
	<div class="modal-panel-petit">
		<div class="overlay-inner">
			<div class="modal-close">
				<span class="title">AJOUTER pointage</span>
				<div class="btn-close-modal close-modal">
					<i class="fa fa-times-circle"></i>
				</div>
			</div>
			<div class="corps-modal">
				<div class="container-form">
					<form id="insertForm">
						<div class="user-details-login">
							<div class="input-group">
								<label class="label-details">Date de pointage</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-calendar fa-icon"></i> </span>
									<input type="date" class="text-input" name="date" id=""
										value="<?php echo date("Y-m-d"); ?>" required="required">
								</div>
							</div>
						</div>
				</div>
			</div>
			<div class="footer-modal">
				<button type="submit" class="footer-button-register" id="insertdata">Enregister</button>
				<button type="button" class="footer-button-close close-modal">Fermer</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!------FIN MODAL AJOUT-------->
<!------MODAL MODIFIER-------->
<div class="petit close-modal" id="modifier-modal">
	<div class="modal-panel-petit">
		<div class="overlay-inner">
			<div class="modal-close">
				<span class="title">MODIFIER EMPLOYE</span>
				<div class="btn-close-modal close-modal">
					<i class="fa fa-times-circle"></i>
				</div>
			</div>
			<div class="corps-modal">
				<div class="container-form">
					<form id="updateForm">
						<input type="hidden" name="edit_id" id="edit_id">

						<div class="upload">
							<img src="../img/image/image-profil.png" alt="" id="update_imgPreview">
							<div class="round">
								<input type="file" name="photo" id="update_photo" class="file-upload">
								<i class="fa fa-camera"></i>
							</div>
						</div>
						<div class="user-details-register">
							<div class="input-group">
								<label class="label-details">Prenom</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-user fa-icon"></i></span>
									<input type="text" class="text-input etablissement" name="prenom" id="prenom"
										required="required" placeholder="Prenom">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Nom</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-user fa-icon"></i></span>
									<input type="text" class="text-input" name="nom" id="nom" required="required"
										placeholder="Nom"
										onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Date de naissance</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-calendar fa-icon"></i> </span>
									<input type="date" class="text-input" name="date_n" id="date_n" required="required"
										value="<?php echo date("Y-m-d"); ?>">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Lieu de naissance</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-map-marker fa-icon"></i></span>
									<input type="text" class="text-input" name="lieu_n" id="lieu_n" required="required"
										placeholder="Lieu de naissance"
										onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
								</div>
							</div>

							<div class="input-group">
								<label class="label-details">Telephone</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-phone fa-rotate-90 fa-icon"></i></span>
									<input type="text" class="text-input" name="telephone_e" id="telephone_e"
										required="required" placeholder="Telephone">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Adresse</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-map-marker fa-icon"></i></span>
									<input type="text" class="text-input" name="adresse_e" id="adresse_e"
										required="required" placeholder="Adresse"
										onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">N° carte d'identite</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-sort-numeric-down fa-icon"></i></span>
									<input type="text" class="text-input" name="cin_e" id="cin_e" required="required"
										placeholder="N° carte d'identite"
										onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Nationalité</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-envelope fa-icon"></i></span>
									<input type="text" class="text-input" name="nationalite" id="nationalite"
										placeholder="Nationalité"
										onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Email</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-envelope fa-icon"></i></span>
									<input type="text" class="text-input" name="email_e" id="email_e"
										placeholder="Email">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Nom du père</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-user fa-icon"></i></span>
									<input type="text" class="text-input etablissement" name="nom_pere" id="nom_pere"
										placeholder="Nom du père">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Nom de la mère</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-user fa-icon"></i></span>
									<input type="text" class="text-input etablissement" name="nom_mere" id="nom_mere"
										placeholder="Nom de la mère">
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Genre</label>
								<div class="input-box">
									<span class="span-left"><i class="fa fa-home fa-icon"></i></span>
									<select name="genre" id="genre" class="js-searchBox" required="required">
										<option value="">Selectionnez</option>
										<option value="M">Masculin</option>
										<option value="F">Feminin</option>
									</select>
								</div>
							</div>
						</div>
				</div>
			</div>
			<div class="footer-modal">
				<button type="submit" class="footer-button-register" id="updatetdata">Modifier</button>
				<button type="button" class="footer-button-close close-modal">Fermer</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!------FIN MODAL MODIFIER-------->

<!------MODAL SUPPRIMER-------->
<div class="petit close-modal" id="supprimer-modal">
	<div class="modal-panel-petit">
		<div class="overlay-inner">
			<div class="modal-close">
				<span class="title">SUPPRIMER EMPLOYE</span>
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
<div class="petit close-modal" id="info-modal">
	<div class="modal-panel-petit">
		<div class="overlay-inner">
			<div class="modal-close">
				<span class="title">INFO EMPLOYE</span>
				<div class="btn-close-modal close-modal">
					<i class="fa fa-times-circle"></i>
				</div>
			</div>
			<div class="corps-modal">
				<div class="profil-content">
					<div class="profil-content1 ">
						<div class="upload">
							<img src="../img/image/image-profil.png" alt="" id="info14">
						</div>
						<div class="user-details-register">
							<div class="input-group">
								<label class="label-details">Prenom</label>
								<div class="input-box">
									<div class="info1"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Nom</label>
								<div class="input-box">
									<div class="info2"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Matricule</label>
								<div class="input-box">
									<div class="info3"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Date de naissance</label>
								<div class="input-box">
									<div class="info4"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Lieu de naissance</label>
								<div class="input-box">
									<div class="info5"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="profil-content2">
						<div class="user-details-register">
							<div class="input-group">
								<label class="label-details">Telephone</label>
								<div class="input-box">
									<div class="info6"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Adresse</label>
								<div class="input-box">
									<div class="info7"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">N° carte d'identite</label>
								<div class="input-box">
									<div class="info8"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Email</label>
								<div class="input-box">
									<div class="info9"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Nom du père</label>
								<div class="input-box">
									<div class="info10"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Nom de la mère</label>
								<div class="input-box">
									<div class="info11"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Genre</label>
								<div class="input-box">
									<div class="info12"></div>
								</div>
							</div>
							<div class="input-group">
								<label class="label-details">Nationalité</label>
								<div class="input-box">
									<div class="info13"></div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
			<div class="footer-modal">
				<button type="submit" class="footer-button-register" id="deletedata"
					style="display:none">Supprimer</button>
				<button type="button" class="footer-button-close close-modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!------FIN MODAL INFO-------->
<!------MODAL IMPORTER-------->
<div class="moyen close-modal" id="importer-modal">
	<div class="modal-panel-moyen">
		<div class="overlay-inner">
			<div class="modal-close">
				<span class="title">Pointage</span>
				<div class="btn-close-modal close-modal">
					<i class="fa fa-times-circle"></i>
				</div>
			</div>

			<div class="corps-modal">
				<div class="upload-wrapper">
					   <form  id="heure_entree_p">
						<input type="hidden" name="id_pointage" id="id_pointage">
						<input type="hidden" name="id_user" id="id_user" value="<?php echo $_GET['idu'];?>">
						<button type="submit" id="button" hidden>SAVE</button>    
					    </form>
					<audio id="myAudio2">
						<source src="../img/codeQR/beep.mp3" type="audio/ogg">
					</audio>
				</div>

				<div class="content-instascan">
					<video id="video_entree" class="video_scan"></video>
					<div class="cadreur_video">
						<div class="button-video">
							<i class="fa fa-camera" id="camera-front-entree"></i>
							<input autocomplete="off" checked="" id="checked-camera-front-entree" name="options"
								type="radio" value="1" hidden />
							<i class="fa fa-light fa-camera-retro" id="camera-back-entree"></i>
							<input autocomplete="off" name="options" id="checked-camera-back-entree" type="radio"
								value="2" hidden />
						</div>
					</div>
				</div>
			</div>
			<div class="footer-modal">
				<button type="button" style="display:none" class="footer-button-register"
					id="importdata">Enregistrer</button>
				<button type="button" class="footer-button-close close-modal" id="vider_import">Fermer</button>
			</div>
		</div>
	</div>
</div>

<!------FIN MODAL IMPORTER-------->
<!--------MODAL INFO GENERAL------->
<div class="moyen close-modal" id="infocomplet-modal">
	<div class="modal-panel-moyen">
		<div class="overlay-inner">
			<div class="modal-close">
				<span class="title">Heure de sortie</span>
				<div class="btn-close-modal close-modal">
					<i class="fa fa-times-circle"></i>
				</div>
			</div>
			<div class="corps-modal">
				<div class="upload-wrapper">
					<form id="updateForm" enctype="multipart/form-data">
						<input type="hidden" class="file-input" id="filePointage1">
					</form>
					<audio id="myAudio2">
						<source src="../img/codeQR/beep.mp3" type="audio/ogg">
					</audio>
				</div>

				<div class="content-instascan">
					<video id="video_entree1" class="video_scan"></video>
					<div class="cadreur_video">
						<div class="button-video">
							<i class="fa fa-camera" id="camera-front-sortie"></i>
							<input autocomplete="off" checked="" id="checked-camera-front-sortie" name="options1"
								type="radio" value="1" hidden />
							<i class="fa fa-light fa-camera-retro" id="camera-back-sortie"></i>
							<input autocomplete="off" name="options1" id="checked-camera-back-sortie" type="radio"
								value="2" hidden />
						</div>
					</div>
				</div>
			</div>
			<div class="footer-modal">
				<button type="button" style="display:none" class="footer-button-register"
					id="updatdata">Exporter</button>
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
fetchdata()

function fetchdata() {
		var id=$("#id_reference").val()
var id_p=$("#id_pointeur").val()
	$.ajax({
		url: "../show/pointage/pointeur",
		type: "POST",
		data:{
			id:id,
			id_p:id_p
		},
		success: function(data) {
			$('.content-list').html(data); //insérer le texte de test.php dans votre div
		},
	})
}
fetchtb_employe()

function fetchtb_employe() {
	$.ajax({
		url: "../show/employe/tb_employe",
		success: function(data) {
			$('.tb_employe').html(data); //insérer le texte de test.php dans votre div
		},
	})
}
let scanner = new Instascan.Scanner({
	video: document.getElementById('video_entree')
});
let scanner1 = new Instascan.Scanner({
	video: document.getElementById('video_entree1')
});
$("#btn-modal-ajouter").click(function() {
	$("#ajouter-modal").fadeIn();
});
$("#btn-modal-importer").click(function() {
	Instascan.Camera.getCameras().then(function(cameras) {

		if (cameras.length > 0) {

			scanner.start(cameras[0]);

			$('[name="options"]').on('change', function() {

				if ($(this).val() == 1) {

					if (cameras[0] != "") {

						scanner.start(cameras[0]);

					} else {

						alert('Aucune caméra frontale trouvée!');

					}

				} else if ($(this).val() == 2) {

					if (cameras[1] != "") {

						scanner.start(cameras[1]);

					} else {

						alert('Aucune caméra arrière trouvée!');

					}

				}

			});

		} else {

			console.error('Aucune caméra trouvée.');

			alert('Aucune caméra trouvée.');

		}

	}).catch(function(e) {

		console.error(e);

		alert(e);

	});
	$("#importer-modal").fadeIn();
});
scanner.addListener('scan', function(c) {
	$('#id_pointage').val(c);
	$("#button").submit();
	playAudio();
})
scanner1.addListener('scan', function(p) {
	document.getElementById('filePointage1').value = p;
	$("#updatdata").click();
	playAudio();
})

function playAudio() {
	var x = document.getElementById("myAudio2");
	x.play();
}
$('#camera-front-entree').hide();

$('#camera-front-entree').click(function() {
	$('#checked-camera-front-entree').click();
	$('#camera-front-entree').hide();
	$('#camera-back-entree').show();
})
$('#camera-back-entree').click(function() {
	$('#checked-camera-back-entree').click();
	$('#camera-front-entree').show();
	$('#camera-back-entree').hide();

})


$('.close-modal').click(function() {
	scanner.stop(),
		scanner1.stop()
})
$("#infocomplete").click(function() {
	Instascan.Camera.getCameras().then(function(cameras) {

		if (cameras.length > 0) {

			scanner1.start(cameras[0]);

			$('[name="options1"]').on('change', function() {

				if ($(this).val() == 1) {

					if (cameras[0] != "") {

						scanner1.start(cameras[0]);

					} else {

						alert('Aucune caméra frontale trouvée!');

					}

				} else if ($(this).val() == 2) {

					if (cameras[1] != "") {

						scanner1.start(cameras[1]);

					} else {

						alert('Aucune caméra arrière trouvée!');

					}

				}

			});

		} else {

			console.error('Aucune caméra trouvée.');

			alert('Aucune caméra trouvée.');

		}

	}).catch(function(e) {

		console.error(e);

		alert(e);

	});
	$("#infocomplet-modal").fadeIn();
});
$('#camera-front-sortie').hide();

$('#camera-front-sortie').click(function() {
	$('#checked-camera-front-sortie').click();
	$('#camera-front-sortie').hide();
	$('#camera-back-sortie').show();
})
$('#camera-back-sortie').click(function() {
	$('#checked-camera-back-sortie').click();
	$('#camera-front-sortie').show();
	$('#camera-back-sortie').hide();

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

$(document).ready(function(e) {
	//INSERTION
	
               $("#heure_entree_p").on('submit', function(e) {
		e.preventDefault();
                $.ajax({
					type: 'POST',
                   url: '../controller/pointage/insert_p',
            data: new FormData(this),
			//dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
                   success:function(data){
                   }
                });
				 Swal.fire({
					icon: 'success',
					title: 'Enregistré',
					text: "Enregistrement effectué avec succés.",
					confirmButtonColor: '#127b8e',
					showConfirmButton: false,
					timer: 2000
				}).then(function() {
					fetchdata();
				});
            });

	$("#updatdata").on('click', function(e) {
		e.preventDefault();
		var filePointage1 = $("#filePointage1").val();
		$.ajax({
			type: 'POST',
			url: '../controller/pointage/update',
			data: {
				filePointage1: filePointage1
			},

			success: function(response) {

				Swal.fire({
					icon: 'success',
					title: 'Enregistré',
					text: "Enregistrement effectué avec succés.",
					confirmButtonColor: '#127b8e',
					showConfirmButton: false,
					timer: 2000
				}).then(function() {
					fetchdata();
					fetchtb_employe();
				});
			}
		});
		$("#ajouter-modal").fadeOut();

		$(this).closest('form').find("input[type=text]").val("");
	});
	//UPDATE

	// SUPPRIMER

	//IMPORTER FICHIER


	// SHOW UPDATE

	//SHOW DELETE

	//SHOW DELETE

	//SHOW INFO

	// File upload via Ajax

});


$('#Exportdata').click(function() {
	let table = $("#example").clone();
	console.log(table);
	table.find(".no-export").each(function() {
		$(this).remove();
	});
	TableToExcel.convert(table[0], {
		name: `Employe.xlsx`,
		sheet: {
			name: 'Employe'
		}
	});
});
</script>
<?php }else{
   header("Location:../");  
}?>