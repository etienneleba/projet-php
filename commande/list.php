<?php

require_once '../bdd.php';

$bdd = new Bdd();
$bdd->connect();
$commandes = $bdd->queryAll("SELECT * FROM CDI_COMMANDE a INNER JOIN CDI_MAGASIN m ON a.MA_NUMERO=m.MA_NUMERO INNER JOIN CDI_CLIENT c ON a.CL_NUMERO=c.CL_NUMERO");
?>


<?php require_once '../header.php'; ?>


<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Numéro</th>
                <th>Client</th>
                <th>Magasin</th>
                <th>Date</th>
				<th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php

    foreach ($commandes as $commande) {
        echo '<tr>';
            echo "<td>" . $commande['CO_NUMERO'] . "</td>";
            echo "<td>" . $commande['CL_NOM'] . "</td>";
            echo "<td>" . $commande['MA_GERANT'] . "</td>";
            echo "<td>" . $commande['CO_DATE'] . "</td>";

			echo '<div class="btn-group">';
			echo '<td><a href="edit.php?id='.$commande['CO_NUMERO'].'"><button  class="btn btn-primary">Editer</button></a>';
			echo '<a href="delete.php?id='.$commande['CO_NUMERO'].'"><button  class="btn btn-danger">Supprimer</button></a>';
			echo '<a href="view.php?id='.$commande['CO_NUMERO'].'"><button  class="btn btn-info">Voir</button></a></td>';
			echo '</div>';
        echo '</tr>';
    }

?>
        </tbody>
    </table>
</div>

<?php require_once '../footer.php'; ?>