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

	<div class="bouton-add-div">
		<div class="tooltip-add">Ajouter</div>
		<button type="button" class="boutton-petit-modal petit-modal" id="btn-modal-ajouter_i"><i
				class="fas fa-plus"></i></button>
	</div>
	<!------MAIN-CONTENT-------->
	<div class="main-content main-content1">
		<!---------SOUS CONTAINT 1----------->
		<div class="main-sous-content main-sous-content1">
			<div class="title-page">
				<h1>Siege</h1>
				<ol>
					<li><a href="#">Accueil</a></li>/
					<li><a href="#">Siege</a></li>
				</ol>
			</div>
			<input type="hidden" id="id_reference" value="<?php echo $_GET['id']; ?>">

			<div class="content-global">
				<div class="content-list content-list1">

				</div>
				<!----------------PAGINATION----------->
				<div class="pagination">
					<div class="showingInfo" id="showingInfo"></div>
					<div class="showingPage" id="pagination"></div>
				</div>

			</div>
		</div>
		<!---------FIN SOUS CONTAINT 1----------->

		<!---------SOUS CONTAINT 2----------->

		<!---------FIN SOUS CONTAINT 2----------->
	</div>


	<!------MODAL AJOUT INSCRIPTION-------->
	<form id="insertConge">
		<div class="petit close-modal" id="ajouter-modal_i">
			<div class="modal-panel-petit">
				<div class="overlay-inner">
					<div class="modal-close">
						<span>AJOUTER siege</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="corps-modal">
						<div class="container-form">

							<!----------ProgressBar--------->
							<!---------Form----------------->
							<input type="text" name="id_reference" id="get_id_reference" hidden>
							<div class="nextstep nextstep-active">
								<div class="user-details-login">

									<div class="input-group">
										<label class="label-details">Siege</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-home fa-icon"></i></span>
											<input type="text" class="text-input" name="siege" placeholder="Siege" required
												onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
										</div>
									</div>
									<div class="input-group">
										<label class="label-details">Telephone</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-phone fa-rotate-90 fa-icon"></i></span>
											<input type="text" class="text-input" name="telephones" id=""
												placeholder="Telephone"
												onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
										</div>
									</div>
								</div>
								<div class="footer-modal">
									<button type="submit" class="footer-button-register"
										id="inscriptdata">Enregistrer</button>
									<button type="button" class="footer-button-close close-modal">Fermer</button>
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
			<div class="modal-panel-petit">
				<div class="overlay-inner">
					<div class="modal-close">
						<span>MODIFIER siege</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="corps-modal">
						<div class="container-form">
							<input type="text" name="edit_id" id="edit_id" hidden>

							<div class="nextstep-update nextstep-active-update">
								<div class="user-details-login">
									<div class="input-group">
										<label class="label-details">Siege</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-home fa-icon"></i></span>
											<input type="text" class="text-input" name="siege" id="siege"
												placeholder="Siege" required
												onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
										</div>
									</div>
									<div class="input-group">
										<label class="label-details">Telephone</label>
										<div class="input-box">
											<span class="span-left"><i class="fa fa-phone fa-rotate-90 fa-icon"></i></span>
											<input type="text" class="text-input" name="telephones" id="telephones"
												placeholder="Telephone"
												onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
										</div>
									</div>
								</div>
								<div class="footer-modal">
									<button type="submit" class="footer-button-register" id="inscriptdata">Modifier</button>
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
					<span class="title">SUPPRIMER siege</span>
					<div class="btn-close-modal close-modal">
						<i class="fa fa-times-circle"></i>
					</div>
				</div>
				<div class="corps-modal">
					<div class="container-form">
						<form id="deleteForm">
							<input type="hidden" name="delete_id" id="delete_id">

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

	<!--------FIN MODAL INFO GENERAL------->
	<!--------MODAL INFO INDEMNITE------->

	<!--------FIN MODAL INFO INDEMNITE------->

	<!------FOOTER-------->
	<script src="../script/script/script-letter.js"></script>

	<?php
	include("../include/footer.php");
	?>
	<script>
		function fetchdata() {
			var id = $("#id_reference").val()
			$.ajax({
				url: '../controller/siege/fetch_siege',
				type: "POST",
				data: {
					id: id
				},
				success: function(response) {
					$('.content-list1').html(""); //insérer le texte de test.php dans votre div
					var gp_data = $.parseJSON(response);
					for (var i = 0; i < gp_data.length; i++) {
						var div1 = `
						<div class="col-list box result well">
                          <div class="col-list-card">
                   
                          <div class="col-list-card-ord">
                        <h4>${gp_data[i].siege}</h4>
                        <h2>${gp_data[i].telephones}</h2>
                    </div>
                </div>
                <div class="nav" id="nav_${gp_data[i].id_siege}">
                    <div class="nav-content">
                        <div class="toggle-btn" id="toggle-btn_${gp_data[i].id_siege}" data-id="${gp_data[i].id_siege}">
                            <i class="fas fa-cog toggle-btn-close" id="toggle-btn-close_${gp_data[i].id_siege}"></i>
                        </div>
						<div style="--i:1;" class="span"><a href="#"><div class="tooltip">Modification</div><div class="icon-circular" id="updatebtn" data-id="${gp_data[i].id_siege}"><i class="fas fa-edit"></i></div></a></div>
						 <div style="--i:2;" class="span"><a href="../page/dashboard?id=${id}&add=${gp_data[i].id_siege}"><div class="tooltip">Tableau&nbsp;de&nbsp;bord</div><div class="icon-circular"><i class="fas fa-tachometer-alt"></i></div></a></div>
                        <div style="--i:3;" class="span"><a href="#"><div class="tooltip">Suppression</div><div class="icon-circular"  id="deletebtn" data-id="${gp_data[i].id_siege}"><i class="fas fa-trash"></i></div></a></div>
                    </div>
                </div>
            </div>
						`;
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
				}
			})
		}

		$('document').ready(function() {
			fetchdata()
		})

		$("#btn-modal-ajouter_i").click(function() {
			$("#get_id_reference").val($("#id_reference").val());
			$("#ajouter-modal_i").fadeIn();
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
			var link = $('.partager_' + id).attr("href")
			navigator.share({
				text: 'Cliquez sur le lien pour télécharger la lettre de congé !', // Text to be shared
				url: link, // URL to be shared
				files: [] // An array of File objects to be shared
			})
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
				$("#ajouter-modal_i").fadeOut();

				$.ajax({
					type: 'POST',
					url: '../controller/siege/insert',
					data: new FormData(this),
					//dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,
					success: function(response) {
						console.log(response)
						if (response === 'true') {
							Swal.fire({
								icon: 'success',
								title: 'Existe',
								text: "Le siege a déja été creer.",
								confirmButtonColor: '#127b8e',
								showConfirmButton: false,
								timer: 2000
							})
							formStepsNum = 0
							updateformSteps_add()
							updateProgressBar_add()
							fetchdata()
							checkInputs1()
						} else {
							Swal.fire({
								icon: 'success',
								title: 'Enregistré',
								text: "Enregistrement effectué avec succés.",
								confirmButtonColor: '#127b8e',
								showConfirmButton: false,
								timer: 2000
							}).then(function() {

							});
							formStepsNum = 0
							updateformSteps_add()
							updateProgressBar_add()
							fetchdata()
							checkInputs1()
						}
					}
				});

				$(this).find('input:text, input:password, input:file, textarea').val('');
				$(".btn-next-progress1").css({
					background: 'rgb(37, 157, 237)'
				});
			});
			//UPDATE
			$("#updateForm").on('submit', function(e) {
				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: '../controller/siege/update',
					data: new FormData(this),
					//dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,
					success: function(response) {

						console.log(response);
						formStepsNum_update = 0;
						updateformSteps_update();
						updateProgressBar_update();
						fetchdata();
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

				});
			});
			// SUPPRIMER
			$("#deleteForm").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '../controller/siege/delete',
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
				});

			});
			// INSERT LETTER


			//UPDATE LETTER

		});

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


		// SHOW UPDATE
		$(document).on('click', '#updatebtn', function(e) {

			e.preventDefault();

			var id_siege = $(this).data('id');
			$.ajax({
				url: '../controller/siege/fetch_siege',
				type: "post",
				data: {
					id_siege: id_siege
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)
					$("#edit_id").val(data.id_siege);
					$("#annee_siege").val(data.annee_siege);
					$("#siege").val(data.siege);
					$("#telephones").val(data.telephones);
					$("#modifier-modal").fadeIn();

				}

			});

		});
		//SHOW DELETE
		$(document).on('click', '#deletebtn', function(e) {

			e.preventDefault();

			var id_siege = $(this).data('id');
			$.ajax({
				url: '../controller/siege/fetch_siege',
				type: "post",
				data: {
					id_siege: id_siege
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)

					$("#delete_id").val(data.id_siege);

					$("#nom_del").val(data.siege);
					$("#supprimer-modal").fadeIn();

				}

			});

		});


		// SLIDER FORM NEXT ADD
		var prevBtns = document.querySelectorAll(".btn-prev-progress");
		var nexBtns = document.querySelectorAll(".btn-next-progress");
		var progress = document.getElementById("progress-line");
		var formSteps = document.querySelectorAll(".nextstep");
		var progressSteps = document.querySelectorAll(".progress-step");
		var formStepsNum = 0;

		nexBtns.forEach(btn => {
			btn.addEventListener("click", () => {
				formStepsNum++;
				updateformSteps_add();
				updateProgressBar_add();
				fetchletter()
			})
		})

		prevBtns.forEach(btn => {
			btn.addEventListener("click", () => {
				formStepsNum--;
				updateformSteps_add();
				updateProgressBar_add();
			})
		})

		function updateformSteps_add() {
			formSteps.forEach(formStep => {
				formStep.classList.contains("nextstep-active") &&
					formStep.classList.remove("nextstep-active")
			})
			formSteps[formStepsNum].classList.add("nextstep-active")
		}

		function updateProgressBar_add() {
			progressSteps.forEach((progressStep, idx) => {
				if (idx < formStepsNum + 1) {
					progressStep.classList.add('progress-step-active');
					var progressActive = document.querySelectorAll(".progress-step-active")
					progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
				} else {
					progressStep.classList.remove('progress-step-active');
					var progressActive = document.querySelectorAll(".progress-step-active")
					progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
				}
			})
		}

		// SLIDER FORM NEXT UPDATE
		var prevBtns_update = document.querySelectorAll(".btn-prev-progress-update");
		var nexBtns_update = document.querySelectorAll(".btn-next-progress-update");
		var progress_update = document.getElementById("progress-line-update");
		var formSteps_update = document.querySelectorAll(".nextstep-update");
		var progressSteps_update = document.querySelectorAll(".progress-step-update");
		var formStepsNum_update = 0;

		nexBtns_update.forEach(btn => {
			btn.addEventListener("click", () => {
				formStepsNum_update++;
				updateformSteps_update();
				updateProgressBar_update();
				fetchletterUpdate();
			})
		})

		prevBtns_update.forEach(btn => {
			btn.addEventListener("click", () => {
				formStepsNum_update--;
				updateformSteps_update();
				updateProgressBar_update();
			})
		})

		function updateformSteps_update() {
			formSteps_update.forEach(formStep_update => {
				formStep_update.classList.contains("nextstep-active-update") &&
					formStep_update.classList.remove("nextstep-active-update")
			})
			formSteps_update[formStepsNum_update].classList.add("nextstep-active-update")
		}

		function updateProgressBar_update() {
			progressSteps_update.forEach((progressStep_update, idx) => {
				if (idx < formStepsNum_update + 1) {
					progressStep_update.classList.add('progress-step-active-update');
					var progressActive_update = document.querySelectorAll(".progress-step-active-update")
					progress_update.style.width = ((progressActive_update.length - 1) / (progressSteps_update.length -
						1)) * 100 + "%";
				} else {
					progressStep_update.classList.remove('progress-step-active-update');
					var progressActive_update = document.querySelectorAll(".progress-step-active-update")
					progress_update.style.width = ((progressActive_update.length - 1) / (progressSteps.length - 1)) *
						100 + "%";
				}
			})
		}

		function checkInputs1() {
			var can = false;
			$('.input-required1').each(function() {
				if ($(this).val() === '') {
					can = true;
				}
			});
			if (can) {
				$('.btn-next-progress1').attr('disabled', 'disabled')
				$(".btn-next-progress1").css({
					background: 'rgb(37, 157, 237)'
				});

			} else {
				$('.btn-next-progress1').removeAttr('disabled')
				$(".btn-next-progress1").css({
					background: '#005f9e'
				});
			}
		}

		function checkInputs11() {
			var can = false;
			$('.input-required11').each(function() {
				if ($(this).val() === '') {
					can = true;
				}
			});
			if (can) {
				$('.btn-next-progress11').attr('disabled', 'disabled')
				$(".btn-next-progress11").css({
					background: 'rgb(37, 157, 237)'
				});

			} else {
				$('.btn-next-progress11').removeAttr('disabled')
				$(".btn-next-progress11").css({
					background: '#005f9e'
				});
			}
		}

		function checkInputs2() {
			var can = false;
			$('.input-required2').each(function() {
				if ($(this).val() === '') {
					can = true;
				}
			});
			if (can) {
				$('.btn-next-progress2').attr('disabled', 'disabled')
				$(".btn-next-progress2").css({
					background: 'rgb(37, 157, 237)'
				});

			} else {
				$('.btn-next-progress2').removeAttr('disabled')
				$(".btn-next-progress2").css({
					background: '#005f9e'
				});
			}
		}

		function checkInputs_update1() {
			var can = false;
			$('.input-required-update1').each(function() {
				if ($(this).val() === '') {
					can = true;
				}
			});
			if (can) {
				$('.btn-next-progress-update1').attr('disabled', 'disabled')
				$(".btn-next-progress-update1").css({
					background: 'rgb(37, 157, 237)'
				});

			} else {
				$('.btn-next-progress-update1').removeAttr('disabled')
				$(".btn-next-progress-update1").css({
					background: '#005f9e'
				});
			}
		}

		function checkInputs_update2() {
			var can = false;
			$('.input-required-update2').each(function() {
				if ($(this).val() === '') {
					can = true;
				}
			});
			if (can) {
				$('.btn-next-progress-update2').attr('disabled', 'disabled')
				$(".btn-next-progress-update2").css({
					background: 'rgb(37, 157, 237)'
				});

			} else {
				$('.btn-next-progress-update2').removeAttr('disabled')
				$(".btn-next-progress-update2").css({
					background: '#005f9e'
				});
			}
		}
		checkInputs1()
		checkInputs11()
		//Enable or disable button based on if inputs are filled or not
		$(document).on('input', '.input-required1', function(e) {
			checkInputs1()
		})
		$(document).on('input', '.input-required11', function(e) {
			checkInputs11()
		})
		$(document).on('input', '.input-required-update1', function(e) {
			checkInputs_update1()
		})
		$(document).on('input', '.input-required-update2', function(e) {
			checkInputs_update2()
		})
	</script>
<?php } else {
	header("Location:../");
} ?>