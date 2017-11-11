<!--PHP CODE-->

<?php

require_once '../bdd.php';
require_once '../correction.php';

$verif = new Verification();


$bdd = new Bdd();
$bdd->connect();

if(isset($_GET['id'])){
$id=$_GET['id'];
}

if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['poids']) && !empty($_POST['poids'])&&isset($_POST['couleur']) && !empty($_POST['couleur'])
	&&isset($_POST['stock']) && !empty($_POST['stock'])&&isset($_POST['pa']) && !empty($_POST['pa'])&&isset($_POST['pv']) && !empty($_POST['pv'])) {

$article = array(

    
	'FO_NUMERO' => isset ($_POST['fournisseur'])? $_POST['fournisseur']: '',
	'AR_NOM' => isset ($_POST['nom'])? $verif->verifEtCorrectionNom($_POST['nom']) : false,
	'AR_POIDS' => isset ($_POST['poids'])? $_POST['poids']: '',
	'AR_COULEUR' => isset ($_POST['couleur'])? $verif->verifEtCorrectionNom($_POST['couleur']) : false,
	'AR_STOCK' => isset ($_POST['stock'])? $_POST['stock']: '',
	'AR_PA' => isset ($_POST['pa'])? $_POST['pa']: '',
	'AR_PV' => isset ($_POST['pv'])? $_POST['pv']: '',

);
    $bdd->update('CDI_ARTICLE', $article, array('AR_NUMERO'=> $id));
    $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
}
elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
    $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
}

$article = $bdd->query("SELECT * FROM CDI_ARTICLE WHERE AR_NUMERO='$id'");
$fours = $bdd->queryAll('SELECT * FROM CDI_FOURNISSEUR');

?>


<!--INCLUDE HEADER-->
<?php require_once '../header.php'?>


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
        <label for="numéro">Numéro : <?php echo $article['AR_NUMERO'] ?> </label>
    </div>
	<select name="fournisseur" class="custom-select">
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
	<div class="form-group">
        <label for="nom">Nom: </label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $article['AR_NOM'] ?>">
    </div>
	<div class="form-group">
        <label for="poids">Poids: </label>
        <input type="text" class="form-control" id="poids" name="poids" value="<?php echo $article['AR_POIDS'] ?>">
    </div>
	<div class="form-group">
        <label for="couleur">Couleur: </label>
        <input type="text" class="form-control" id="couleur" name="couleur" value="<?php echo $article['AR_COULEUR'] ?>">
    </div>
	<div class="form-group">
        <label for="stock">Stock: </label>
        <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $article['AR_STOCK'] ?>">
    </div>
	<div class="form-group">
        <label for="pa">Pa: </label>
        <input type="text" class="form-control" id="pa" name="pa" value="<?php echo $article['AR_PA'] ?>">
    </div>
	<div class="form-group">
        <label for="pv">Pv: </label>
        <input type="text" class="form-control" id="pv" name="pv" value="<?php echo $article['AR_PV'] ?>">
    </div>
    <input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>

</form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'?>