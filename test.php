<?php
/*require_once "bdd.php";


$bdd = new bdd();
$bdd->connect();
$bdd->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->getBdd()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$values = array(

    'CL_PRENOM' => 'PAULO',
    'CL_PAYS' => 'F',
    'CL_LOCALITE' => 'CAEN',
    'CL_TYPE' => 'Particulier',

);

$bdd->update('CDI_CLIENT', $values, array('CL_NUMERO' => 21));*/
$var="AEÉŬ";
$var=mb_strtolower($var);
echo $var;


?>