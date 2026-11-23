<?php
if ($_SESSION['profil'] == 'Salaire') {
?>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-money-bill"></i>
				<span class="link-name">Rémunération</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Rémunération</a></li>
			<li><a href="../page/indemnite_part?id=<?php echo $id_m; ?>">indemnite / Part</a>
			<li><a href="../page/heure_jour?id=<?php echo $id_m; ?>">jour / Heure</a>
			<li><a href="../page/cotisation?id=<?php echo $id_m; ?>">Cotisation</a>
			<li><a href="../page/salaire?id=<?php echo $id_m; ?>">Salaire</a></li>
			<li><a href="../page/paie_conge_annuel?id=<?php echo $id_m; ?>">Conge annuel</a></li>
			<li><a href="../page/paie_conge_maternite?id=<?php echo $id_m; ?>">Conge Maternite</a></li>
			<li><a href="../page/salaire_precedent?id=<?php echo $id_m; ?>">Annee precedente</a></li>
			<li><a href="../page/statistique_salaire?id=<?php echo $id_m; ?>">Statistique</a></li>
		</ul>
	</li>
<?php
}

if ($_SESSION['profil'] == 'Pointage') {
?>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-video"></i>
				<span class="link-name">Pointage</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Pointage</a></li>
			<li><a href="../page/pointeur?id=<?php echo $id_m; ?>&idu=<?php echo $_GET['idu']; ?>">Pointage</a>
			</li>
		</ul>
	</li>
<?php
} else {
}

if ($_SESSION['profil'] == 'Ressources humaines') {
?>
	<li>
		<a href="../page/dashboard?id=<?php echo $id_m; ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span class="link-name">Tableau de bord</span>
		</a>
		<ul class="sub-menu blank">
			<li><a class="link-name" href="#">Tableau de bord</a></li>
		</ul>
	</li>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-building"></i>
				<span class="link-name">Antenne&nbsp;Regionale</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Antenne Regionale</a></li>
			<li><a href="../page/region?id=<?php echo $id_m; ?>">Antenne Regionale</a>
			</li>
		</ul>
	</li>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-home"></i>
				<span class="link-name">Service</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Service</a></li>
			<li><a href="../page/departement?id=<?php echo $id_m; ?>">Service</a>
			</li>
		</ul>
	</li>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-question-circle"></i>
				<span class="link-name">Recruitement</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Recruitement</a></li>
			<li><a href="../page/employe?id=<?php echo $id_m; ?>">Recruitement</a>
			</li>
		</ul>
	</li>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-file-contract"></i>
				<span class="link-name">Contrat</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Contrat</a></li>
			<li><a href="../page/contrat?id=<?php echo $id_m; ?>">Contrat</a></li>
			<li><a href="../page/dmt?id=<?php echo $id_m; ?>">DMT</a></li>
		</ul>
	</li>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-users"></i>
				<span class="link-name">Employe</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Employe</a></li>
			<li><a href="../page/employe_actif?id=<?php echo $id_m; ?>">Employe</a>
			</li>
		</ul>
	</li>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-exclamation-triangle"></i>
				<span class="link-name">Depart</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Depart</a></li>
			<li><a href="../page/depart?id=<?php echo $id_m; ?>">Depart</a></li>
		</ul>
	</li>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-file-contract"></i>
				<span class="link-name">G.&nbsp;administratif</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">G. administratif</a></li>
			<li><a href="../page/attestation_travail?id=<?php echo $id_m; ?>">Attestation travail</a></li>
			<li><a href="../page/certificat_travail?id=<?php echo $id_m; ?>">Certificat travail</a>
			<li><a href="../page/domiciliation_salaire?id=<?php echo $id_m; ?>">Domiciliation salaire</a>
			<li><a href="../page/affectation?id=<?php echo $id_m; ?>">Affectation</a></li>
			<li><a href="../page/indemnite?id=<?php echo $id_m; ?>">Demande indemnite</a></li>
			<li><a href="../page/conge_annuel?id=<?php echo $id_m; ?>">Conge annuel</a></li>
			<li><a href="../page/conge_maternite?id=<?php echo $id_m; ?>">Conge maternite</a></li>
		</ul>
	</li>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-money-bill"></i>
				<span class="link-name">Rémunération</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Rémunération</a></li>
			<li><a href="../page/indemnite_part?id=<?php echo $id_m; ?>">indemnite / Part</a>
			<li><a href="../page/heure_jour?id=<?php echo $id_m; ?>">jour / Heure</a>
			<li><a href="../page/cotisation?id=<?php echo $id_m; ?>">Cotisation</a>
			<li><a href="../page/salaire?id=<?php echo $id_m; ?>">Salaire</a></li>
			<li><a href="../page/paie_conge_annuel?id=<?php echo $id_m; ?>">Conge annuel</a></li>
			<li><a href="../page/paie_conge_maternite?id=<?php echo $id_m; ?>">Conge Maternite</a></li>
			<li><a href="../page/salaire_precedent?id=<?php echo $id_m; ?>">Annee precedente</a></li>
			<li><a href="../page/statistique_salaire?id=<?php echo $id_m; ?>">Statistique</a></li>
		</ul>
	</li>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fas fa-fw fa-qrcode"></i>
				<span class="link-name">G. pointage</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">G. pointage</a></li>
			<li><a href="../page/gestion_pointage?id=<?php echo $id_m; ?>">Suivi pointage</a></li>
			<li><a href="../page/demande_absence?id=<?php echo $id_m; ?>">Demande Absence</a></li>
			<li><a href="../page/pointage?id=<?php echo $id_m; ?>">Pointage du jour</a></li>
		</ul>
	</li>
<?php
}
?>
<!------------PETIT MODAL---------------->

<!------FOOTER-------->