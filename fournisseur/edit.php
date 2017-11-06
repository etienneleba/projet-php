<!--PHP CODE-->

<?php

require_once '../bdd.php';
//require_onde '..correction.php';
$bdd = new Bdd();
$bdd->connect();
$bdd->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->getBdd()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(isset($_GET['id'])){
$id=$_GET['id'];
}

if(isset($_POST['fournisseur']) && !empty($_POST['fournisseur'])) {

$fournisseur = array(

    
    'FO_NOM' => isset ($_POST['fournisseur'])? $verif->verifEtCorrectionNom($_POST['fournisseur']) : false,

);


    $bdd->update('CDI_FOURNISSEUR', $fournisseur, array('FO_NUMERO'=>$id));

    $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
}
elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
    $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
}

$fournisseur = $bdd->query("SELECT * FROM CDI_FOURNISSEUR WHERE FO_NUMERO='$id'");

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