<!--PHP CODE-->

<?php

require_once '../bdd.php';
require_once '../correction.php';


$verif = new Verification();

$bdd = new Bdd();
$bdd->connect();


$values = array(
    'CL_NUMERO' => $bdd->getMaxId('CDI_CLIENT', 'CL'),
    'CL_NOM' => isset ($_POST['nom'])? $verif->verifEtCorrectionNom($_POST['nom']) : false,
    'CL_PRENOM' => isset ($_POST['prenom'])? $verif->verifEtCorrectionPrenom($_POST['prenom']) : false,
    'CL_PAYS' => isset ($_POST['pays'])? $_POST['pays']: '',
    'CL_LOCALITE' => isset ($_POST['localite'])? $verif->verifEtCorrectionLocalite($_POST['localite']) : false,
    'CL_TYPE' => 'Particulier',

);



if($values['CL_NUMERO']!=false
&& $values['CL_PRENOM']!=false
    &&$values['CL_NOM']!=false
    &&$values['CL_PAYS']!=false
    &&$values['CL_LOCALITE']!=false
    &&$values['CL_TYPE']!=false) {


    $bdd->insert('CDI_CLIENT', $values);
    $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
}
elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
    $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
}

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
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php if(!$values['CL_NOM']){echo '';} ?>">
    </div>
    <div class="form-group">
            <label for="prenom">Prenom : </label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $values['CL_PRENOM'] ?>">
    </div>
    <div class="form-group">
            <label for="nom">Pays : </label><br>
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
        <label for="localite">Localité : </label>
        <input type="text" class="form-control" id="localite" name="localite" value="<?php echo $values['CL_LOCALITE'] ?>">
    </div>
    <input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>

</form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'?>
