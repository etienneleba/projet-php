<!--PHP CODE-->

<?php

require_once '../bdd.php';
require_once '../correction.php';


$verif = new Verification();


$bdd = new Bdd();
$bdd->connect();
$bdd->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->getBdd()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$values = array(

    'FO_NUMERO' => $bdd->getMaxId('CDI_FOURNISSEUR','FO'),
    'FO_NOM' => isset ($_POST['fournisseur'])? $verif->verifEtCorrectionNom($_POST['fournisseur']) : false,

);

if($values['FO_NUMERO']!=false
   &&$values['FO_NOM']!=false) {


    $bdd->insert('CDI_FOURNISSEUR', $values);
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
        <label for="fournisseur">Fournisseur : </label>
        <input type="text" class="form-control" id="fournisseur" name="fournisseur" value="<?php echo $values['FO_NOM'] ?>">
    </div>
    <input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>

</form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'?>