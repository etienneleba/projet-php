<!--PHP CODE-->

<?php

require_once '../bdd.php';
$bdd = new Bdd();
$bdd->connect();
ini_set('display_errors',1);

if(isset($_GET['id'])){
    $id=$_GET['id'];
}


$bdd->deleter('CDI_COMMANDE','CO',$id);
$bdd->getBdd()->exec("DELETE FROM CDI_LIVRAISON WHERE `CO_NUMERO`='".$id."'");



header('Location: '.$_SERVER['HTTP_REFERER']);
exit;

?>
