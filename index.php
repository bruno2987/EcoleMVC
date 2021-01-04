<?php

    session_start();



/*
// Dans la variable $_SERVER , il y a plein de chose dont QUERY_STRING qui représente ce qu'il y a après le ? dans l'url
echo "Requête:".$_SERVER['QUERY_STRING'];
echo "<br>";
//ex: si on tape après l'url ?/article/24 --> on affichera /article/24

if ( $_GET['action']){
    print_r($_GET['action']);
    echo "<br>";
    $params = explode("/",$_GET['action']);  // la fonction explode scinde une chaîne de caractère en segment en spécifiant un séparateur.: Ici, comme c'est un URL, les séparateurs sont des slash "/" 
    // ci dessous on affiche le premier résultat ( [0] ) du scindage de l'url effectué au dessus et qui a été mis dans la variable $params.
    echo "param1: ". $params[0];  
    echo "<br>";
    echo "param2: ". $params[1];
    echo "<br>";
    echo "param3: ". $params[2];
    echo "<br>";
}

// taper l'url suivi de cours/connecter/45  --> les différents paramètres vont s'afficher : param1: cours ; param2 = connecter ; param3 = 45
// pour cet exemple on va considérer que "cours" est le controller


*/
// $_SERVER['SCRIPT_FILENAME']; --> cette variable contient tout le chemin pour arriver au script  (résultat = C:/Liberkey/MyApps/UwAmp/www/BRUNO/exo-afpa/PHP/exo_MVC_1/index.php)
$root = str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']);
// ci-dessus la fonction permet de remplacer des caractères dans un string. Ici dans $_SERVER['SCRIPT_FILENAME'] (qui est le chemin qui mène vers ce script: index.php) et
// on remplace index.php par rien, ce qui nous permet d'obtenir toute l'adresse sans index.php (résultat: C:/Liberkey/MyApps/UwAmp/www/BRUNO/exo-afpa/PHP/exo_MVC_1/)
// on met cette adresse dans $root, comme ça on pourra juste ajouter à cette adresse le reste de l'adresse que l'on vise

define('ROOT',$root);  // création d'une constante (qui contient $root) qu'on pourra utiliser pour la concaténation.



/* Toute la partie ci-dessous (les if) servent juste à permettre à l'utilisateur de naviguer en tapant directement dans la barre d'adresse. Donc si on met un login, il faut enlever
cette partie car elle permet à n'importe quel utilisateur non authentifier de naviguer sur le site. Alors que si on ne met que le require_once(ROOT.'controllers/controllerEtudiants.php');login();
, lutilisateur sera obligé de passé par l'authentification pour accéder au site.
*/
if ($_GET['action']) {
    $params = explode("/", $_GET['action']);
    if ($params[0] !="") {
        $controller= $params[0];   // cette ligne permet d'extraire le nom du controller que l'on doit appeler
        $action="";
        if (isset($params[1])) {
            $action = $params[1];
        };
        require_once(ROOT.'controllers/'.$controller.'.php');  // permet de charger la page entre parenthèse.
        //traduction de ROOT.'controllers/'.$controller.'.php'  --> on concatène ROOT (qui contient l'adresse absolue du dossier) avec controllers (dossier controllers créé dans
        // le dossier racine du site) avec le nom du controller récupéré dans l'url ($controller) avec .php .
    }

    if (function_exists($action)) {
        if (isset($params[2]) && isset($params[3])) {
            $action($params[2], $params[3]);
        } elseif (isset($params[2])) {
            $action($params[2]);
        } else {
            $action();
        }
    } else {
        echo 'page par défaut';
    }
} else{
        require_once(ROOT.'controllers/controllerEtudiants.php');
        login();
    }

//index.php?action=controllerEtudiants/login
?>