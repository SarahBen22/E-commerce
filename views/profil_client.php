<?php
require_once "views/navbar.php";
require_once "views/layout.php";
?>

<form class="forme" action="./profil_client" method="POST">



  <h1>Profil Client :</h1>
  <label for="mme" class="inline">Mme</label>
  <input type="radio" name="civilite" value="mme" id="mme" /><input type="radio" name="CSS" value="mr" id="mr" />
  <label for="mr" class="inline">M.</label><br />
  <h5>Nom</h5> <input type="text" name="nom" value="<?php if (isset($_SESSION['nom'])) echo htmlentities(trim($_SESSION['nom'])); ?>"><br />

  <h5>Prenom</h5> <input type="text" name="prenom" value="<?php if (isset($_SESSION['prenom'])) echo htmlentities(trim($_SESSION['prenom'])); ?>"><br /><br />

  <h5>Date de naissance </h5> <input type="date" name="date_de_naissance" id="date" <?php if (isset($_SESSION['date_de_naissance'])) echo htmlentities(trim($_SESSION['date_de_naissance'])); ?>"><br />
  <h5>Adresse</h5> <input type="text" name="adresse_postale" value="<?php if (isset($_SESSION['adresse_postale'])) echo htmlentities(trim($_SESSION['adresse_postale'])); ?>"><br />

  <h5>Numero de telephone</h5> <input type="tel" name="telephone" value="<?php if (isset($_SESSION['telephone'])) echo htmlentities(trim($_SESSION['telephone'])); ?>"><br /><br />


  <h5>Pseudo</h5> <input type="text" name="pseudo" value="<?php if (isset($_SESSION['pseudo'])) echo htmlentities(trim($_SESSION['pseudo'])); ?>"><br />
  <h5>Mot de passe</h5> <input type="password" name="mdp" value="<?php if (isset($_SESSION['mdp'])) echo htmlentities(trim($_SESSION['mdp'])); ?>"><br />
  <h5>Email:</h5> <input type="email" name="mail" value="<?php if (isset($_SESSION['mail'])) echo htmlentities(trim($_SESSION['mail'])); ?>">
  <br /> <input type="hidden" name= "id" value="<?php if (isset($_SESSION['id'])) echo htmlentities(trim($_SESSION['id'])); ?>">
  <br /><input type="submit" name="inscription" value="inscription"><br /><br /><br />


</form>
<?php
if (isset($erreur)) echo '<br />',$erreur;//
?>
