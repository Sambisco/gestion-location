<?php
include("connect.php");
include('config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id_m =  $_GET['id'];
}
$id = encryptor('decrypt', $_GET['id']);
$query = "SELECT * FROM reference 
            WHERE id_reference='$id'";
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetch();
?>

<!------SIDE-BAR-------->
<nav class="sidebar">
	<div class="logo-details">
		<img src="<?php if ($result["logo"] == null) {
						echo "../img/image/image.jpg";
					} else {
						echo $result["logo"];
					} ?>">
		<span class="logo-name">
			<h5><?php if ($result["entreprise"] == null) {
					echo "Entreprise";
				} else {
					echo $result["entreprise"];
				} ?></h5>
		</span>
	</div>

	<div class="nav-links">
		<div class="nav-links1">

			<?php
			if (isset($_SESSION['profil'])) {
				if ($_SESSION['profil'] == "Administrateur") {
					include("menu_add_m.php");
				} else if ($_SESSION['profil'] == "Utilisateur") {
					include("menu_add_u.php");
				}
			} else {
				include("menu_add_m.php");
			}
			?>

			<?php
			if (isset($_SESSION['profil'])) {
			} else {
			?>
				<li>
					<div class="iocn-link">
						<a href="../page/user?id=<?php echo $id_m; ?>">
							<span class="icon-menu icon-menu-left"><i class=" fas fa-user"></i></span>
							<span class="link-name">Utilisateur</span>
						</a>
					</div>
						<ul class="sub-menu blank">
							<li><a class="link-name" href="#">Utilisateur</a></li>
						</ul>
				</li>
			<?php
			}
			?>
		</div>
	</div>
	<div class="profile-details">
		<div class="profile-content">
			<img src="../img/image/image-profil.png" class="img-profil-user">
		</div>

		<div class="name-job">
			<div class="profile-name">
				<?php
				if (isset($_SESSION['profil'])) {
					echo $_SESSION['nom_sub_user'];
				} else {
					echo $_SESSION['nomuser'];
				}
				?>
			</div>
			<div class="job">
				<?php
				if (isset($_SESSION['profil'])) {
					echo $_SESSION['profil'];
				} else {
					echo "Administrateur";
				}
				?>
			</div>
		</div>
		<?php
		if (isset($_SESSION['profil'])) {
		} else { ?>
			<a href="../page/reference?id=<?php echo $id_m; ?>"><i class="fas fa-sign-out-alt"></i></a>
		<?php } ?>
	</div>

</nav>
<div class="color-box">
	<div class="color-switchers">
		<button class="btn-switcher principal active-color" id="principal" data-color="bleu"></button>
		<button class="btn-switcher green-switcher" id="green-switcher" data-color="vert"></button>
		<button class="btn-switcher orange-switcher" id="orange-switcher" data-color="orange"></button>
		<button class="btn-switcher purple-switcher" id="purple-switcher" data-color="violet"></button>
	</div>
</div>
<!------------PETIT MODAL---------------->
<div class="petit close-modal" id="deconnect">
	<div class="modal-panel-petit" style="margin-top: 100px;">
		<div class="overlay-inner">
			<div class="modal-close">
				<span class="title">Ohh No!</span>
				<div class="btn-close-modal close-modal">
					<i class="fa fa-times-circle"></i>
				</div>
			</div>
			<div class="corps-modal">
				<p>
					Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session en cours ?
				</p>
			</div>
			<div class="footer-modal">
				<a href="../controller/deconnect"><button type="button" class="footer-button-register"
						id="btn-deconnect">Déconnexion</button></a>
				<button type="button" class="footer-button-close close-modal">Annuler</button>
			</div>
		</div>
	</div>
</div>
<!------FOOTER-------->