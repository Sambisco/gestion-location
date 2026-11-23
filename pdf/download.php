<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Télécharger</title>
	<link rel="stylesheet" href="css/style-contrat.css">
	<link rel="stylesheet" href="../css/fontawesome-free/css/all.min.css" crossorigin="anonymous">

</head>
<style>
	a {
		text-decoration: none;
	}
</style>

<body>
	<div class="download">
		<div class="text">
			Télécharger le le quittance du loyer
		</div>
		<a href="dowload_quittance?id=<?php echo $_GET['id'] ?>" class="button" id="pdf_download">
			<div class="button-telecharger">
				Télécharger
			</div>
			<div class="icon">
				<i class="fa fa-download"></i>
			</div>
		</a>
	</div>

</body>

</html>