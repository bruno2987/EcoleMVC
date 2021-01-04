<?php
require_once('header.php');

?>
    <h1>Enregistrement d'un nouveau cours</h1>

    <form action="index.php?action=controllerCours/addOneCours" method="POST">
        <label for="code">Code du cours</label>
        <input id="champ" type="text" name="code"><br>

        <label for="code">Titre</label>
        <input id="champ" type="text" name="titre"><br>

        <label for="code">langage</label>
        <input id="champ" type="text" name="langage"><br>

        <input type="submit" value="OK">
    </form>

<?php
    echo '<br>';
    echo '<a href="index.php?action=controllerEtudiants/retourAdmin">retour</a><br>';
?>

</body>
</html>