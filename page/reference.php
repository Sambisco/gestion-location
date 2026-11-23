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
	<link rel="stylesheet" href="../css/css/reference_style.css">
	<link rel="stylesheet" href="../css/css/reference_responsive.css">
	<link rel="stylesheet" href="../css/fonts/remixicon.css">
	<!------MAIN-CONTENT-------->
	<?php
	$id = encryptor('decrypt', $_GET['id']);
	$query = "SELECT * FROM reference 
    WHERE id_reference='$id'";
	$statement = $db->prepare($query);
	$statement->execute();
	$result = $statement->fetch();
	?>
	<div class="main-content">
		<div class="container">
			<section class="userProfile card">
				<div class="profile_logo">
					<figure><img src="<?php if ($result["logo"] == null) {
											echo '../img/image/image.jpg';
										} else {
											echo $result["logo"];
										} ?>" alt="profile" width="250px" height="250px"></figure>
				</div>
			</section>


			<!-- ===== ===== Work & Skills Section ===== ===== -->
			<section class="work_skills card">

				<!-- ===== ===== Work Contaienr ===== ===== -->
				<div class="work">
					<h1 class="heading">Entreprise</h1>
					<div class="secondary">
						<h1>
							<?php
							if ($result["entreprise"] == null) {
								echo "entreprise";
							} else {
								echo $result["entreprise"];
							}
							?>
						</h1>
						<span style="display: none;"><img src="<?php if ($result["logo"] == null) {
																	echo '../img/image/image.jpg';
																} else {
																	echo $result["logo"];
																} ?>" alt="logo" width="40px" height="35x"></span>
						<p>
							<?php
							if ($result["adresse"] == null) {
								echo "Adresse";
							} else {
								echo $result["adresse"];
							}
							?>
						</p>
					</div>


				</div>

				<!-- ===== ===== Skills Contaienr ===== ===== -->
				<div class="skills">
					<h1 class="heading">Skills</h1>
					<ul>
						<li style="--i:0">Android</li>
						<li style="--i:1">Web-Design</li>
						<li style="--i:2">UI/UX</li>
						<li style="--i:3">Video Editing</li>
					</ul>
				</div>
			</section>


			<!-- ===== ===== User Details Sections ===== ===== -->
			<section class="userDetails card">
				<div class="userName">
					<h1 class="name">
						<?php
						if ($result["entreprise"] == null) {
							echo "Entreprise";
						} else {
							echo $result["entreprise"];
						}
						?>
					</h1>

					<p>
						<?php
						if ($result["adresse"] == null) {
							echo "Adresse";
						} else {
							echo $result["adresse"];
						}
						?>
					</p>
				</div>

				<div class="rank">
					<div class="rating">
						<i class="ri-star-fill rate"></i>
						<i class="ri-star-fill rate"></i>
						<i class="ri-star-fill rate"></i>
						<i class="ri-star-fill rate"></i>
						<i class="ri-star-fill rate underrate"></i>
					</div>
				</div>

				<div class="btns">
					<ul>
						<li class="sendMsg active">
							<i class="ri-check-fill ri"></i>
							<a href="#" data-id="<?php echo encryptor('encrypt', $result["id_reference"]); ?>" id="updatebtn">Contacts</a>
						</li>
					</ul>
				</div>
			</section>


			<!-- ===== ===== Timeline & About Sections ===== ===== -->
			<section class="timeline_about card">
				<div class="tabs">
					<ul>
						<li class="about active">
							<i class="ri-user-3-fill ri"></i>
							<span>À propos</span>
						</li>
					</ul>
				</div>

				<div class="contact_Info">
					<h1 class="heading">Coordonnées</h1>
					<ul>

						<li class="address">
							<h1 class="label">Adresse:</h1>
							<span class="info">
								<?php
								if ($result["adresse"] == null) {
									echo "&nbsp;";
								} else {
									echo $result["adresse"];
								}
								?>
							</span>
						</li>

						<li class="phone">
							<h1 class="label">Téléphone:</h1>
							<span class="info">
								<?php
								if ($result["telephone"] == null) {
									echo "&nbsp;";
								} else {
									echo $result["telephone"];
								}
								?>
							</span>
						</li>

						<li class="address">
							<h1 class="label">Fax:</h1>
							<span class="info">
								<?php
								if ($result["fax"] == null) {
									echo "&nbsp;";
								} else {
									echo $result["fax"];
								}
								?>
							</span>
						</li>

						<li class="address">
							<h1 class="label">B.P</h1>
							<span class="info">
								<?php
								if ($result["bp"] == null) {
									echo "&nbsp;";
								} else {
									echo $result["bp"];
								}
								?>
							</span>
						</li>

						<li class="email">
							<h1 class="label">E-mail:</h1>
							<span class="info">
								<?php
								if ($result["email"] == null) {
									echo "&nbsp;";
								} else {
									echo $result["email"];
								}
								?>
							</span>
						</li>
						<li class="email" style="margin-top: 2px;">
							<h1 class="label">NINEA:</h1>
							<span class="info">
								<?php
								if ($result["ninea"] == null) {
									echo "&nbsp;";
								} else {
									echo $result["ninea"];
								}
								?>
							</span>
						</li>
						<li class="site">
							<h1 class="label">Site:</h1>
							<span class="info">
								<?php
								if ($result["web"] == null) {
									echo "&nbsp;";
								} else {
									echo $result["web"];
								}
								?>
							</span>
						</li>
					</ul>
				</div>

				<div class="basic_info">
					<h1 class="heading">INFORMATIONS DE BASE</h1>
				</div>
			</section>
		</div>
	</div>

	<form id="updateForm">
		<div class="petit close-modal" id="modifier-modal">
			<div class="modal-panel-petit modal-petit-3d">
				<div class="overlay-inner">
					<div class="modal-close">
						<span class="title">MODIFIER Bailleur</span>
						<div class="btn-close-modal close-modal">
							<i class="fa fa-times-circle"></i>
						</div>
					</div>
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="date-box">
									<img src="../img/image/image-profil.jpg" alt="" id="update_imgPreview">
									<div class="round">
										<input type="file" name="logo" id="update_photo" class="file-upload">
										<i class="fa fa-camera"></i>
									</div>
								</div>
								<div class="content-box">
									<div class="container-form">
										<input type="hidden" name="edit_id" id="edit_id" hidden>
										<div class="nextstep-update nextstep-active-update">
											<div class="user-details-register">
												<div class="input-group">
													<label class="label-details">Entreprise</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-home fa-icon"></i></span>
														<input type="text" class="text-input" name="entreprise" id="entreprise" required="required"
															placeholder="Entreprise"
															onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Adresse</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-map-marker fa-icon"></i></span>
														<input type="text" class="text-input" name="adresse" id="adresse" required="required"
															placeholder="Adresse"
															onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Telephone</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-phone fa-rotate-90 fa-icon"></i></span>
														<input type="text" class="text-input" name="telephone" id="telephone" required="required"
															placeholder="Telephone">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Email</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-envelope fa-icon"></i></span>
														<input type="text" class="text-input" name="email" id="email" placeholder="Email">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">NINEA</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-envelope fa-icon"></i></span>
														<input type="text" class="text-input" name="ninea" id="ninea" placeholder="NINEA">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">Fax</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-envelope fa-icon"></i></span>
														<input type="text" class="text-input" name="fax" id="fax" placeholder="Fax">
													</div>
												</div>
												<div class="input-group">
													<label class="label-details">BP</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-envelope  fa-icon"></i></span>
														<input type="text" class="text-input" name="bp" id="bp"
															placeholder="BP">
													</div>
												</div>

												<div class="input-group">
													<label class="label-details">Site web</label>
													<div class="input-box">
														<span class="span-left"><i class="fa fa-globe  fa-icon"></i></span>
														<input type="text" class="text-input" name="web" id="web"
															placeholder="Site web">
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
				</div>
			</div>
		</div>
	</form>

	<?php
	include("../include/footer.php");
	?>

	<!------MODAL MODIFIER-------->

	<!------FIN MODAL MODIFIER-------->
	<!------MODAL SUPPRIMER-------->

	<!------FIN MODAL SUPPRIMER-------->
	<!------MODAL INFO-------->

	<!------FIN MODAL INFO-------->
	<!------FOOTER-------->

	<script>
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
		$(document).on("change", "#photo_cachet", function() {
			var file = this.files[0];
			console.log(file);
			if (file) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#imgPreview_cachet').attr('src', e.target.result);
				}
				reader.readAsDataURL(file);
			}
		})
		$(document).on("change", "#update_photo_cachet", function() {
			var file = this.files[0];
			console.log(file);
			if (file) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#update_imgPreview_cachet').attr('src', e.target.result);
				}
				reader.readAsDataURL(file);
			}
		})
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
		//INSERTION
		$(document).ready(function(e) {
			// Submit form data via Ajax

			//MODIFIER
			$("#updateForm").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '../controller/reference/update',
					data: new FormData(this),
					dataType: 'json',
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
					window.location =
						"reference?id=<?php echo  $_GET["id"]; ?>";
				});
			});
		})
		// SUPPRIMER

		//PAGINATION

		// SHOW UPDATE
		$(document).on('click', '#updatebtn', function(e) {
			e.preventDefault();
			var id_reference = $(this).data('id');
			$.ajax({
				url: "../controller/reference/fetch_reference",
				type: "post",
				data: {
					id_reference: id_reference
				},
				dataType: 'json',
				success: function(data) {
					console.log(data.id_reference)
					$("#edit_id").val(data.id_reference);
					$("#entreprise").val(data.entreprise);
					$("#adresse").val(data.adresse);
					$("#telephone").val(data.telephone);
					$("#fax").val(data.fax);
					$("#bp").val(data.bp);
					$("#email").val(data.email);
					$("#ninea").val(data.ninea);
					$("#web").val(data.web);
					$("#update_imgPreview").attr("src", data.logo);
					$("#modifier-modal").fadeIn();
				}
			});
		});
		//SHOW DELETE

		//SHOW INFO
	</script>
<?php } else {
	header("Location:../");
} ?>