<?php

require_once '../bdd.php';
$bdd = new Bdd();
$bdd->connect();



if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$commande = $bdd->query("SELECT * FROM CDI_COMMANDE co INNER JOIN CDI_CLIENT cl WHERE co.CL_NUMERO=cl.CL_NUMERO AND CO_NUMERO='$id'");
//var_dump($commande);
$articles = $bdd->queryAll("SELECT * FROM CDI_ARTICLE_COMMANDE ac INNER JOIN CDI_ARTICLE ar WHERE ac.AR_NUMERO=ar.AR_NUMERO AND ac.CO_NUMERO='$id'");
//var_dump($articles);
?>


<?php require_once '../header.php'; ?>
<?php

echo "<p>Numéro de commande : ". $commande['CO_NUMERO'] . "</p>";
echo "<p>Date de commande : ". $commande['CO_DATE']  . "</p>";
echo "<p>Client : ". $commande['CL_NOM']  . "  " . $commande['CL_PRENOM']. "</p>";
echo "<p>Numéro du magasin : ". $commande['MA_NUMERO'] . "</p>";

?>
<div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-inverse">
            <tr>
                <th>Numéro </th>
                <th>Nom</th>
                <th>Quantité</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($articles as $article) {
                echo '<tr>';
                echo "<td>" . $article['AR_NUMERO'] . "</td>";
                echo "<td>" . $article['AR_NOM'] . "</td>";
                echo "<td>" . $article['QUANTITE'] . "</td>";

                echo '</tr>';

            }

            ?>
</tbody>
</table>
</div>

<?php require_once '../footer.php'; ?>
