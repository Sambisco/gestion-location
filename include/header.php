<header class="header-section">
	<div class="header-left">
		<i class="fas fa-bars desktop"></i>
		<i class="fas fa-bars mobile"></i>
	</div>
	<div class="header-right">
		<div class="search-box1">
			<input type="search" class="header-search searchBox searchBox1 searchBox2"
				placeholder="Recherche...">
			<button type="button" class="header-button-search"><i class="fas fa-search"></i></button>
		</div>
		<div class="header-form">
			<form action="#" method="#">
				<button type="button" class="header-button-search icons-switcher"><i
						class="fas fa-palette"></i></button>
			</form>
		</div>
		<div class="header-form header-form-mobile">
			<form action="#" method="#">
				<button type="button" class="header-button-search" id="header-button-search"><i
						class="fas fa-search"></i></button>
			</form>
		</div>
		<div class="header-group-user">
			<ul>
				<li>
					<div class="profile">
						<div class="avatar-img">
							<img src="../img/image/image-profil.png" class="img-profil-user">
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="search-box">
		<div class="search-item">
			<div class="header-form">
				<div class="form">
					<input type="search" class="header-search searchBox searchBox1 searchBox2"
						placeholder="Recherche...">
					<button type="button" class="header-button-search"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</div>
	</div>
	<div class="notification-box">
		<div class="notification-item">
			<h3>Demande d'absence</h3>
			<div class="content-notification">

			</div>
		</div>
	</div>
	<div class="user-box">
		<div class="user-item">
			<h3>Utilisateur</h3>
			<div class="user-text">
				<div class="text-sub-text">
					<h4>Samba Ndao</h4>
				</div>
			</div>
			<div class="user-text">
				<div class="text-sub-text">
					<h4><a href="../controller/deconnect">Samba Ndao</a></h4>
				</div>
			</div>
		</div>
	</div>
	</div>
	<input type="hidden" id="id_references" value="<?php echo $_GET['id']; ?>">
	<audio id="myAudionotification">
		<source src="../img/beep/notification.mp3" type="audio/ogg">
	</audio>
</header>

<script>
	$(document).ready(function() {
		// updating the view with notifications using ajax
		function load_unseen_notification(view = '') {
			var id = $("#id_references").val()
			var div = `
		 <div class="notification" style="text-align:center;padding-top:10px;padding-bottom:10px;">
		<h5 >Aucune demande d'absence</h5>
</div>`;
			$('.content-notification').html(div);
			$.ajax({
				url: "../controller/notification/notification",
				method: "POST",
				data: {
					view: view,
					id: id
				},
				dataType: "json",
				success: function(data) {
					$('.content-notification').html(data.notification);


					if (data.unseen_notification > 0) {

						$('.count').attr("value", data.unseen_notification)
						playnotification();
					} else {
						$('.count').attr("value", "0")

					}

				}
			});
		}
		load_unseen_notification();
		// submit form and get new records

		// load new notifications
		$(document).on('click', '.show-notification', function() {
			load_unseen_notification('yes');
		});
		setInterval(function() {
			load_unseen_notification();;
		}, 200000);
	});

	function playnotification() {
		var x = document.getElementById("myAudionotification");
		x.play();
	}
</script>