<?php

require_once '../bdd.php';

$bdd = new Bdd();
$bdd->connect();
$magasins = $bdd->queryAll("SELECT * FROM CDI_MAGASIN");


?>


<?php require_once '../header.php'; ?>


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Numéro</th>
                <th>Localité</th>
				<th>Gérant</th>
				<th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php

    foreach ($magasins as $magasin) {
        echo '<tr>';
            echo "<td>" . $magasin['MA_NUMERO'] . "</td>";
            echo "<td>" . $magasin['MA_LOCALITE'] . "</td>";
			echo "<td>" . $magasin['MA_GERANT'] . "</td>";
			echo '<div class="btn-group">';
			echo '<td><a href="edit.php?id='.$magasin['MA_NUMERO'].'"><button  class="btn btn-primary">Editer</button></a>';
			echo '<a href="delete.php?id='.$magasin['MA_NUMERO'].'"><button  class="btn btn-danger">Supprimer</button></a></td>';
			echo '</div>';
        echo '</tr>';
    }

?>
        </tbody>
    </table>
</div>

<?php require_once '../footer.php'; ?>