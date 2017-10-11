<!--PHP CODE-->

<?php

require_once '../bdd.php';
//require_onde '..correction.php';
$bdd = new Bdd();
$bdd->connect();
$bdd->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->getBdd()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(isset($_POST['fournisseur']) && !empty($_POST['fournisseur'])) {

$client = array(

    'CL_NUMERO' => '1',
    'CL_NOM' => isset ($_POST['nom'])? $_POST['nom']: '',
	'CL_PRENOM' => isset ($_POST['prenom'])? $_POST['prenom']: '',
	'CL_PAYS' => isset ($_POST['pays'])? $_POST['pays']: '',
	'CL_LOCALITE' => isset ($_POST['localite'])? $_POST['localite']: '',
	'CL_TYPE' => isset ($_POST['type'])? $_POST['type']: '',

);

    //$bdd->update('CDI_CLIENT', $client);
    $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
}
elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
    $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
}

$client = $bdd->query('SELECT * FROM CDI_CLIENT WHERE CL_NUMERO=\'F07\'');


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
        <label for="numéro">Numéro : <?php echo $fournisseur['FO_NUMERO'] ?> </label>
    </div>
    <div class="form-group">
        <label for="fournisseur">Fournisseur : </label>
        <input type="text" class="form-control" id="fournisseur" name="fournisseur" value="<?php echo $fournisseur['FO_NOM'] ?>">
    </div>
    <input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>

</form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'?>