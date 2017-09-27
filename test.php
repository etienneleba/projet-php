<?php
require_once "bdd.php";


$bdd = new bdd();
$bdd->connect();

$articles = $bdd->query('SELECT * FROM CDI_ARTICLE');



foreach ($articles as $article) {
    echo $article['AR_NOM'];
    echo '<br>';
}

?>