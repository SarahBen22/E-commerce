<?php
require_once "views/navbar.php";
?>

<div class="form-container">

	<form class="forme"   action="./connexion" method="post">

	<br />
	<h1>Se connecter :</h1>
	<h5>Pseudo ou mail :</h5> <input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) echo htmlentities(trim($_POST['pseudo'])); ?>">

	<h5>Mot de passe :</h5> <input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) echo htmlentities(trim($_POST['mdp'])); ?>">
	<br />
	<br />
	<br /><input type="submit" name="connexion" value="Connexion"><br /><br /><br />
	<br />
	<br />
	</form>

	<?php
	if (isset($erreur)) echo '<br />',$erreur;//
	?>

</div>

<?php
require_once "footer.php";
?>
