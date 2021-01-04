<?php
require_once('header.php');
?>

<div id="containLogin">
<form id="login" action="index.php?action=controllerEtudiants/login" method="POST">
    <label for="email">email</label>
    <input id="champ" type="email" name="email">

        <label for="password">password</label>
        <input id="champ" type="text" name="password_inputed">

        <input id="submit" type="submit" value="connexion" name="record">
    </form>
</div>
    

</body>
</html>