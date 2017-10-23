<?php

require_once '../bdd.php';

$bdd = new Bdd();
$bdd->connect();
$clients = $bdd->queryAll("SELECT * FROM CDI_CLIENT");
?>


<?php require_once '../header.php'; ?>


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Localité</th>
                <th>Type</th>
				<th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php

    foreach ($clients as $client) {
        echo '<tr>';
            echo "<td>" . $client['CL_NUMERO'] . "</td>";
            echo "<td>" . $client['CL_NOM'] . "</td>";
            echo "<td>" . $client['CL_PRENOM'] . "</td>";
            echo "<td>" . $client['CL_LOCALITE'] . "</td>";
            echo "<td>" . $client['CL_TYPE'] . "</td>";
			echo '<div class="btn-group">';
			echo '<td><a href="edit.php/?id='.$client['CL_NUMERO'].'"><button  class="btn btn-primary">Editer</button></a>';
			echo '<button  class="btn btn-danger">Supprimer</button></td>';
			echo '</div>';
        echo '</tr>';
    }

?>
        </tbody>
    </table>
</div>

<?php require_once '../footer.php'; ?>