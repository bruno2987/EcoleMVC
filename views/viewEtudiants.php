<?php
require_once('header.php');

?>

    <h1>Je suis la view Etudiants</h1>


    <section class="sectionEtudiant">

    <div class="formEtudiant">
    <form action="index.php?action=controllerEtudiants/addOneEtudiant" method="POST">

        <label for="code">Code etudiant</label>
        <input type="text" name="code"><br>

        <label for="code">nom</label>
        <input type="text" name="nom"><br>

        <label for="code">prenom</label>
        <input type="text" name="prenom"><br>

        <label for="code">age</label>
        <input type="text" name="age"><br>

        <label for="code">email</label>
        <input type="text" name="email"><br>

        <label for="code">password</label>
        <input type="text" name="mdp"><br>

        <input type="submit" value="OK">
</form>
    </div>
    </section>
    

</body>
</html>