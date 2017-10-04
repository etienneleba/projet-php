<?php

require_once '../bdd.php';

$bdd = new Bdd();
$bdd->connect();
$clients = $bdd->query("SELECT * FROM CDI_CLIENT");
//echo '<PRE>';
//var_dump($clients);
//echo '</PRE>';
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" type="image/ico" href="img/favicon.gif" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Client | ADD </title>
</head>
<body>

<div class="content">
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Localité</th>
                <th>Type</th>
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
        echo '</tr>';
    }

?>
        </tbody>
    </table>
</div>
</div>


</body>
</html>