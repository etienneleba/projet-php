<?php

require_once '../bdd.php';

$bdd = new Bdd();
$bdd->connect();
$fournisseurs = $bdd->query("SELECT * FROM CDI_FOURNISSEUR");


?>


<?php require_once '../header.php'; ?>


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Numéro</th>
                <th>Fournisseur</th>
            </tr>
        </thead>
        <tbody>

        <?php

    foreach ($fournisseurs as $fournisseur) {
        echo '<tr>';
            echo "<td>" . $fournisseur['FO_NUMERO'] . "</td>";
            echo "<td>" . $fournisseur['FO_NOM'] . "</td>";
        echo '</tr>';
    }

?>
        </tbody>
    </table>
</div>

<?php require_once '../footer.php'; ?>