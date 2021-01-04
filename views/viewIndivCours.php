<?php
require_once('header.php');

?>

<h1>Listes des cours auxquels vous êtes inscrit</h1>


<p>vous êtes inscrit à <?php echo sizeof($indivCours); ?> cours </p>

<?php

foreach ($indivCours as $cle=> $line){
    echo '<div class="tableCours" id=" '.$cle.'">';
    echo '<div>'.$line["code"].'</div>';
    echo '<div>'.$line["titre"].'</div>';
    echo '<div>'.$line["langage"].'</div>';
    echo '</div>';
};

echo '<br>';
echo '<a href="index.php?action=controllerEtudiants/retourStudent">retour</a><br>';

?>

</body>
</html>