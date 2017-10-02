<?php

require_once '../bdd.php';

if ( !empty($_POST["num_magasin"]) && !empty($_POST["localite_magasin"]) && !empty($_POST["gerant_magasin"]))
{
	
	

	$num = $_POST['num_magasin'];  
	$localite = $_POST['localite_magasin'];
	$gerant = $_POST['gerant_magasin'];
	
	if (isset($_POST['valider']))
	$reset = $_POST['valider'];

	echo "NUM : $num <br/>";
	echo "LOCALITE : $localite <br/>";
	echo "GERANT: $gerant <br/>";
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
    <title>Magasin | ADD </title>
</head>
<body>

<form action="" method="post">
<p>
	Entrez un nouveau magasin:
</p>

<p>
    <input type="text" name="num_magasin" placeholder="numéro du magasin"/>
</p>
<p>
	<input type="text" name="localite_magasin" placeholder="localite du magasin"/>
</p>
<p>
	<input type="text" name="gerant_magasin" placeholder="gerant du magasin"/>
	<input type="submit" value="Valider" name="valider"/>
</p>
</form>




</body>
</html>