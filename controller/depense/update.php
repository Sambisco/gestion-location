
<?php
include('../../include/connect.php');
include('../../include/config.php');
$timezone = "UTC";
date_default_timezone_set($timezone);
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');
$id=trim(encryptor('decrypt',$_POST['edit_id']));
$date_depense = trim($_POST['date_depense']);
$type_depense = trim($_POST['type_depense']);
$montant_depense = str_replace(',', '.', str_replace(' ', '', trim($_POST['montant_depense'])));
$prestataire = trim($_POST['prestataire']);
$telephone_prestataire = trim($_POST['telephone_prestataire']);
$charge_depense = trim($_POST['charge_depense']);

$query= "UPDATE depense SET date_depense=?,type_depense=?,montant_depense=?,prestataire=?,telephone_prestataire=?,charge_depense=? WHERE id_depense=?";
 $statement=$db->prepare($query);
$statement->execute(array($date_depense, $type_depense, $montant_depense, $prestataire, $telephone_prestataire, $charge_depense, $id));


?>