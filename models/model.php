<?php

function connexionBDD(){
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=exo_mvc_1","root","root");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (PDOException $ex) {
        echo 'Erreur BDD: '.$ex ;
    }
}

?>