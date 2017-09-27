<?php
require_once "bdd.php";


$bdd = new bdd();
$bdd->connect();

$articles = $bdd->query('SELECT * FROM CDI_ARTICLE');


?>