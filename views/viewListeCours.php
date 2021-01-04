<?php
require_once('header.php');

?>
    <h1>Liste cours disponible</h1>

<?php

foreach ($lCours as $cle=> $line){
    echo '<div class="tableCours" id=" '.$cle.'">';
    echo '<div>'.$line["code"].'</div>';
    echo '<div>'.$line["titre"].'</div>';
    echo '<div>'.$line["langage"].'</div>';
    echo '<a href="index.php?action=controllerCours/updateCours/'.$line["id"].'">Modifier</a><br>';
    echo '</div>';
};

echo '<br>';
echo '<a href="index.php?action=controllerEtudiants/retourAdmin">retour</a><br>';


/* ------------------------------------  TEST boucle imbriquée pour ne pas avoir à taper chaque variables pour chaque ligne
foreach ($lCours as $line) {
    $cleTableau =  array_keys($line);
    for ($cle=0;$cle<sizeof($line);$cle++){
    echo $cleTableau[$cle];
    echo '<br>';

    //print_r( $line[$cle]);
    //echo '<br>';

    }
}
*/
?>

</body>
</html>