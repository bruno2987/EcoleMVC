<?php

require_once('models/model.php');

function addPerson($pcode, $pnom, $pprenom,$page,$pemail,$pmdp) {
    $bdd = connexionBDD();

    $sql = $bdd->prepare("INSERT INTO persons (code,nom,prenom,age,email,mdp) VALUES (:code, :nom,:prenom,:age,:email,:mdp)");
    // ci-dessus, dans value on a :titre. En fait, cette ligne sert à préparer la requête sql.
    $sql->bindValue(':code',$pcode);
    $sql->bindValue(':nom',$pnom);
    $sql->bindValue(':prenom',$pprenom);
    $sql->bindValue(':age',$page);
    $sql->bindValue(':email',$pemail);

    $Password_encripted= password_hash($pmdp,PASSWORD_BCRYPT);
    $sql->bindValue(':mdp',$Password_encripted);
    $result=$sql->execute();
    return $result;
}

function newHabilitation($pemail,$habilit){
    $bdd = connexionBDD();
    $requeteGetId = $bdd->query("SELECT persons.id FROM `persons` WHERE persons.email='$pemail' " ) ;
    $getId = $requeteGetId->fetch();
    $personId = $getId['id'];
    $bdd->query("INSERT INTO `habilitations` (`id`, `id_persons`, `id_habilitation`) VALUES (NULL, '$personId', '$habilit') ");
}

function addAdmin($pcode, $pnom, $pprenom,$page,$pemail,$pmdp) {
    $bdd = connexionBDD();

    $sql = $bdd->prepare("INSERT INTO persons (code,nom,prenom,age,email,mdp) VALUES (:code, :nom,:prenom,:age,:email,:mdp)");
    // ci-dessus, dans value on a :titre. En fait, cette ligne sert à préparer la requête sql.
    $sql->bindValue(':code',$pcode);
    $sql->bindValue(':nom',$pnom);
    $sql->bindValue(':prenom',$pprenom);
    $sql->bindValue(':age',$page);
    $sql->bindValue(':email',$pemail);

    $Password_encripted= password_hash($pmdp,PASSWORD_BCRYPT);
    $sql->bindValue(':mdp',$Password_encripted);

    $result=$sql->execute();
    return $result;

}

function verifLog($vEmail,$vPassword_inputed){

    $bdd = connexionBDD();
    $requeteDataUser = $bdd->query("SELECT * FROM `persons` WHERE persons.email = '$vEmail' ");  //récupération des donnée du user
    $data = $requeteDataUser->fetchAll();
    $dataSession = $data[0];
    $password_encrypted=$dataSession['mdp'];

    $requeteHabilit = $bdd->query("SELECT habilitations.id_habilitation FROM `habilitations` WHERE id_persons = ".$dataSession['id']." ");
    $dataHabilit = $requeteHabilit->fetch();
    $habilit = $dataHabilit['id_habilitation'];


    //$requeteData = $bdd->query("SELECT * FROM `persons` WHERE EXISTS(SELECT * FROM `persons` WHERE persons.email = 'j.martin@gmail.com') ");

    if (password_verify($vPassword_inputed, $password_encrypted)){

        $_SESSION['id']=$dataSession['id'];
        $_SESSION['code']=$dataSession['code'];
        $_SESSION['nom']=$dataSession['nom'];
        $_SESSION['prenom']=$dataSession['prenom'];
        $_SESSION['age']=$dataSession['age'];
        $_SESSION['email']=$dataSession['email'];
        $_SESSION['mdp']=$dataSession['mdp'];

        if($habilit=='student') {
            require_once('views/viewAccueilEtudiant.php');
        } else {
            require_once('views/viewAccuielAdmin.php');
        }

    } else {
        echo '<p id="NOK"> mot de passe incorrect </p>';
    }

}

function getListeCours(){
    $bdd = connexionBDD();
    $sql = $bdd->query("SELECT * FROM `formations` ");
    $tempCours = $sql->fetchall();
    return $tempCours;
};

function recordIncript($idCours){
    $bdd = connexionBDD();
    $idEtudiant= $_SESSION['id'];
    $bdd->query("INSERT INTO `cours_etudiants` (`id`, `id_etudiant`, `id_cours`) VALUES (NULL, '$idEtudiant', '$idCours'); ");
}

function getListeIndivCours(){
    $bdd = connexionBDD();
    $idEtudiant= $_SESSION['id'];
    $sql = $bdd->query("SELECT * FROM `formations` INNER JOIN cours_etudiants ON id_cours = formations.id WHERE cours_etudiants.id_etudiant = $idEtudiant ");
    $tempCours = $sql->fetchall();
    return $tempCours;
}


?>
