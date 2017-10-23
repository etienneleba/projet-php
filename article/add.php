<?php

require_once '../bdd.php';



$bdd = new Bdd();
$bdd->connect();
$fours = $bdd->queryAll('SELECT * FROM CDI_FOURNISSEUR');

$values = array(
  'AR_NUMERO' => $bdd->getMaxId('CDI_ARTICLE','AR'),
  'FO_NUMERO' => $_POST['four'],
  'AR_NOM' => $_POST['nom'],
  'AR_POIDS' => $_POST['poids'],
  'AR_COULEUR' => $_POST['couleur'],
  'AR_STOCK' => $_POST['stock'],
);

if ( isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['poids']) && !empty($_POST['poids']) && isset($_POST['couleur']) && !empty($_POST['couleur']) && isset($_POST['stock']) && !empty($_POST['stock']))
	&& !empty($_POST["pa"])&& !empty($_POST["pv"])) {



        $bdd->insert('CDI_ARTICLE', $values);
        $message = array('etat' => 'success', 'message' => 'vous avez bien rempli le formulaire');
    }
    elseif (isset ($_POST['test'])? $_POST['test']: FALSE == "true") {
        $message = array('etat' => 'danger', 'message' => 'vous avez mal rempli le formulaire');
    }

$pays = $bdd->queryAll('SELECT * FROM CDI_PAYS');
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

    <form action="" method="post">
       <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $values['AR_NOM'] ?>">
    </div>
        <select name="four" class="custom-select">
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
    </form>

<?php require_once '../footer.php'; ?>