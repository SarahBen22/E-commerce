<?php
require_once "navbar.php";
?>

<div class="form-container">

	<form class="forme" action="./inscription" method="post">

	<br />
	<h1>Inscription à l'espace membre :</h1>
	<h5>Pseudo :</h5> <input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) echo htmlentities(trim($_POST['pseudo'])); ?>">
	<h5>Mot de passe :</h5> <input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) echo htmlentities(trim($_POST['mdp'])); ?>">
	<h5>Confirmation du mot de passe :</h5> <input type="password" name="mdp_confirm" value="<?php if (isset($_POST['mdp_confirm'])) echo htmlentities(trim($_POST['mdp_confirm'])); ?>"><br />
	<br /><input type="submit" name="inscription" value="Inscription"><br /><br /><br />

	</form>

	<div class="msg">
	<?php
	if (isset($erreur)) echo '<br />',$erreur;//
	?>
	</div>

</div>

<?php
require_once "footer.php";
?>
