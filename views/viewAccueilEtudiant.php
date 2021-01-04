
<?php
require_once('header.php');
?>

<h1>Espace Etudiant</h1>
<p>Vous êtes bien connecté monsieurs <?php echo $_SESSION['nom']; ?></p>
<p>Votre code étudiant est <?php echo $_SESSION['code']; ?> </p>

<?php

echo '<a href="index.php?action=controllerEtudiants/listecoursInscription">s\'inscrire à un cours</a><br>';
echo '<a href="index.php?action=controllerEtudiants/mesCours">mes cours</a><br>';

?>


</body>
</html>

