<?php
require_once "config.php";

class bdd {

    private $bdd;

    public function connect() {
        $this->bdd = new PDO('mysql:host='. _HOST.';dbname='. _DATABASE, _USER, _PASSWORD);
    }

    public function query($stat) {
        return $this->bdd->query($stat)->fetchAll(PDO::FETCH_ASSOC);
    }


}