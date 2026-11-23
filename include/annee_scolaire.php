<?php function annee_scolaire_actuelle(){
$mois =date("m");
$annee_actuelle=date("Y");
if($mois>=12 && $mois<=12){
$annee1=$annee_actuelle;
$annee2=$annee_actuelle+1;
}else{
$annee1=$annee_actuelle-1;
$annee2=$annee_actuelle;
}
$annee_scolaire_actuelle=$annee1. "/" . $annee2;
return $annee_scolaire_actuelle;
}

 function nombre_annee_scolaire(){
 $annee_debut=2021;
$mois =date("m");
$annee_actuelle=date("Y");
if($mois>=12 && $mois<=12){
return($annee_actuelle-$annee_debut)+1;
}else{
return $annee_actuelle-$annee_debut;
}
}
function les_annee_scolaire($annee_debut=2021){
 $les_annee=array();
 for($i=1;$i<=nombre_annee_scolaire();$i++){
$annee_sc=($annee_debut+($i-1)) . "/" . ($annee_debut+$i);
$les_annee[]=$annee_sc;
}
return $les_annee;
}
?>