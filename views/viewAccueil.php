
<?php
require_once('header.php');
?>


<p id="OK"> connexion réussie </p>

<?php
        echo '<a href="index.php?action=controllerEtudiants/addOneEtudiant">inscription etudiant</a><br>';
        echo '<a href="index.php?action=controllerCours/addOneCours">Nouvelle formation</a><br>';
        echo '<a href="index.php?action=controllerCours/listeCours">liste des cours existants</a><br>';
?>


</body>
</html>

