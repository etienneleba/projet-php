<?php
/*require_once "bdd.php";


$bdd = new bdd();
$bdd->connect();

//$bdd->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$bdd->getBdd()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//$stmt = $bdd->getBdd()->prepare("INSERT CDI_CLIENT (CL_NUMERO, CL_NOM, CL_PRENOM, CL_PAYS, CL_LOCALITE, CL_TYPE) VALUES (:CL_NUMERO, :CL_NOM, :CL_PRENOM, :CL_PAYS, :CL_LOCALITE, :CL_TYPE)");


$values = array(
    'CL_NUMERO' => 21,
    'CL_NOM' => 'GERARD',
    'CL_PRENOM' => 'PAUL',
    'CL_PAYS' => 'F',
    'CL_LOCALITE' => 'CAEN',
    'CL_TYPE' => 'Particulier',

);

$bdd->insert('CDI_CLIENT', $values);
*/


require 'correction.php';

$prenom="harvey";
$nom="roberts";
$localite="étédae";
$verif=new Verification();
$prenom=$verif->VerifEtCorrectionPrenom($prenom);
$nom=$verif->VerifEtCorrectionNom($nom);
$localite=$verif->VerifEtCorrectionLocalite($localite);



?>