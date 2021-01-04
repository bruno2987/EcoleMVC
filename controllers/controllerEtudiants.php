<?php

require_once('models/modelEtudiants.php');

function retourStudent(){
    require_once('views/viewAccueilEtudiant.php');
}

function retourAdmin(){
    require_once('views/viewAccueilAdmin.php');
}

function addOnePerson() {
    // "if !empty " = si () n'est pas vide
    if (!empty($_POST['code']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['habilitation'])) {
        addPerson($_POST['code'],$_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['email'],$_POST['mdp']);
        newHabilitation($_POST['email'],$_POST['habilitation']);
    }
    require_once('views/viewInscription.php');
}

function login(){
    if(!empty($_POST['email']) && !empty($_POST['password_inputed'])){
        verifLog($_POST['email'],$_POST['password_inputed']);
        } else {
            require_once('views/viewLogin.php');
        }

}

    function listecoursInscription(){                // Cette fonction est identique à celle qui est dans controllerCours mais on est obligé de la remettre là pour avoir la liste des 
        $lCours=getListeCours();                // cours dispos. Il a donc aussi fallu recop
        require_once('views/viewListeCoursInscript.php');
}

    function inscriptionCours($id_Cours){
        if (isset($_SESSION['id'])){
            recordIncript($id_Cours);
            require_once('views/viewAccueilEtudiant.php');
        }
}

function mesCours(){
    $indivCours=getListeIndivCours();
    require_once('views/viewIndivCours.php');
}




?>