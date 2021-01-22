
<?php
require_once('header.php');
?>

<h1>Espace Admin</h1>
<p>Vous êtes bien connecté monsieurs <?php echo $_SESSION['nom']; ?></p>
<p>Votre code étudiant est <?php echo $_SESSION['code']; ?> </p>

<?php

echo '<a href="controllerEtudiants/addOnePerson">nouvelle inscription</a><br>';
echo '<a href="controllerCours/addOneCours">Nouvelle formation</a><br>';
echo '<a href="controllerCours/listeCours">liste des cours existants</a><br>';
?>


</body>
</html>