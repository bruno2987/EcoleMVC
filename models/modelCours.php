<?php

require_once('models/model.php');

function addCours($pcode, $ptitre, $plangage) {
    $bdd = connexionBDD();

    $sql = $bdd->prepare("INSERT INTO formations (code,titre,langage) VALUES (:code, :titre,:langage)");
    // ci-dessus, dans value on a :titre. En fait, cette ligne sert à préparer la requête sql.
    $sql->bindValue(':code',$pcode);
    $sql->bindValue(':titre',$ptitre);
    $sql->bindValue(':langage',$plangage);

    $result=$sql->execute();
    return $result;

};

function getListeCours(){
    $bdd = connexionBDD();
    $sql = $bdd->query("SELECT * FROM `formations` ");
    $tempCours = $sql->fetchall();
    return $tempCours;
};

function getOneCours($idCoursToChange){
    $bdd = connexionBDD();
    $sql = $bdd->query("SELECT * FROM `formations` WHERE id = $idCoursToChange");
    $tempOneCours = $sql->fetch();
    return $tempOneCours;
}

function updateOneCoursMod($idCoursToChangeFinal,$pcode,$ptitre,$plangage){

    $bdd = connexionBDD();
    $sql = $bdd->prepare("UPDATE `formations` SET `code` = :code, `titre` = :titre, `langage` = :langage WHERE `formations`.`id` = :id ");
    $sql->bindValue(':code',$pcode,PDO::PARAM_STR);
    $sql->bindValue(':titre',$ptitre,PDO::PARAM_STR);
    $sql->bindValue(':langage',$plangage,PDO::PARAM_STR);
    $sql->bindValue(':id',$idCoursToChangeFinal,PDO::PARAM_INT);
    $result=$sql->execute();
/* Pourquoi fait-on $bdd->prepare(......)    --> En faisant come cela, au lieu de mettre directement les variables dans les champs, on passe par la fonction en dessous: bindValue()
Cette fonction permet entre autre de spécifier à la base de donnée quon va lui envoyer un string : PDO::PARAM_STR ou un entier PDO::PARAM_INT ou autre.
De cette manière, une personne mal intentionnée ne peut pas par exemple envoyer un script dans le champs qui sera du coup enregistré dans la base de donnée.
*/
}


?>