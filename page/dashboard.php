<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['email'])) {
	include('../include/connect.php');
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
	$date_dashboard = date("Y");

?>
<input type="hidden" id="id_reference" value="<?php echo $_GET['id']; ?>">

<!------MAIN-CONTENT-------->
<div class="main-content">
	<div class="slider-dashbord">
		<div class="content-navigation">
			<div class="angle">
				<div class="button pre-btn_slider"><i class="fas fa-angle-left"></i></div>
			</div>
			<div class="couvert-navigate">
				<ul class="navigation navigation_slider">
					<?php
						for ($date_row = $date_dashboard; $date_row >= 2024; $date_row--) {
						?>
					<li class="active_nav_click years" data-id="<?php echo $date_row; ?>">
						<a href="#">
							<span class="icon"><i class="fas fa-calendar"></i></span>
							<span class="text"><?php echo $date_row; ?></span>
						</a>
					</li>
					<?php
						}
						?>
				</ul>
			</div>
			<div class="angle">
				<div class="button nxt-btn_slider"><i class="fas fa-angle-right"></i></div>
			</div>
		</div>
		<div class="list">
			<div class="title-page">
				<h1>Tableau&nbsp;de&nbsp;bord</h1>
				<ol>
					<li><a href="#">Accueil |</a></li>
					<li><a href="#">Tableau de bord</a></li>
				</ol>
			</div>
			<div class="item">
				<div class="thumbnail">
					<div class="container3D">
						<div class="parent">
							<div class="card">
								<div class="content-box">
									<h1 class="card-title">Bailleur</h1>
									<div class="card-content">
										<div class="circle circle1" data-degree="0" data-color="#0088ff">
											<h2 class="number">0<span></span></h2>
											<h4 id=""></h4>
										</div>
									</div>
									<span style="display: none;" class="see-more">See More</span>
								</div>
								<div class="date-box">
									<span class="month"></span>
									<span class="date"><i class="fa fa-user"></i></span>
								</div>
							</div>
						</div>
						<div class="parent">
							<div class="card">
								<div class="content-box">
									<h1 class="card-title">Locataire</h1>
									<div class="card-content">
										<div class="circle circle2" data-degree="0" data-color="#0088ff">
											<h2 class="number">0<span></span></h2>
											<h4 id=""></h4>
										</div>
									</div>
									<span style="display: none;" class="see-more">See More</span>
								</div>
								<div class="date-box">
									<span class="month"></span>
									<span class="date"><i class="fa fa-users"></i></span>
								</div>
							</div>
						</div>
						<div class="parent">
							<div class="card">
								<div class="content-box">
									<h1 class="card-title">Contrat</h1>
									<div class="card-content">
										<div class="circle circle3" data-degree="0" data-color="#0088ff">
											<h2 class="number">0<span></span></h2>
											<h4 id=""></h4>
										</div>
									</div>
									<span style="display: none;" class="see-more">See More</span>
								</div>
								<div class="date-box">
									<span class="month"></span>
									<span class="date"><i class="fas fa-file-contract"></i></span>
								</div>
							</div>
						</div>
						<div class="parent">
							<div class="card">
								<div class="content-box">
									<h1 class="card-title">Bien</h1>
									<div class="card-content">
										<div class="circle circle4" data-degree="0" data-color="#0088ff">
											<h2 class="number">0<span></span></h2>
											<h4 id=""></h4>
										</div>
									</div>
									<span style="display: none;" class="see-more">See More</span>
								</div>
								<div class="date-box">
									<span class="month"></span>
									<span class="date"><i class="fas fa-building"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="card4">
						<div class="card4-box center">
							<div class="card1-content center">
								<div class="number">
									<div class="border-radius">
										<div class="step"><?php echo $date_dashboard ?></div>
										<div class="no1"><i class="fa fa-sort-numeric-down"></i></div>
									</div>
								</div>
								<div class="text-and-icon">
									<div class="icon"><i class="fa fa-file"></i></div>
									<div class="text">
										<h1>Loyer</h1>
									</div>
									<div class="montant" id="montant_loyer">0</div>
								</div>
							</div>
						</div>
						<div class="card4-box center">
							<div class="card1-content card1-content2 center">
								<div class="number">
									<div class="border-radius border-radius2">
										<div class="step"><?php echo $date_dashboard ?></div>
										<div class="no1"><i class="fa fa-sort-numeric-down"></i></div>
									</div>
								</div>
								<div class="text-and-icon">
									<div class="icon"><i class="fa fa-file-import fa-rotate-90"></i></div>
									<div class="text">
										<h1>Commission</h1>
									</div>
									<div class="montant" id="commission">0</div>
								</div>
							</div>
						</div>
						<div class="card4-box center">
							<div class="card1-content card1-content3 center">
								<div class="number">
									<div class="border-radius border-radius3">
										<div class="step"><?php echo $date_dashboard ?></div>
										<div class="no1"><i class="fa fa-sort-numeric-down"></i></div>
									</div>
								</div>
								<div class="text-and-icon">
									<div class="icon"><i class="fa fa-file-export"></i></div>
									<div class="text">
										<h1>A reverser</h1>
									</div>
									<div class="montant" id="reverser">0</div>
								</div>
							</div>
						</div>
						<div class="card4-box center">
							<div class="card1-content card1-content4 center">
								<div class="number">
									<div class="border-radius border-radius4">
										<div class="step"><?php echo $date_dashboard ?></div>
										<div class="no1"><i class="fa fa-sort-numeric-down"></i></div>
									</div>
								</div>
								<div class="text-and-icon">
									<div class="icon"><i class="fa fa-money-bill"></i></div>
									<div class="text">
										<h1>Dépense</h1>
									</div>
									<div class="montant" id="montant_depense">0</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container-chart">
						<input type="radio" name="slide" id="c1" checked>
						<label for="c1" class="card">
							<div class="content-chart">
								<div class="sous-chart-js" id="sous-chart-js1">
									<canvas id="barChart1"></canvas>
								</div>
							</div>
							<div class="row">
								<div class="icon">1</div>
								<div class="description">
									<h4>Montant loyer</h4>
								</div>
							</div>
						</label>
						<input type="radio" name="slide" id="c2">
						<label for="c2" class="card">
							<div class="content-chart">
								<div class="sous-chart-js" id="sous-chart-js2">
									<canvas id="barChart2"></canvas>
								</div>
							</div>
							<div class="row">
								<div class="icon">2</div>
								<div class="description">
									<h4>Montant commission</h4>
								</div>
							</div>
						</label>
						<input type="radio" name="slide" id="c3">
						<label for="c3" class="card">
							<div class="content-chart">
								<div class="sous-chart-js" id="sous-chart-js3">
									<canvas id="barChart3"></canvas>
								</div>
							</div>
							<div class="row">
								<div class="icon">3</div>
								<div class="description">
									<h4>Montant à reverser</h4>
								</div>
							</div>
						</label>
						<input type="radio" name="slide" id="c4">
						<label for="c4" class="card">
							<div class="content-chart">
								<div class="sous-chart-js" id="sous-chart-js4">
									<canvas id="barChart4"></canvas>
								</div>
							</div>
							<div class="row">
								<div class="icon">4</div>
								<div class="description">
									<h4>Dépense</h4>
								</div>
							</div>
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
<!---------tableau1-modal---------->
<div class="grand close-modal" id="tableau1-modal">
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
						<label class="label-details">Periode du <span class="required-required">*</span></label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar  fa-icon"></i></span>
							<input type="month" class="text-input contrat9 input-required1"
								placeholder="Cotisation amicale" id="date_du1">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">Au</label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar fa-icon"></i></span>
							<input type="month" class="text-input contrat10 input-required1" id="date_au1">

						</div>
					</div>
					<div class="input-group">
						<label class="label-details">&nbsp;</label>
						<div class="input-box">
							<button type="submit" class="footer-button-export" id="Exporttableau1">EXCEL</button>
							<button type="submit" class="footer-button-export" id="ExportdataPdf1">PDF</button>
						</div>
					</div>
				</div>
				<div class="tb_tableau1">
					<table id="example1" class="stripe hover mytab" style="width:100%;" data-order='[[1,"desc"]]'>
						<thead>
							<tr>
								<th class="no-export">Photo</th>
								<th>#</th>
								<th>Nom bailleur</th>
								<th>Telephone</th>
								<th>Nom du bien</th>
								<th>Periode</th>
								<th>Valeur locative</th>
								<th>Montant du loyer</th>
								<th>Commission</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
						<tfoot>
							<tr>
								<th class="no-export"></th>
								<th>Total</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="footer-modal">
				<button type="button" class="footer-button-close close-modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!---------tableau2-modal---------->
<div class="grand close-modal" id="tableau2-modal">
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
						<label class="label-details">Periode du <span class="required-required">*</span></label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar  fa-icon"></i></span>
							<input type="month" class="text-input contrat9 input-required1" name="amicale"
								placeholder="Cotisation amicale" id="date_du2" required
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">Au</label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar fa-icon"></i></span>
							<input type="month" class="text-input contrat10 input-required1" name="tabaski"
								id="date_au2" placeholder="Retenue tabaski"
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">&nbsp;</label>
						<div class="input-box">
							<button type="submit" class="footer-button-export" id="Exporttableau2">EXCEL</button>
							<button type="submit" class="footer-button-export" id="ExportdataPdf2">PDF</button>
						</div>
					</div>
				</div>
				<div class="tb_tableau2">
					<table id="example2" class="stripe hover mytab" style="width:100%;" data-order='[[0,"desc"]]'>
						<thead>
							<tr>
								<th class="no-export">Photo</th>
								<th>Date</th>
								<th>Nom bien</th>
								<th>Type depense</th>
								<th>Prestataire</th>
								<th>Telephone</th>
								<th>Charge</th>
								<th>Montant depense</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<tr>
								<th class="no-export"></th>
								<th>Total</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="footer-modal">
				<button type="button" class="footer-button-close close-modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!---------tableau3-modal---------->
<div class="grand close-modal" id="tableau3-modal">
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
						<label class="label-details">Periode du <span class="required-required">*</span></label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar  fa-icon"></i></span>
							<input type="month" class="text-input contrat9 input-required1" name="amicale"
								placeholder="Cotisation amicale" id="mois3" required
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">Au</label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar fa-icon"></i></span>
							<input type="month" class="text-input contrat10 input-required1" name="tabaski"
								id="date_au3" placeholder="Retenue tabaski"
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">&nbsp;</label>
						<div class="input-box">
							<button type="submit" class="footer-button-export" id="Exporttableau3">EXCEL</button>
							<button type="submit" class="footer-button-export" id="ExportdataPdf3">PDF</button>
						</div>
					</div>
				</div>
				<div class="tb_tableau3">
				</div>
			</div>
			<div class="footer-modal">
				<button type="button" class="footer-button-close close-modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!---------tableau4-modal---------->
<div class="grand close-modal" id="tableau4-modal">
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
						<label class="label-details">Periode du <span class="required-required">*</span></label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar  fa-icon"></i></span>
							<input type="month" class="text-input contrat9 input-required1" name="amicale"
								placeholder="Cotisation amicale" id="mois4" required
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">Au</label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar fa-icon"></i></span>
							<input type="month" class="text-input contrat10 input-required1" name="tabaski"
								id="date_au4" placeholder="Retenue tabaski"
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">&nbsp;</label>
						<div class="input-box">
							<button type="submit" class="footer-button-export" id="Exporttableau4">EXCEL</button>
							<button type="submit" class="footer-button-export" id="ExportdataPdf4">PDF</button>
						</div>
					</div>
				</div>
				<div class="tb_tableau4">
				</div>
			</div>
			<div class="footer-modal">
				<button type="button" class="footer-button-close close-modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!---------tableau5-modal---------->
<div class="grand close-modal" id="tableau5-modal">
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
						<label class="label-details">Periode du <span class="required-required">*</span></label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar  fa-icon"></i></span>
							<input type="month" class="text-input contrat9 input-required1" name="amicale"
								placeholder="Cotisation amicale" id="mois5" required
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">Au</label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar fa-icon"></i></span>
							<input type="month" class="text-input contrat10 input-required1" name="tabaski"
								id="date_au5" placeholder="Retenue tabaski"
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">&nbsp;</label>
						<div class="input-box">
							<button type="submit" class="footer-button-export" id="Exporttableau5">EXCEL</button>
							<button type="submit" class="footer-button-export" id="ExportdataPdf5">PDF</button>
						</div>
					</div>
				</div>
				<div class="tb_tableau5">
				</div>
			</div>
			<div class="footer-modal">
				<button type="button" class="footer-button-close close-modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!---------tableau5-modal---------->
<div class="grand close-modal" id="tableau6-modal">
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
						<label class="label-details">Periode du <span class="required-required">*</span></label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar  fa-icon"></i></span>
							<input type="month" class="text-input contrat9 input-required1" name="amicale"
								placeholder="Cotisation amicale" id="mois6" required
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">Au</label>
						<div class="input-box">
							<span class="span-left"><i class="fa fa-calendar fa-icon"></i></span>
							<input type="month" class="text-input contrat10 input-required1" name="tabaski"
								id="date_au6" placeholder="Retenue tabaski"
								onkeyup="this.value=this.value.charAt(0).toUpperCase()+this.value.substr(1);">
						</div>
					</div>
					<div class="input-group">
						<label class="label-details">&nbsp;</label>
						<div class="input-box">
							<button type="submit" class="footer-button-export" id="Exporttableau6">EXCEL</button>
							<button type="submit" class="footer-button-export" id="ExportdataPdf6">PDF</button>
						</div>
					</div>
				</div>
				<div class="tb_tableau6">
				</div>
			</div>
			<div class="footer-modal">
				<button type="button" class="footer-button-close close-modal">Fermer</button>
			</div>
		</div>
	</div>
</div>
<!------FOOTER-------->
<?php
	include("../include/footer.php");
	?>

<script>
let hr = document.querySelector('#hr');
let mn = document.querySelector('#mn');
let sc = document.querySelector('#sc');
setInterval(() => {
	let day = new Date()
	let hh = day.getHours() * 30;
	let mm = day.getMinutes() * 6;
	let ss = day.getSeconds() * 6;
	hr.style.transform = `rotateZ(${hh+(mm/12)}deg)`;
	mn.style.transform = `rotateZ(${mm}deg)`;
	sc.style.transform = `rotateZ(${ss}deg)`;

	//DIGITAL CLOCK
	let hours = document.getElementById('hours');
	let minutes = document.getElementById('minutes');
	let seconds = document.getElementById('seconds');
	let ampn = document.getElementById('ampn');

	let h = new Date().getHours();
	let m = new Date().getMinutes();
	let s = new Date().getSeconds();
	h = (h < 10) ? "0" + h : h
	m = (m < 10) ? "0" + m : m
	s = (s < 10) ? "0" + s : s
	hours.innerHTML = h;
	minutes.innerHTML = m;
	seconds.innerHTML = s;
})

$(document).ready(function() {


});

$('.navigation_slider li:first-of-type').addClass("active_nav");
//empty the main div and re-append the ordered divs

$(document).on('click', '.slide', function(e) {
	e.preventDefault();
	var years = $(this).data('id');
	$(".slide").removeClass("changeColor")
	$(".years_" + years).addClass("changeColor")
	$(".step").html(years);
})
$(document).ready(function() {
	var id = $('#id_reference').val();

	var date = <?php echo $date_dashboard; ?>

	$.ajax({
		url: "../controller/dashboard/donnee",
		method: "POST",
		data: {
			id: id,
			date: date
		},
		dataType: "JSON",
		success: function(data) {
			console.log(data)
			$(".circle1").attr("data-degree", data.pourcentage_bailleur)
			$(".circle2").attr("data-degree", data.pourcentage_locataire)
			$(".circle3").attr("data-degree", data.pourcentage_contrat)
			$(".circle4").attr("data-degree", data.pourcentage_bien)
			$("#bailleur").html(data.bailleur);
			$("#locataire").html(data.locataire);
			$("#contrat").html(data.contrat);
			$("#bien").html(data.bien);
			$("#commission").html(data.commission);
			$("#reverser").html(data.reverser);
			$("#montant_loyer").html(data.montant_loyer);
			$("#montant_depense").html(data.montant_depense);

			let circle = document.querySelectorAll('.circle')
			circle.forEach(function(progress) {
				let degree = 0;
				var targetDegree = parseInt(progress.getAttribute('data-degree'));
				let color = progress.getAttribute('data-color');
				let number = progress.querySelector('.number');
				var interval = setInterval(function() {
					degree += 1;
					if (degree > targetDegree) {
						clearInterval(interval);
						return;
					}
					progress.style.background =
						`conic-gradient(${color} ${degree}%, #222 0%)`;
					if (targetDegree < 10) {
						target = "0" + targetDegree;
					} else {
						target = targetDegree;
					}
					number.innerHTML = target;
					number.style.color = color;
				}, 50)
			})
		}
	})

})

$(document).ready(function() {
	var id = $('#id_reference').val();

	var date = <?php echo $date_dashboard; ?>

	$.ajax({
		url: "../controller/statistique/state1",
		method: "POST",
		data: {
			id: id,
			date: date
		},
		dataType: "JSON",
		success: function(data) {
			console.log(data)
			var mois = [];
			var commission = [];
			var reverser = [];
			var montant_loyer = [];
			var date_depense = [];
			var montant_depense = [];
			for (var count_0 = 0; count_0 < data[0].length; count_0++) {
				mois.push(data[0][count_0].mois);
				commission.push(data[0][count_0].commission);
				reverser.push(data[0][count_0].reverser);
				montant_loyer.push(data[0][count_0].montant_loyer);
			}
			for (var count_1 = 0; count_1 < data[1].length; count_1++) {
				date_depense.push(data[1][count_1].date_depense);
				montant_depense.push(data[1][count_1].montant_depense);
			}
			Chart.defaults.global.defaultFontFamilly = "Poppins";
			new Chart("barChart1", {
				type: "bar",
				data: {
					labels: mois,
					datasets: [{
						label: "loyer",
						backgroundColor: "#de2525",
						data: montant_loyer
					}]
				},
				options: {
					maintainAspectRatio: false,

					title: {
						display: true,
						text: `Loyer ${date}`
					},
					legend: {
						position: 'top'
					},
					y: {
						stacked: true,
						grid: {
							display: true,
							color: "rgba(255,99,132,0.2)"
						}
					},
					x: {
						grid: {
							display: false
						}
					}
				}
			})
			new Chart("barChart2", {
				type: "bar",
				data: {
					labels: mois,
					datasets: [{
						label: "Commission",
						backgroundColor: "#808000",
						data: commission
					}]
				},
				options: {
					maintainAspectRatio: false,

					title: {
						display: true,
						text: `Commission ${date}`
					},
					legend: {
						position: 'top'
					},
					y: {
						stacked: true,
						grid: {
							display: true,
							color: "rgba(255,99,132,0.2)"
						}
					},
					x: {
						grid: {
							display: false
						}
					}
				}
			})
			new Chart("barChart3", {
				type: "bar",
				data: {
					labels: mois,
					datasets: [{
						label: "Reverser",
						backgroundColor: "#123d8e",
						data: reverser
					}]
				},
				options: {
					maintainAspectRatio: false,

					title: {
						display: true,
						text: `Reverser ${date}`
					},
					legend: {
						position: 'top'
					},
					y: {
						stacked: true,
						grid: {
							display: true,
							color: "rgba(255,99,132,0.2)"
						}
					},
					x: {
						grid: {
							display: false
						}
					}
				}
			})
			new Chart("barChart4", {
				type: "bar",
				data: {
					labels: date_depense,
					datasets: [{
						label: "Dépense",
						backgroundColor: "#0d6e80",
						data: montant_depense
					}]
				},
				options: {
					maintainAspectRatio: false,

					title: {
						display: true,
						text: `Dépense ${date}`
					},
					legend: {
						position: 'top'
					},
					y: {
						stacked: true,
						grid: {
							display: true,
							color: "rgba(255,99,132,0.2)"
						}
					},
					x: {
						grid: {
							display: false
						}
					}
				}
			})

		}
	})
});
</script>

<script>
//------------BOUTTON CLICK---------------//
$(document).on('click', '.years', function(e) {
	e.preventDefault()
	//---------LINE------------//
	var id = $('#id_reference').val();
	var date = $(this).data('id');
	$(".step").html(date);
	$(".fetch_annee").html(date);
	$(".sous-chart-js").html("")
	$("#sous-chart-js1").html('<canvas id="barChart1"></canvas>')
	$("#sous-chart-js2").html('<canvas id="barChart2"></canvas>')
	$("#sous-chart-js3").html('<canvas id="barChart3"></canvas>')
	$("#sous-chart-js4").html('<canvas id="barChart4"></canvas>')
	$.ajax({
		url: "../controller/dashboard/donnee",
		method: "POST",
		data: {
			id: id,
			date: date
		},
		dataType: "JSON",
		success: function(data) {
			console.log(data)
			$("#bailleur").html(data.bailleur);
			$("#locataire").html(data.locataire);
			$("#contrat").html(data.contrat);
			$("#bien").html(data.bien);
			$("#commission").html(data.commission);
			$("#reverser").html(data.reverser);
			$("#montant_loyer").html(data.montant_loyer);
			$("#montant_depense").html(data.montant_depense);
		}
	})

	$.ajax({
		url: "../controller/statistique/state1",
		method: "POST",
		data: {
			id: id,
			date: date
		},
		dataType: "JSON",
		success: function(data) {
			console.log(data)
			var mois = [];
			var commission = [];
			var reverser = [];
			var montant_loyer = [];
			var date_depense = [];
			var montant_depense = [];
			for (var count_0 = 0; count_0 < data[0].length; count_0++) {
				mois.push(data[0][count_0].mois);
				commission.push(data[0][count_0].commission);
				reverser.push(data[0][count_0].reverser);
				montant_loyer.push(data[0][count_0].montant_loyer);
			}
			for (var count_1 = 0; count_1 < data[1].length; count_1++) {
				date_depense.push(data[1][count_1].date_depense);
				montant_depense.push(data[1][count_1].montant_depense);
			}
			Chart.defaults.global.defaultFontFamilly = "Poppins";
			new Chart("barChart1", {
				type: "bar",
				data: {
					labels: mois,
					datasets: [{
						label: "loyer",
						backgroundColor: "#de2525",
						data: montant_loyer
					}]
				},
				options: {
					maintainAspectRatio: false,

					title: {
						display: true,
						text: `Loyer ${date}`
					},
					legend: {
						position: 'top'
					},
					y: {
						stacked: true,
						grid: {
							display: true,
							color: "rgba(255,99,132,0.2)"
						}
					},
					x: {
						grid: {
							display: false
						}
					}
				}
			})
			new Chart("barChart2", {
				type: "bar",
				data: {
					labels: mois,
					datasets: [{
						label: "Commission",
						backgroundColor: "#808000",
						data: commission
					}]
				},
				options: {
					maintainAspectRatio: false,

					title: {
						display: true,
						text: `Commission ${date}`
					},
					legend: {
						position: 'top'
					},
					y: {
						stacked: true,
						grid: {
							display: true,
							color: "rgba(255,99,132,0.2)"
						}
					},
					x: {
						grid: {
							display: false
						}
					}
				}
			})
			new Chart("barChart3", {
				type: "bar",
				data: {
					labels: mois,
					datasets: [{
						label: "Reverser",
						backgroundColor: "#123d8e",
						data: reverser
					}]
				},
				options: {
					maintainAspectRatio: false,

					title: {
						display: true,
						text: `Reverser ${date}`
					},
					legend: {
						position: 'top'
					},
					y: {
						stacked: true,
						grid: {
							display: true,
							color: "rgba(255,99,132,0.2)"
						}
					},
					x: {
						grid: {
							display: false
						}
					}
				}
			})
			new Chart("barChart4", {
				type: "bar",
				data: {
					labels: date_depense,
					datasets: [{
						label: "Dépense",
						backgroundColor: "#0d6e80",
						data: montant_depense
					}]
				},
				options: {
					maintainAspectRatio: false,

					title: {
						display: true,
						text: `Dépense ${date}`
					},
					legend: {
						position: 'top'
					},
					y: {
						stacked: true,
						grid: {
							display: true,
							color: "rgba(255,99,132,0.2)"
						}
					},
					x: {
						grid: {
							display: false
						}
					}
				}
			})


		}
	})

});
// DATE 1
$(document).ready(function() {
	var id = $('#id_reference').val();
	var date = <?php echo $date_dashboard; ?>;
	var date_du1 = $('#date_du1').val();
	var date_au1 = $('#date_au1').val();
	$.ajax({
		url: "../controller/statistique/tableau1",
		method: "POST",
		data: {
			id: id,
			date: date,
			date_du1: date_du1,
			date_au1: date_au1
		},
		//dataType: "JSON",
		success: function(response) {
			$('#example1 tbody').html(""); //insérer le texte de test.php dans votre div
			var gp_data = $.parseJSON(response);
			for (var b = 0; b < gp_data.length; b++) {
				$('#example1 tbody').append(`
			               <tr>
			             	<td style="text-align:center;" class="no-export"><img src="${gp_data[b].photob}" alt="" width="30" height="30"></td>
			             	<td style="text-align:center;">${gp_data[b].numero}</td>
			             	<td style="text-align:center;">${gp_data[b].nom_bailleur}</td>
			             	<td style="text-align:center;">${gp_data[b].telephoneb}</td>
			             	<td style="text-align:center;">${gp_data[b].nom_bien}</td>
			             	<td style="text-align:center;">${gp_data[b].mois}</td>
			             	<td style="text-align:center;">${gp_data[b].valeur_locative}</td>
			             	<td style="text-align:center;">${gp_data[b].montant}</td>
			             	<td style="text-align:center;">${gp_data[b].commission}</td>
			               </tr>
						`);
			}
			$("#example1").DataTable({

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
				footerCallback: function(tfoot, data, start, end, display) {
					var api = this.api();
					$(api.column(6).footer()).html(
						api.column(6, {
							page: 'current'
						}).data().reduce(function(a, b) {
							var intVal = function(i) {
								return typeof i === 'string' ?
									i.replace(/\,/g, '.').replace(
										/[^\d.-]/g, '') * 1 :
									typeof i === 'number' ?
									i : 0;
							};
							return intVal(a) + intVal(b);

						}, 0).toLocaleString("fi-FI", {
							minimumFractionDigits: 3,
							maximumFractionDigits: 3
						})
					);
					$(api.column(7).footer()).html(
						api.column(7, {
							page: 'current'
						}).data().reduce(function(a, b) {
							var intVal = function(i) {
								return typeof i === 'string' ?
									i.replace(/\,/g, '.').replace(
										/[^\d.-]/g, '') * 1 :
									typeof i === 'number' ?
									i : 0;
							};
							return intVal(a) + intVal(b);

						}, 0).toLocaleString("fi-FI", {
							minimumFractionDigits: 3,
							maximumFractionDigits: 3
						})
					);
					$(api.column(8).footer()).html(
						api.column(8, {
							page: 'current'
						}).data().reduce(function(a, b) {
							var intVal = function(i) {
								return typeof i === 'string' ?
									i.replace(/\,/g, '.').replace(
										/[^\d.-]/g, '') * 1 :
									typeof i === 'number' ?
									i : 0;
							};
							return intVal(a) + intVal(b);

						}, 0).toLocaleString("fi-FI", {
							minimumFractionDigits: 3,
							maximumFractionDigits: 3
						})
					);

				}
			});

		},
	})
	$('#date_du1').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var date_du1 = $('#date_du1').val();
		var date_au1 = $('#date_au1').val();
		$("#example1").dataTable().fnDestroy()
		$.ajax({
			url: "../controller/statistique/tableau1",
			method: "POST",
			data: {
				id: id,
				date: date,
				date_du1: date_du1,
				date_au1: date_au1
			},
			//dataType: "JSON",
			success: function(response) {
				$('#example1 tbody').html(""); //insérer le texte de test.php dans votre div
				var gp_data = $.parseJSON(response);
				for (var b = 0; b < gp_data.length; b++) {
					$('#example1 tbody').append(`
			               <tr>
			             	<td style="text-align:center;" class="no-export"><img src="${gp_data[b].photob}" alt="" width="30" height="30"></td>
			             	<td style="text-align:center;">${gp_data[b].numero}</td>
			             	<td style="text-align:center;">${gp_data[b].nom_bailleur}</td>
			             	<td style="text-align:center;">${gp_data[b].telephoneb}</td>
			             	<td style="text-align:center;">${gp_data[b].nom_bien}</td>
			             	<td style="text-align:center;">${gp_data[b].mois}</td>
			             	<td style="text-align:center;">${gp_data[b].valeur_locative}</td>
			             	<td style="text-align:center;">${gp_data[b].montant}</td>
			             	<td style="text-align:center;">${gp_data[b].commission}</td>
			               </tr>
						`);
				}
				$("#example1").DataTable({

					lengthMenu: [
						[10, 25, 50, 250, -1],
						[10, 25, 50, 250, "Tous"]
					],
					layout: {
						topStart: {
							buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5',
								'pdfHtml5'
							]
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
					footerCallback: function(tfoot, data, start, end, display) {
						var api = this.api();
						$(api.column(6).footer()).html(
							api.column(6, {
								page: 'current'
							}).data().reduce(function(a, b) {
								var intVal = function(i) {
									return typeof i === 'string' ?
										i.replace(/\,/g, '.')
										.replace(/[^\d.-]/g, '') *
										1 :
										typeof i === 'number' ?
										i : 0;
								};
								return intVal(a) + intVal(b);

							}, 0).toLocaleString("fi-FI", {
								minimumFractionDigits: 3,
								maximumFractionDigits: 3
							})
						);
						$(api.column(7).footer()).html(
							api.column(7, {
								page: 'current'
							}).data().reduce(function(a, b) {
								var intVal = function(i) {
									return typeof i === 'string' ?
										i.replace(/\,/g, '.')
										.replace(/[^\d.-]/g, '') *
										1 :
										typeof i === 'number' ?
										i : 0;
								};
								return intVal(a) + intVal(b);

							}, 0).toLocaleString("fi-FI", {
								minimumFractionDigits: 3,
								maximumFractionDigits: 3
							})
						);
						$(api.column(8).footer()).html(
							api.column(8, {
								page: 'current'
							}).data().reduce(function(a, b) {
								var intVal = function(i) {
									return typeof i === 'string' ?
										i.replace(/\,/g, '.')
										.replace(/[^\d.-]/g, '') *
										1 :
										typeof i === 'number' ?
										i : 0;
								};
								return intVal(a) + intVal(b);

							}, 0).toLocaleString("fi-FI", {
								minimumFractionDigits: 3,
								maximumFractionDigits: 3
							})
						);

					}
				});
			}
		})
	})
	$('#date_au1').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var date_du1 = $('#date_du1').val();
		var date_au1 = $('#date_au1').val();
		$("#example1").dataTable().fnDestroy()
		$.ajax({
			url: "../controller/statistique/tableau1",
			method: "POST",
			data: {
				id: id,
				date: date,
				date_du1: date_du1,
				date_au1: date_au1
			},
			//dataType: "JSON",
			success: function(response) {
				$('#example1 tbody').html(""); //insérer le texte de test.php dans votre div
				var gp_data = $.parseJSON(response);
				for (var b = 0; b < gp_data.length; b++) {
					$('#example1 tbody').append(`
			               <tr>
			             	<td style="text-align:center;" class="no-export"><img src="${gp_data[b].photob}" alt="" width="30" height="30"></td>
			             	<td style="text-align:center;">${gp_data[b].numero}</td>
			             	<td style="text-align:center;">${gp_data[b].nom_bailleur}</td>
			             	<td style="text-align:center;">${gp_data[b].telephoneb}</td>
			             	<td style="text-align:center;">${gp_data[b].nom_bien}</td>
			             	<td style="text-align:center;">${gp_data[b].mois}</td>
			             	<td style="text-align:center;">${gp_data[b].valeur_locative}</td>
			             	<td style="text-align:center;">${gp_data[b].montant}</td>
			             	<td style="text-align:center;">${gp_data[b].commission}</td>
			               </tr>
						`);
				}
				$("#example1").DataTable({

					lengthMenu: [
						[10, 25, 50, 250, -1],
						[10, 25, 50, 250, "Tous"]
					],
					layout: {
						topStart: {
							buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5',
								'pdfHtml5'
							]
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
					footerCallback: function(tfoot, data, start, end, display) {
						var api = this.api();
						$(api.column(6).footer()).html(
							api.column(6, {
								page: 'current'
							}).data().reduce(function(a, b) {
								var intVal = function(i) {
									return typeof i === 'string' ?
										i.replace(/\,/g, '.')
										.replace(/[^\d.-]/g, '') *
										1 :
										typeof i === 'number' ?
										i : 0;
								};
								return intVal(a) + intVal(b);

							}, 0).toLocaleString("fi-FI", {
								minimumFractionDigits: 3,
								maximumFractionDigits: 3
							})
						);
						$(api.column(7).footer()).html(
							api.column(7, {
								page: 'current'
							}).data().reduce(function(a, b) {
								var intVal = function(i) {
									return typeof i === 'string' ?
										i.replace(/\,/g, '.')
										.replace(/[^\d.-]/g, '') *
										1 :
										typeof i === 'number' ?
										i : 0;
								};
								return intVal(a) + intVal(b);

							}, 0).toLocaleString("fi-FI", {
								minimumFractionDigits: 3,
								maximumFractionDigits: 3
							})
						);
						$(api.column(8).footer()).html(
							api.column(8, {
								page: 'current'
							}).data().reduce(function(a, b) {
								var intVal = function(i) {
									return typeof i === 'string' ?
										i.replace(/\,/g, '.')
										.replace(/[^\d.-]/g, '') *
										1 :
										typeof i === 'number' ?
										i : 0;
								};
								return intVal(a) + intVal(b);

							}, 0).toLocaleString("fi-FI", {
								minimumFractionDigits: 3,
								maximumFractionDigits: 3
							})
						);

					}
				});
			}
		})
	})
})
//DATE 2
$(document).ready(function() {
	var id = $('#id_reference').val();
	var date = <?php echo $date_dashboard; ?>;
	var date_du2 = $('#date_du2').val();
	var date_au2 = $('#date_au2').val();
	$.ajax({
		url: "../controller/statistique/tableau2",
		method: "POST",
		data: {
			id: id,
			date: date,
			date_du2: date_du2,
			date_au2: date_au2
		},
		//dataType: "JSON",
		success: function(response) {
			$('#example2 tbody').html(""); //insérer le texte de test.php dans votre div
			var gp_data = $.parseJSON(response);
			for (var b = 0; b < gp_data.length; b++) {
				$('#example2 tbody').append(`
			                <tr>
				             <td style="text-align:center;" class="no-export"><img src="${gp_data[b].photo_bien}" alt="" width="30" height="30"></td>
				             <td style="text-align:center;">${gp_data[b].date_depense}</td>
				             <td style="text-align:center;">${gp_data[b].nom_bien}</td>
				             <td style="text-align:center;">${gp_data[b].type_depense}</td>
				             <td style="text-align:center;">${gp_data[b].prestataire}</td>
				             <td style="text-align:center;">${gp_data[b].telephone_prestataire}</td>
				             <td style="text-align:center;">${gp_data[b].charge_depense}</td>
							 <td style="text-align:center;">${gp_data[b].montant_depense}</td>
			                </tr>
						`);
			}
			$("#example2").DataTable({
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
				footerCallback: function(tfoot, data, start, end, display) {
					var api = this.api();
					$(api.column(7).footer()).html(
						api.column(7, {
							page: 'current'
						}).data().reduce(function(a, b) {
							var intVal = function(i) {
								return typeof i === 'string' ?
									i.replace(/\,/g, '.').replace(
										/[^\d.-]/g, '') * 1 :
									typeof i === 'number' ?
									i : 0;
							};
							return intVal(a) + intVal(b);

						}, 0).toLocaleString("fi-FI", {
							minimumFractionDigits: 3,
							maximumFractionDigits: 3
						})
					);
				}
			});

		},
	})
	$('#date_du2').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var date_du2 = $('#date_du2').val();
		var date_au2 = $('#date_au2').val();
		$("#example2").dataTable().fnDestroy()
		$.ajax({
			url: "../controller/statistique/tableau2",
			method: "POST",
			data: {
				id: id,
				date: date,
				date_du2: date_du2,
				date_au2: date_au2
			},
			//dataType: "JSON",
			success: function(response) {
				$('#example2 tbody').html(""); //insérer le texte de test.php dans votre div
				var gp_data = $.parseJSON(response);
				for (var b = 0; b < gp_data.length; b++) {
					$('#example2 tbody').append(`
			                <tr>
				             <td style="text-align:center;" class="no-export"><img src="${gp_data[b].photo_bien}" alt="" width="30" height="30"></td>
				             <td style="text-align:center;">${gp_data[b].date_depense}</td>
				             <td style="text-align:center;">${gp_data[b].nom_bien}</td>
				             <td style="text-align:center;">${gp_data[b].type_depense}</td>
				             <td style="text-align:center;">${gp_data[b].prestataire}</td>
				             <td style="text-align:center;">${gp_data[b].telephone_prestataire}</td>
				             <td style="text-align:center;">${gp_data[b].charge_depense}</td>
							 <td style="text-align:center;">${gp_data[b].montant_depense}</td>
			                </tr>
						`);
				}
				$("#example2").DataTable({
					lengthMenu: [
						[10, 25, 50, 250, -1],
						[10, 25, 50, 250, "Tous"]
					],
					layout: {
						topStart: {
							buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5',
								'pdfHtml5'
							]
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
					footerCallback: function(tfoot, data, start, end, display) {
						var api = this.api();
						$(api.column(7).footer()).html(
							api.column(7, {
								page: 'current'
							}).data().reduce(function(a, b) {
								var intVal = function(i) {
									return typeof i === 'string' ?
										i.replace(/\,/g, '.')
										.replace(/[^\d.-]/g, '') *
										1 :
										typeof i === 'number' ?
										i : 0;
								};
								return intVal(a) + intVal(b);

							}, 0).toLocaleString("fi-FI", {
								minimumFractionDigits: 3,
								maximumFractionDigits: 3
							})
						);
					}
				});

			},
		})
	})
	$('#date_au2').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var date_du2 = $('#date_du2').val();
		var date_au2 = $('#date_au2').val();
		$("#example2").dataTable().fnDestroy()
		$.ajax({
			url: "../controller/statistique/tableau2",
			method: "POST",
			data: {
				id: id,
				date: date,
				date_du2: date_du2,
				date_au2: date_au2
			},
			//dataType: "JSON",
			success: function(response) {
				$('#example2 tbody').html(""); //insérer le texte de test.php dans votre div
				var gp_data = $.parseJSON(response);
				for (var b = 0; b < gp_data.length; b++) {
					$('#example2 tbody').append(`
			                <tr>
				             <td style="text-align:center;" class="no-export"><img src="${gp_data[b].photo_bien}" alt="" width="30" height="30"></td>
				             <td style="text-align:center;">${gp_data[b].date_depense}</td>
				             <td style="text-align:center;">${gp_data[b].nom_bien}</td>
				             <td style="text-align:center;">${gp_data[b].type_depense}</td>
				             <td style="text-align:center;">${gp_data[b].prestataire}</td>
				             <td style="text-align:center;">${gp_data[b].telephone_prestataire}</td>
				             <td style="text-align:center;">${gp_data[b].charge_depense}</td>
							 <td style="text-align:center;">${gp_data[b].montant_depense}</td>

			                </tr>
						`);
				}
				$("#example2").DataTable({
					scrollX: true,
					lengthMenu: [
						[10, 25, 50, 250, -1],
						[10, 25, 50, 250, "Tous"]
					],
					layout: {
						topStart: {
							buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5',
								'pdfHtml5'
							]
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
					footerCallback: function(tfoot, data, start, end, display) {
						var api = this.api();
						$(api.column(7).footer()).html(
							api.column(7, {
								page: 'current'
							}).data().reduce(function(a, b) {
								var intVal = function(i) {
									return typeof i === 'string' ?
										i.replace(/\,/g, '.')
										.replace(/[^\d.-]/g, '') *
										1 :
										typeof i === 'number' ?
										i : 0;
								};
								return intVal(a) + intVal(b);

							}, 0).toLocaleString("fi-FI", {
								minimumFractionDigits: 3,
								maximumFractionDigits: 3
							})
						);
					}
				});

			},
		})
	})
})
//DATE 3
$(document).ready(function() {
	var id = $('#id_reference').val();
	var date = <?php echo $date_dashboard; ?>;
	var mois3 = $('#mois3').val();
	var date_au3 = $('#date_au3').val();
	$.ajax({
		url: "../controller/statistique/tableau3",
		method: "POST",
		data: {
			id: id,
			date: date,
			mois3: mois3,
			date_au3: date_au3
		},
		//dataType: "JSON",
		success: function(data) {
			console.log(data)
			$(".tb_tableau3").html(data);
		}
	})
	$('#mois3').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var mois3 = $('#mois3').val();
		var date_au3 = $('#date_au3').val();
		$.ajax({
			url: "../controller/statistique/tableau3",
			method: "POST",
			data: {
				id: id,
				date: date,
				mois3: mois3,
				date_au3: date_au3
			},
			//dataType: "JSON",
			success: function(data) {
				console.log(data)
				$(".tb_tableau3").html(data);
			}
		})
	})
	$('#date_au3').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var mois3 = $('#mois3').val();
		var date_au3 = $('#date_au3').val();
		$.ajax({
			url: "../controller/statistique/tableau3",
			method: "POST",
			data: {
				id: id,
				date: date,
				mois3: mois3,
				date_au3: date_au3
			},
			//dataType: "JSON",
			success: function(data) {
				console.log(data)
				$(".tb_tableau3").html(data);
			}
		})
	})
})
//DATE 4
$(document).ready(function() {
	var id = $('#id_reference').val();
	var date = <?php echo $date_dashboard; ?>;
	var mois4 = $('#mois4').val();
	var date_au4 = $('#date_au4').val();
	$.ajax({
		url: "../controller/statistique/tableau4",
		method: "POST",
		data: {
			id: id,
			date: date,
			mois4: mois4,
			date_au4: date_au4
		},
		//dataType: "JSON",
		success: function(data) {
			console.log(data)
			$(".tb_tableau4").html(data);
		}
	})
	$('#mois4').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var mois4 = $('#mois4').val();
		var date_au4 = $('#date_au4').val();
		$.ajax({
			url: "../controller/statistique/tableau4",
			method: "POST",
			data: {
				id: id,
				date: date,
				mois4: mois4,
				date_au4: date_au4
			},
			//dataType: "JSON",
			success: function(data) {
				console.log(data)
				$(".tb_tableau4").html(data);
			}
		})
	})
	$('#date_au4').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var mois4 = $('#mois4').val();
		var date_au4 = $('#date_au4').val();
		$.ajax({
			url: "../controller/statistique/tableau4",
			method: "POST",
			data: {
				id: id,
				date: date,
				mois4: mois4,
				date_au4: date_au4
			},
			//dataType: "JSON",
			success: function(data) {
				console.log(data)
				$(".tb_tableau4").html(data);
			}
		})
	})
})
//DATE 5
$(document).ready(function() {
	var id = $('#id_reference').val();
	var date = <?php echo $date_dashboard; ?>;
	var mois5 = $('#mois5').val();
	var date_au5 = $('#date_au5').val();
	$.ajax({
		url: "../controller/statistique/tableau5",
		method: "POST",
		data: {
			id: id,
			date: date,
			mois5: mois5,
			date_au5: date_au5
		},
		//dataType: "JSON",
		success: function(data) {
			console.log(data)
			$(".tb_tableau5").html(data);
		}
	})
	$('#mois5').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var mois5 = $('#mois5').val();
		var date_au5 = $('#date_au5').val();
		$.ajax({
			url: "../controller/statistique/tableau5",
			method: "POST",
			data: {
				id: id,
				date: date,
				mois5: mois5,
				date_au5: date_au5
			},
			//dataType: "JSON",
			success: function(data) {
				console.log(data)
				$(".tb_tableau5").html(data);
			}
		})
	})
	$('#date_au5').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var mois5 = $('#mois5').val();
		var date_au5 = $('#date_au5').val();
		$.ajax({
			url: "../controller/statistique/tableau5",
			method: "POST",
			data: {
				id: id,
				date: date,
				mois5: mois5,
				date_au5: date_au5
			},
			//dataType: "JSON",
			success: function(data) {
				console.log(data)
				$(".tb_tableau5").html(data);
			}
		})
	})
})
//DATE 6
$(document).ready(function() {
	var id = $('#id_reference').val();
	var date = <?php echo $date_dashboard; ?>;
	var mois6 = $('#mois6').val();
	var date_au6 = $('#date_au6').val();
	$.ajax({
		url: "../controller/statistique/tableau6",
		method: "POST",
		data: {
			id: id,
			date: date,
			mois6: mois6,
			date_au6: date_au6
		},
		//dataType: "JSON",
		success: function(data) {
			console.log(data)
			$(".tb_tableau6").html(data);
		}
	})
	$('#mois6').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var mois6 = $('#mois6').val();
		var date_au6 = $('#date_au6').val();
		$.ajax({
			url: "../controller/statistique/tableau6",
			method: "POST",
			data: {
				id: id,
				date: date,
				mois6: mois6,
				date_au6: date_au6
			},
			//dataType: "JSON",
			success: function(data) {
				console.log(data)
				$(".tb_tableau6").html(data);
			}
		})
	})
	$('#date_au6').on('input', function(e) {
		var id = $('#id_reference').val();
		var date = <?php echo $date_dashboard; ?>;
		var mois6 = $('#mois6').val();
		var date_au6 = $('#date_au6').val();
		$.ajax({
			url: "../controller/statistique/tableau6",
			method: "POST",
			data: {
				id: id,
				date: date,
				mois6: mois6,
				date_au6: date_au6
			},
			//dataType: "JSON",
			success: function(data) {
				console.log(data)
				$(".tb_tableau6").html(data);
			}
		})
	})
	$(document).on('click', '#download1', function(e) {
		domtoimage.toBlob(document.getElementById('div-graphique1')).then(function(blob) {
			window.saveAs(blob, 'Loyer.png')
		})
	})

	$('#ExportdataPdf1').click(function() {
		let table = $("#example1").clone();
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
		doc.save('Rapport-loyer')
	})
	$('#Exporttableau1').click(function() {
		let table = $("#example1").clone();
		console.log(table);
		table.find(".no-export").each(function() {
			$(this).remove();
		});
		TableToExcel.convert(table[0], {
			name: `Rapport-loyer.xlsx`,
			sheet: {
				name: 'Rapport-loyer'
			}
		});
	});
	$('#ExportdataPdf2').click(function() {
		let table = $("#example2").clone();
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
		doc.save('Rapport-dépense')
	})
	$('#Exporttableau2').click(function() {
		let table = $("#example2").clone();
		console.log(table);
		table.find(".no-export").each(function() {
			$(this).remove();
		});
		TableToExcel.convert(table[0], {
			name: `Rapport-dépense.xlsx`,
			sheet: {
				name: 'Rapport-dépense'
			}
		});
	});
	$('#ExportdataPdf3').click(function() {
		let table = $("#example3").clone();
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
		doc.save('Charges salariales')
	})
	$('#Exporttableau3').click(function() {
		let table = $("#example3").clone();
		console.log(table);
		table.find(".no-export").each(function() {
			$(this).remove();
		});
		TableToExcel.convert(table[0], {
			name: `Charges salariales.xlsx`,
			sheet: {
				name: 'Charges salariales'
			}
		});
	});
	$('#ExportdataPdf4').click(function() {
		let table = $("#example4").clone();
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
		doc.save('Charges patronales')
	})
	$('#Exporttableau4').click(function() {
		let table = $("#example4").clone();
		console.log(table);
		table.find(".no-export").each(function() {
			$(this).remove();
		});
		TableToExcel.convert(table[0], {
			name: `Charges patronales.xlsx`,
			sheet: {
				name: 'Charges patronales'
			}
		});
	});
	$('#ExportdataPdf5').click(function() {
		let table = $("#example5").clone();
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
		doc.save('Cotisation')
	})
	$('#Exporttableau5').click(function() {
		let table = $("#example5").clone();
		console.log(table);
		table.find(".no-export").each(function() {
			$(this).remove();
		});
		TableToExcel.convert(table[0], {
			name: `Cotisation.xlsx`,
			sheet: {
				name: 'Cotisation'
			}
		});
	});
	$('#ExportdataPdf6').click(function() {
		let table = $("#example6").clone();
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
		doc.save('Prime')
	})
	$('#Exporttableau6').click(function() {
		let table = $("#example6").clone();
		console.log(table);
		table.find(".no-export").each(function() {
			$(this).remove();
		});
		TableToExcel.convert(table[0], {
			name: `Prime.xlsx`,
			sheet: {
				name: 'Prime'
			}
		});
	});
})
</script>
<?php } else {
	header("Location:../");
} ?>