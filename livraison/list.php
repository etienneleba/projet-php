<?php

require_once '../bdd.php';

$bdd = new Bdd();
$bdd->connect();
$livraisons = $bdd->queryAll("SELECT DISTINCT * FROM CDI_LIVRAISON l INNER JOIN CDI_CLIENT c ON l.CL_NUMERO=c.CL_NUMERO");
$date = new DateTime();




?>


<?php require_once '../header.php'; ?>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-inverse">
            <tr>
                <th>Num livraison</th>
                <th>Num commande</th>
                <th>Date livraison</th>
                <th>Client</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($livraisons as $livraison) {
                echo '<tr>';
                echo "<td>" . $livraison['LI_NUMERO'] . "</td>";
                echo "<td>" . $livraison['CO_NUMERO'] . "</td>";
                echo "<td>" . $livraison['DATE_LIV'] . "</td>";
                echo "<td>" . $livraison['CL_NOM'] . "  ".$livraison['CL_PRENOM'] . "</td>";
                echo "<td>";
                echo '<div class="btn-group">';

                if($livraison['STATUT'] == 1) {

                       echo '<button  class="btn btn-info">LIVREE</button></td>';
                }elseif(strtotime($livraison['DATE_LIV']) > $date->getTimestamp()) {
                    echo '<a href="status.php?id='.$livraison['LI_NUMERO'].'"><button  class="btn btn-warning">LIVREE ? </button></a></td>';

                }else {

                    echo '<a href="status.php?id='.$livraison['LI_NUMERO'].'"><button  class="btn btn-success">LIVREE ? </button></a></td>';

                }



                echo '</div>';
                echo "</td>";
                echo '</tr>';

            }

            ?>
            </tbody>
        </table>
    </div>

<?php require_once '../footer.php'; ?>