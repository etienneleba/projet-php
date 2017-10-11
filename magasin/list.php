<?php

require_once '../bdd.php';

$bdd = new Bdd();
$bdd->connect();
$magasins = $bdd->query("SELECT * FROM CDI_MAGASIN");


?>


<?php require_once '../header.php'; ?>


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Numéro</th>
                <th>Localité</th>
				<th>Gérant</th>
            </tr>
        </thead>
        <tbody>

        <?php

    foreach ($magasins as $magasin) {
        echo '<tr>';
            echo "<td>" . $magasin['MA_NUMERO'] . "</td>";
            echo "<td>" . $magasin['MA_LOCALITE'] . "</td>";
			echo "<td>" . $magasin['MA_GERANT'] . "</td>";
        echo '</tr>';
    }

?>
        </tbody>
    </table>
</div>

<?php require_once '../footer.php'; ?>