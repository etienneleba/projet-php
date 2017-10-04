<?php
require_once "config.php";

class Bdd {

    private $bdd;

    public function getBdd() {
        return $this->bdd;
    }

    public function connect() {
        return $this->bdd = new PDO('mysql:host='. _HOST.';dbname='. _DATABASE, _USER, _PASSWORD);
    }

    public function query($stat) {
        return $this->bdd->query($stat)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $values) {

        $requete = "INSERT INTO $table (";
        foreach ($values as $key => $value) {
            $requete = $requete . $key . ", ";
        }
        $requete = trim($requete, ', ');
        $requete = $requete . ") VALUES (";
        foreach ($values as $key => $value) {
            $requete = $requete . ":" . $key . ", ";
        }
        $requete = trim($requete, ', ');
        $requete = $requete . " )";

        $stmt = $this->bdd->prepare($requete);

        $stmt->execute($values);


    }


}