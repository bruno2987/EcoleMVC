<?php
require_once('header.php');

?>

<h1>S'inscrire à un cours</h1>

<br><br>
    <h2>Liste cours disponible</h2>

<?php

foreach ($lCours as $cle=> $line){
    echo '<div class="tableCours" id=" '.$cle.'">';
    echo '<div>'.$line["code"].'</div>';
    echo '<div>'.$line["titre"].'</div>';
    echo '<div>'.$line["langage"].'</div>';
    echo '<a href="index.php?action=controllerEtudiants/inscriptionCours/'.$line["id"].'">s\'inscrire</a><br>';
    echo '</div>';
};
echo '<br>';
echo '<a href="index.php?action=controllerEtudiants/retourStudent">retour</a><br>';

?>

</body>
</html>