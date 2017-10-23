<?php
/*require_once "bdd.php";


$bdd = new bdd();
$bdd->connect();
$bdd->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->getBdd()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

*/
echo '<PRE>';
//var_dump($_SERVER);
echo $_SERVER["HTTP_REFERER"];
echo '</PRE>';
?>