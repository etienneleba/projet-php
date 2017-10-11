<?php

require_once '../bdd.php';


$values = [
  'AR_NOM' => 'nom',
];

$bdd = new Bdd();
$bdd->connect();
$fours = $bdd->query('SELECT * FROM CDI_FOURNISSEUR');

if ( !empty($_POST["nom"]) && !empty($_POST["poids"]) && !empty($_POST["couleur"])&& !empty($_POST["stock"])
	&& !empty($_POST["pa"])&& !empty($_POST["pv"]))
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
		echo '<p style="color:#C60800;">vous n\'avez pas remplis le formulaire intégralement</p>';
}
	

?>

<?php require_once '../header.php'; ?>


    <form action="" method="post">
        <div class="form-group">
            <label for="nom">Nom : </label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $values['CL_NOM'] ?>">
        </div>
        <select name="four" class="custom-select">
            <?php
            foreach ($fours as $four) {
                if($values['FO_NUMERO'] == utf8_encode($four['FO_NUMERO'])) {
                    echo '<option value="'.utf8_encode($four['FO_NUMERO']).'" selected>'.utf8_encode($four['FO_NOM']).'</option>';
                } else {

                    echo '<option value="'.utf8_encode($four['FO_NUMERO']).'">'.utf8_encode($four['FO_NOM']).'</option>';
                 }
            }

            ?>
        </select>
    </form>

<?php require_once '../footer.php'; ?>