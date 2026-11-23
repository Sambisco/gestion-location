<?php 
include('../../include/connect.php');
include('../../include/config.php');
setlocale(LC_TIME, 'french.UTF-8', 'fr_FR.UTF-8');

if(isset($_POST["id"]))
{
 $id=encryptor('decrypt',$_POST['id']);
   $date= trim($_POST["date"]);
    $data1 = array();
    $data2 = array();
    $query = "SELECT *,SUM(montant) AS montant_loyer, SUM(commission) AS commission,SUM(montant-commission) AS reverser FROM loyer 
  INNER JOIN contrat ON contrat.id_contrat=loyer.id_contrat 
  INNER JOIN bien ON bien.id_bien=contrat.id_bien 
  INNER JOIN locataire ON locataire.id_locataire=contrat.id_locataire 
  INNER JOIN reference ON reference.id_reference=locataire.id_reference
 WHERE reference.id_reference='$id' AND DATE_FORMAT(loyer.mois,'%Y')='$date' GROUP BY DATE_FORMAT(loyer.mois,'%m-%Y')";
    $statement=$db->prepare($query);
	$statement->execute();
$result=$statement->fetchAll();
    foreach($result as $row)
    {
       
        $data1[] = array(
            'mois'=> ucfirst(strftime('%B', strtotime($row["mois"]))),
            'commission'=>$row["commission"],
            'reverser'=>$row["reverser"],
            'montant_loyer'=>$row["montant_loyer"],
        );
    }

    $query = "SELECT *,SUM(montant_depense) AS montant_depense FROM depense 
INNER JOIN bien ON bien.id_bien=depense.id_bien
INNER JOIN bailleur ON bailleur.id_bailleur=bien.id_bailleur
INNER JOIN reference ON reference.id_reference=bailleur.id_reference
 WHERE reference.id_reference='$id' AND DATE_FORMAT(depense.date_depense,'%Y')='$date' GROUP BY DATE_FORMAT(depense.date_depense,'%m-%Y')";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {

        $data2[] = array(
            'date_depense' => ucfirst(strftime('%B', strtotime($row["date_depense"]))),
            'montant_depense' => $row["montant_depense"],
        );
    }
    echo json_encode(array($data1,$data2));

}

      ?>

