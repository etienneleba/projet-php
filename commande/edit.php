<!--PHP CODE-->

<?php

require_once '../bdd.php';
require_once '../correction.php';
$bdd = new Bdd();
$bdd->connect();

if(isset($_GET['id'])){
$id=$_GET['id'];
}

if(isset($_POST['date']) && !empty($_POST['date']) && isset($_POST['magasin']) && !empty($_POST['magasin'])&&isset($_POST['client']) && !empty($_POST['client'])) {

$commande = array(

    
	'MA_NUMERO' => isset ($_POST['magasin'])? $_POST['magasin']: '',
	'CL_NUMERO' => isset ($_POST['client'])? $_POST['client']: '',
	'CO_DATE' => isset ($_POST['date'])? $_POST['date']: '',

);
    $bdd->update('CDI_COMMANDE', $commande, array('CO_NUMERO'=> $id));
    $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
}
elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
    $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
}

$commande = $bdd->query("SELECT * FROM CDI_COMMANDE WHERE CO_NUMERO='$id'");
$clients = $bdd->queryAll('SELECT * FROM CDI_CLIENT');
$magasins = $bdd->queryAll('SELECT * FROM CDI_MAGASIN');

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
        <label for="numéro">Numéro : <?php echo $commande['CO_NUMERO'] ?> </label>
    </div>
	<select name="client" class="custom-select">
            <?php
            foreach ($clients as $client) {
                if($values['CL_NUMERO'] == utf8_encode($client['CL_NUMERO'])) {
                    echo '<option value="'.utf8_encode($client['CL_NUMERO']).'" selected>'.utf8_encode($client['CL_NOM']).'</option>';
                } else {

                    echo '<option value="'.utf8_encode($client['CL_NUMERO']).'">'.utf8_encode($client['CL_NOM']).'</option>';
              }
            }

            ?>
    </select>
		<select name="magasin" class="custom-select">
            <?php
            foreach ($magasins as $magasin) {
                if($values['MA_NUMERO'] == utf8_encode($magasin['MA_NUMERO'])) {
                    echo '<option value="'.utf8_encode($magasin['MA_NUMERO']).'" selected>'.utf8_encode($magasin['MA_GERANT']).'</option>';
                } else {

                    echo '<option value="'.utf8_encode($magasin['MA_NUMERO']).'">'.utf8_encode($magasin['MA_GERANT']).'</option>';
              }
            }

            ?>
    </select>
	<div class="form-group">
        <label for="nom">Date: </label>
        <input type="date" class="form-control" id="date" name="date" value="<?php echo $commande['CO_DATE'] ?>">
    </div>
    <input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>

</form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'?>