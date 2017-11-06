<?php

require_once '../bdd.php';
require_once '../correction.php';

$verif = new Verification();

$bdd = new Bdd();
$bdd->connect();
$bdd->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->getBdd()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$clients = $bdd->queryAll('SELECT * FROM CDI_CLIENT');
$magasins = $bdd->queryAll('SELECT * FROM CDI_MAGASIN');

$values = array(
  'CO_NUMERO' => $bdd->getMaxId('CDI_COMMANDE','CO'),
  'MA_NUMERO' => isset($_POST['magasin'])? $_POST['magasin']: false,
  'CL_NUMERO' => isset($_POST['client'])? $_POST['client']: false,
  'CO_DATE' => isset ($_POST['date'])? $_POST['date']: false,
);

	if ( $values['CO_NUMERO']!=false
		 &&$values['MA_NUMERO']!=false
		 &&$values['CL_NUMERO']!=false
		 &&$values['CO_DATE']!=false){

        $bdd->insert('CDI_COMMANDE', $values);
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
            <label for="nom">Client : </label><br>
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
	</div>
	<div class="form-group">
            <label for="nom">Magasin : </label><br>
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
	</div>
	<div class="form-group">
        <label for="nom">Date : </label>
        <input type="date" class="form-control" id="date" name="date" value="<?php echo $values['CO_DATE'] ?>">
	</div>
	<input type="hidden" value="true" name="test">
    <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

<!--INLCUDE FOOTER-->
<?php require_once '../footer.php'; ?>