<!--PHP CODE-->

<?php

require_once '../bdd.php';
require_once '../correction.php';
$bdd = new Bdd();
$bdd->connect();



$verif = new Verification();

if(isset($_GET['id'])){
$id=$_GET['id'];
}

if(isset($_POST['localite']) && !empty($_POST['localite'])&&isset($_POST['gerant']) && !empty($_POST['gerant'])) {

$magasin = array(

	'MA_LOCALITE' => isset ($_POST['localite'])? $verif->verifEtCorrectionLocalite($_POST['localite']) : false,
	'MA_GERANT' => isset ($_POST['gerant'])? $verif->verifEtCorrectionNom($_POST['gerant']) : false,

);

    $bdd->update('CDI_MAGASIN', $magasin, array('MA_NUMERO'=>$id));
    $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
}
elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
    $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
}

$magasin = $bdd->query("SELECT * FROM CDI_MAGASIN WHERE MA_NUMERO='$id'");


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
        <label for="numéro">Numéro : <?php echo $magasin['MA_NUMERO'] ?> </label>
    </div>
	<div class="form-group">
        <label for="localité">Localité: </label>
        <input type="text" class="form-control" id="localite" name="localite" value="<?php echo $magasin['MA_LOCALITE'] ?>">
    </div>
		<div class="form-group">
        <label for="gérant">Gérant: </label>
        <input type="text" class="form-control" id="gerant" name="gerant" value="<?php echo $magasin['MA_GERANT'] ?>">
    </div>
    <input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>

</form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'?>