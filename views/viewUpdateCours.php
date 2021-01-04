<?php
require_once('header.php');

?>
    <h1>ATTENTION: Modification du cours</h1>

    <form action="index.php?action=controllerCours/updateOneCours/<?php echo $oneCours['id'] ?>" method="POST">
        <label for="code">Code du cours</label>
        <input  id="champ"  type="text" name="code" value ="<?php echo $oneCours['code'] ?>"><br>

        <label for="code">Titre</label>
        <input  id="champ"  type="text" name="titre" value ="<?php echo $oneCours['titre'] ?>"><br>

        <label for="code">langage</label>
        <input  id="champ"  type="text" name="langage" value ="<?php echo $oneCours['langage'] ?>"><br>

        <input  id="submit"  type="submit" value="OK">
    </form>

</body>
</html>