<?php
require_once('header.php');

?>

    <h1>Enregistrement d'un nouvel administrateur</h1>


    <section class="sectionEtudiant">

    <div class="formEtudiant">
    <form action="index.php?action=controllerEtudiants/addOneAdmin" method="POST">

        <label for="code">Code etudiant</label>
        <input id="champ" type="text" name="code"><br>

        <label for="code">nom</label>
        <input id="champ" type="text" name="nom"><br>

        <label for="code">prenom</label>
        <input id="champ" type="text" name="prenom"><br>

        <label for="code">age</label>
        <input id="champ" type="text" name="age"><br>

        <label for="code">email</label>
        <input id="champ" type="text" name="email"><br>

        <label for="code">password</label>
        <input id="champ" type="text" name="mdp"><br>

        <input id="submit" type="submit" value="OK">
</form>
    </div>
    </section>

<?php
    echo '<br>';
    echo '<a href="index.php?action=controllerEtudiants/retourAdmin">retour</a><br>';
?>

</body>
</html>