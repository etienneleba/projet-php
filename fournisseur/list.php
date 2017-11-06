<?php

require_once '../bdd.php';

$bdd = new Bdd();
$bdd->connect();
$fournisseurs = $bdd->queryAll("SELECT * FROM CDI_FOURNISSEUR");
var_dump($fournisseurs);

?>


<?php require_once '../header.php'; ?>


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Numéro</th>
                <th>Fournisseur</th>
				<th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php

    foreach ($fournisseurs as $fournisseur) {
        echo '<tr>';
            echo "<td>" . $fournisseur['FO_NUMERO'] . "</td>";
            echo "<td>" . $fournisseur['FO_NOM'] . "</td>";
			echo '<div class="btn-group">';
			echo '<td><a href="edit.php?id='.$fournisseur['FO_NUMERO'].'"><button  class="btn btn-primary">Editer</button></a>';
			echo '<a href="delete.php?id='.$fournisseur['FO_NUMERO'].'"><button  class="btn btn-danger">Supprimer</button></a></td>';
			echo '</div>';
        echo '</tr>';
		
    }

?>
        </tbody>
    </table>
</div>

<?php require_once '../footer.php'; ?>