<?php

require_once('models/modelCours.php');

function addOneCours() {
    // "if !empty " = si () n'est pas vide
    if (!empty($_POST['code']) && !empty($_POST['langage'])) {
        addCours($_POST['code'],$_POST['titre'],$_POST['langage']);
    }
    require_once('views/viewCours.php');
}

function listeCours(){
    $lCours=getListeCours();
    require_once('views/viewListeCours.php');
}

function inscriptionCours(){                // le début de la fonction est quasi identique à la fonction liste Cours car pour l'inscription, on a besoin de la liste des cours dispo
    $lCours=getListeCours();                // donc autant réutiliser les fonctions permettant de l'obtenir dans controllerscours
    require_once('views/viewListeCoursInscript.php');
}


function updateCours($idCours){
    $oneCours = getOneCours($idCours);
    require_once('views/viewUpdateCours.php');
}

function updateOneCours($idCoursMod){
    updateOneCoursMod($idCoursMod,$_POST['code'],$_POST['titre'],$_POST['langage']);
}

?>