<?php

require_once '../bdd.php';

if ( !empty($_POST["num_commande"]) && !empty($_POST["date_commande"]))
{
	
	

	$num = $_POST['num_commande'];  
	$date = $_POST['date_commande'];
	
	if (isset($_POST['valider']))
	$reset = $_POST['valider'];

	echo "NUM : $num <br/>";
	echo "DATE : $date <br/>";
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
    <title>Commande | ADD </title>
</head>
<body>

<form action="" method="post">
<p>
	Entrez une nouvelle commande:
</p>

<p>
    <input type="text" name="num_commande" placeholder="numéro de la commande"/>
</p>
<p>
	<input type="text" name="date_commande" placeholder="date de la commande"/>
	<input type="submit" value="Valider" name="valider"/>
</p>
</form>




</body>
</html>