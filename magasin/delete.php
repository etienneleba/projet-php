<!--PHP CODE-->

<?php

require_once '../bdd.php';
$bdd = new Bdd();
$bdd->connect();
$bdd->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->getBdd()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(isset($_GET['id'])){
$id=$_GET['id'];
}


$bdd->deleter('CDI_MAGASIN','MA',$id);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;

?>