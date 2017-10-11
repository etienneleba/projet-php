<?php

require_once '../bdd.php';

$bdd = new Bdd();
$bdd->connect();
$articles = $bdd->query("SELECT * FROM CDI_ARTICLE a INNER JOIN CDI_FOURNISSEUR f ON a.FO_NUMERO=f.FO_NUMERO");


?>


<?php require_once '../header.php'; ?>


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Numéro</th>
                <th>Fournisseur</th>
                <th>Nom</th>
                <th>Poids</th>
                <th>Couleur</th>
				<th>Stock</th>
				<th>PA</th>
				<th>PV</th>
            </tr>
        </thead>
        <tbody>

        <?php

    foreach ($articles as $article) {
        echo '<tr>';
            echo "<td>" . $article['AR_NUMERO'] . "</td>";
            echo "<td>" . $article['FO_NOM'] . "</td>";
            echo "<td>" . $article['AR_NOM'] . "</td>";
            echo "<td>" . $article['AR_POIDS'] . "</td>";
            echo "<td>" . $article['AR_COULEUR'] . "</td>";
			echo "<td>" . $article['AR_STOCK'] . "</td>";
			echo "<td>" . $article['AR_PA'] . "</td>";
			echo "<td>" . $article['AR_PV'] . "</td>";
        echo '</tr>';
    }

?>
        </tbody>
    </table>
</div>

<?php require_once '../footer.php'; ?>