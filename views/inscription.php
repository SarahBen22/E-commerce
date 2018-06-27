<?php
require_once "views/navbar.php";


?>
Inscription à l'espace membre :<br />
<form action="./inscription" method="post">
Pseudo : <input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) echo htmlentities(trim($_POST['pseudo'])); ?>"><br />
Mot de passe : <input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) echo htmlentities(trim($_POST['mdp'])); ?>"><br />
Confirmation du mot de passe : <input type="password" name="mdp_confirm" value="<?php if (isset($_POST['mdp_confirm'])) echo htmlentities(trim($_POST['mdp_confirm'])); ?>"><br />
<input type="submit" name="inscription" value="Inscription">
</form>
<?php
if (isset($erreur)) echo '<br />',$erreur;// != différent
?>
