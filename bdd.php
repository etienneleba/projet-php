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

    public function queryAll($stat) {
       return $this->bdd->query($stat)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function query($stat) {
        return $this->bdd->query($stat)->fetch(PDO::FETCH_ASSOC);
    }

    public function getMaxId($table,  $colonne) {

        return $colonne[0] . $this->query("select CONVERT(max(CONVERT(substr(`".$colonne."_NUMERO`,2),UNSIGNED INTEGER))+1, CHAR(55)) as ID from `$table`")['ID'];

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

    public function update($table, $values, $id) {
        $requete = "UPDATE $table ";

        $requete = $requete. " SET ";
        foreach ($values as $key => $value) {
            $requete = $requete . "$key = :" . $key . ", ";
        }
        $requete = trim($requete, ', ');
        $requete = $requete . " WHERE ";
        foreach ($id as $key => $value) {
             $requete = $requete . "`".$key . "`= :". $key;
        }

        
        $values = array_merge($values, $id);
        $stmt = $this->bdd->prepare($requete);

        $stmt->execute($values);
    }
	
	public function deleter($table, $colonne, $id){
	$colonne=$colonne."_NUMERO";
	$requete = "DELETE from `$table` WHERE `$colonne` = '$id';";
	$stmt = $this->bdd->prepare($requete);
	$stmt->execute();
	}

}
