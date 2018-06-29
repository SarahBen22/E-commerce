<?php
require_once "views/navbar.php";
?>

<form class="forme" action="./connexion" method="post">

<br />
<h1>Inscription à l'espace membre :</h1> 
<h5>Pseudo :</h5> <input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) echo htmlentities(trim($_POST['pseudo'])); ?>">
<h5>Mot de passe :</h5> <input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) echo htmlentities(trim($_POST['mdp'])); ?>">
<h5>Confirmation du mot de passe :</h5> <input type="password" name="mdp_confirm" value="<?php if (isset($_POST['mdp_confirm'])) echo htmlentities(trim($_POST['mdp_confirm'])); ?>"><br />

<h5>Prenom</h5> <input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])) echo htmlentities(trim($_POST['prenom'])); ?>"><br />
<h5>Nom</h5> <input type="text" name="nom" value="<?php if (isset($_POST['nom'])) echo htmlentities(trim($_POST['nom'])); ?>"><br />
<h5>Numero de telephone</h5> <input type="tel" name="telephone" value="<?php if (isset($_POST['telephone'])) echo htmlentities(trim($_POST['telephone'])); ?>"><br />
<h5>Adresse</h5> <input type="text" name="adresse_postale" value="<?php if (isset($_POST['adresse_postale'])) echo htmlentities(trim($_POST['adresse_postale'])); ?>"><br />


<br /><input type="submit" name="connexion" value="Connexion"><br /><br /><br />

</form>
<?php
if (isset($erreur)) echo '<br />',$erreur;// 
?>