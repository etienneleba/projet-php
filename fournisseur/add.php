<?php

require_once '../bdd.php';

if ( !empty($_POST["num_fournisseur"]) && !empty($_POST["nom_fournisseur"]))
{
	
	

	$num = $_POST['num_fournisseur'];  
	$nom = $_POST['nom_fournisseur'];
	
	if (isset($_POST['valider']))
	$reset = $_POST['valider'];

	echo "NUM : $num <br/>";
	echo "NOM : $nom <br/>";
}
else
{
		echo '<p style="color:#C60800;">vous n\'avez pas remplis le formulaire intégralement</p>';
}
	

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" type="image/ico" href="img/favicon.gif" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Fournisseur | ADD </title>
</head>
<body>

<form action="" method="post">
<p>
	Entrez un nouveau fournisseur:
</p>

<p>
    <input type="text" name="num_fournisseur" placeholder="numéro du fournisseur"/>
</p>
<p>
	<input type="text" name="nom_fournisseur" placeholder="nom du fournisseur"/>
	<input type="submit" value="Valider" name="valider"/>
</p>
</form>




</body>
</html>