<?php
require_once "views/navbar.php";
require_once "views/layout.php";
?>

<form class="forme" action="./profil_client" method="post">



<h1>Profil Client :</h1>
<label for="mme" class="inline">Mme</label>
<input type="radio" name="civilite" value="mme" id="mme" /><input type="radio" name="CSS" value="mr" id="mr" />
<label for="mr" class="inline">M.</label><br />
<h5>Nom</h5> <input type="text" name="nom" value="<?php if (isset($_POST['nom'])) echo htmlentities(trim($_POST['nom'])); ?>"><br />

<h5>Prenom</h5> <input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])) echo htmlentities(trim($_POST['prenom'])); ?>"><br /><br />

<h5>Date de naissance </h5> <input type="date" name="date_de_naissance" id="date" <?php if (isset($_POST['date_de_naissance'])) echo htmlentities(trim($_POST['date_de_naissance'])); ?>"><br />
<h5>Adresse</h5> <input type="text" name="adresse_postale" value="<?php if (isset($_POST['adresse_postale'])) echo htmlentities(trim($_POST['adresse_postale'])); ?>"><br />

<h5>Numero de telephone</h5> <input type="tel" name="telephone" value="<?php if (isset($_POST['telephone'])) echo htmlentities(trim($_POST['telephone'])); ?>"><br /><br />


<h5>Pseudo</h5> <input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) echo htmlentities(trim($_POST['pseudo'])); ?>"><br />
<h5>Mot de passe</h5> <input type="text" name="mdp" value="<?php if (isset($_POST['mdp'])) echo htmlentities(trim($_POST['mdp'])); ?>"><br />
<h5>Email:</h5> <input type="email" name="mail" value="<?php if (isset($_POST['mail'])) echo htmlentities(trim($_POST['mail'])); ?>">
<br />
<br /><input type="submit" name="inscription" value="inscription"><br /><br /><br />


</form>
<?php
if (isset($erreur)) echo '<br />',$erreur;//
?>
