<?php

require_once '../bdd.php';

if ( !empty($_POST["nom_article"]) && !empty($_POST["num_article"]) && !empty($_POST["poids_article"])&& !empty($_POST["couleur_article"])&& !empty($_POST["stock_article"])
	&& !empty($_POST["pa_article"])&& !empty($_POST["pv_article"]))
{
	
	

	$num = $_POST['num_article'];  
	$nom = $_POST['nom_article'];
	$poids = $_POST['poids_article'];
	$couleur = $_POST['couleur_article'];
	$stock = $_POST['stock_article'];
	$pa = $_POST['pa_article'];
	$pv = $_POST['pv_article'];
	
	if (isset($_POST['valider']))
	$reset = $_POST['valider'];

	echo "NUM : $num <br/>";
	echo "NOM : $nom <br/>";
	echo "POIDS : $poids <br/>";
	echo "COULEUR : $couleur <br/>";
	echo "STOCK : $stock <br/>";
	echo "PA : $pa <br/>";
	echo "PV : $pv <br/>";
	
	
}
else
{
		echo '<p style="color:#C60800;">vous avez mal remplis votre formulaire</p>';
}
	

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" type="image/ico" href="img/favicon.gif" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Article | ADD </title>
</head>
<body>

<form action="" method="post">
<p>
	Entrez un nouvel article:
</p>

<p>
    <input type="text" name="num_article" placeholder="numéro de l'article"/>
</p>
<p>
	<input type="text" name="nom_article" placeholder="nom de l'article"/>
</p>
<p>
    <input type="text" name="poids_article" placeholder="poids de l'article"/>
</p>
<p>
    <input type="text" name="couleur_article" placeholder="couleur de l'article"/>
</p>
<p>
    <input type="text" name="stock_article" placeholder="stock de l'article"/>
</p>
<p>
    <input type="text" name="pa_article" placeholder="pa de l'article"/>
</p>
<p>
    <input type="text" name="pv_article" placeholder="prix de vente de l'article"/>
	<input type="submit" value="Valider" name="valider"/>
</p>
</form>




</body>
</html>