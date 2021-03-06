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

if(isset($_POST['nom']) && !empty($_POST['nom'])&&isset($_POST['prenom']) && !empty($_POST['prenom'])&&isset($_POST['pays']) && !empty($_POST['pays'])
	&&isset($_POST['localite']) && !empty($_POST['localite'])) {

$client = array(

    'CL_NOM' => isset ($_POST['nom'])? $verif->verifEtCorrectionNom($_POST['nom']) : false,
	'CL_PRENOM' => isset ($_POST['prenom'])? $verif->verifEtCorrectionPrenom($_POST['prenom']) : false,
	'CL_PAYS' => isset ($_POST['pays'])? $_POST['pays']: '',
	'CL_LOCALITE' => isset ($_POST['localite'])? $verif->verifEtCorrectionLocalite($_POST['localite']) : false,
	'CL_TYPE' => Particulier,

);

    $bdd->update('CDI_CLIENT', $client, array('CL_NUMERO'=> $id));
    $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
}
elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
    $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
}

$client = $bdd->query("SELECT * FROM CDI_CLIENT WHERE CL_NUMERO='$id'");
$pays = $bdd->queryAll('SELECT * FROM CDI_PAYS');

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
        <label for="numéro">Numéro : <?php echo $client['CL_NUMERO'] ?> </label>
    </div>
    <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $client['CL_NOM'] ?>">
    </div>
	<div class="form-group">
        <label for="prénom">Prénom: </label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $client['CL_PRENOM'] ?>">
    </div>
	<div class="form-group">
            <label for="pays">Pays : </label><br>
        <select name="pays" class="custom-select">
            <?php
            foreach ($pays as $p) {
                if($values['CL_PAYS'] == utf8_encode($p['alpha2'])) {
                    echo '<option value="'.utf8_encode($p['alpha2']).'" selected>'.utf8_encode($p['nom_fr_fr']).'</option>';
                } else {

                    echo '<option value="'.utf8_encode($p['alpha2']).'">'.utf8_encode($p['nom_fr_fr']).'</option>';
                }
            }

?>
        </select>

    </div>
	<div class="form-group">
        <label for="localité">Localité: </label>
        <input type="text" class="form-control" id="localite" name="localite" value="<?php echo $client['CL_LOCALITE'] ?>">
    </div>
	<div class="form-group">
        <label for="type">Type : <?php echo $client['CL_TYPE'] ?> </label>
    </div>
    <input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>

</form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'?>
