<!--PHP CODE-->

<?php

require_once '../bdd.php';
$bdd = new Bdd();
$bdd->connect();


if(isset($_GET['id'])){
$id=$_GET['id'];
}


$bdd->deleter('CDI_MAGASIN','MA',$id);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;

?>