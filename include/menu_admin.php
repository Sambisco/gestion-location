<li>
	<a href="../page/reference?id=<?php echo $id_m; ?>">
		<i class="fas fa-fw fa-tachometer-alt"></i>
		<span class="link-name">Tableau de bord</span>
	</a>
	<ul class="sub-menu blank">
		<li><a class="link-name" href="#">Tableau de bord</a></li>
	</ul>
</li>
<?php if ($result["id_ref"] == null) {
} else { ?>
	<li>
		<div class="iocn-link">
			<a href="#">
				<i class="fa fa-fw fa-coins"></i>
				<span class="link-name">Siege</span>
			</a>
			<i class="fa fa-chevron-down arrow"></i>
		</div>
		<ul class="sub-menu">
			<li><a class="link-name" href="#">Siege</a></li>
			<li><a href="../page/siege?id=<?php echo $id_m; ?>">Siege</a></li>
		</ul>
	</li>
<?php } ?>
