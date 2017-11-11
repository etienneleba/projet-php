<!--PHP CODE-->

<?php

require_once '../bdd.php';
require_once '../correction.php';


$verif = new Verification();

$bdd = new Bdd();
$bdd->connect();


$values = array(

    'MA_NUMERO' => $bdd->getMaxId('CDI_MAGASIN','MA'),
    'MA_LOCALITE' => isset ($_POST['localite'])? $verif->verifEtCorrectionLocalite($_POST['localite']) : false,
    'MA_GERANT' => isset ($_POST['nom'])&& isset($_POST['prenom']) && $verif->verifEtCorrectionNom($_POST['nom'])!= false && $verif->verifEtCorrectionPrenom($_POST['prenom'])!=false ? $verif->verifEtCorrectionNom($_POST['nom']) . '  ' . $verif->verifEtCorrectionPrenom($_POST['prenom']) : false,
);

if($values['MA_NUMERO']!=false
	&&$values['MA_LOCALITE']!=false
	&&$values['MA_GERANT']!=false) {


    $bdd->insert('CDI_MAGASIN', $values);
    $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
}
elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
    $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
}
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
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo isset ($_POST['nom'])? $_POST['nom']: '' ?>">
    </div>
    <div class="form-group">
            <label for="prenom">Prenom : </label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo  isset ($_POST['prenom'])? $_POST['prenom']: ''?>">
    </div>
    <div class="form-group">
        <label for="localite">Localité : </label>
        <input type="text" class="form-control" id="localite" name="localite" value="<?php echo $values['MA_LOCALITE'] ?>">
    </div>
    <input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>

</form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'?>
