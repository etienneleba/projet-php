<?php

require_once '../bdd.php';
require_once '../correction.php';


$bdd = new Bdd();
$bdd->connect();
$bdd->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->getBdd()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$fours = $bdd->queryAll('SELECT * FROM CDI_FOURNISSEUR');

$values = array(
  'AR_NUMERO' => $bdd->getMaxId('CDI_ARTICLE','AR'),
  'FO_NUMERO' => isset($_POST['four'])? $_POST['four']: '',
  'AR_NOM' =>  isset ($_POST['nom'])? $_POST['nom']: '',
  'AR_POIDS' => isset ($_POST['poids'])? $_POST['poids']: '',
  'AR_COULEUR' => isset ($_POST['couleur'])? $_POST['couleur']: '',
  'AR_STOCK' => isset ($_POST['stock'])? $_POST['stock']: '',
  'AR_PA' => isset ($_POST['pa'])? $_POST['pa']: '',
  'AR_PV' => isset ($_POST['pv'])? $_POST['pv']: '',
);

if ( isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['poids']) && !empty($_POST['poids']) && isset($_POST['couleur']) && !empty($_POST['couleur']) && isset($_POST['stock']) && !empty($_POST['stock'])
	&& isset($_POST['pa']) && !empty($_POST['pa']) && isset($_POST['pv']) && !empty($_POST['pv'])) {
        $bdd->insert('CDI_ARTICLE', $values);
        $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
    }
    elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
        $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
    }
?>



<?php require_once '../header.php'; ?>

    <!--ALERT MESSAGE-->
<?php
if(isset($message['etat'])) {
    echo '<div class="alert alert-'.$message['etat'].' alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
    '.$message['message'].'</div>';
}
?>

<!--FORM-->
    <form action="" method="post">
       <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $values['AR_NOM'] ?>">
    </div>
	<div class="form-group">
            <label for="nom">Fournisseur : </label><br>
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
		 </div>
		<div class="form-group">
        <label for="nom">Poids : </label>
        <input type="number" class="form-control" id="poids" name="poids" value="<?php echo $values['AR_POIDS'] ?>">
		<div class="form-group">
        <label for="nom">Couleur : </label>
        <input type="text" class="form-control" id="couleur" name="couleur" value="<?php echo $values['AR_COULEUR'] ?>">
		</div>
		<div class="form-group">
        <label for="nom">Stock : </label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $values['AR_STOCK'] ?>">
		</div>
		<div class="form-group">
        <label for="nom">PA : </label>
        <input type="number" class="form-control" id="pa" name="pa" value="<?php echo $values['AR_PA'] ?>">
		</div>
		<div class="form-group">
        <label for="nom">PV : </label>
        <input type="number" class="form-control" id="pv" name="pv" value="<?php echo $values['AR_PV'] ?>">
		</div>
	<input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'; ?>