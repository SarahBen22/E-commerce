<?php
require_once "views/navbar.php";
require_once "views/layout.php";
?>

<form class="forme" action="./profil_client" method="post">



<h1>Profil Client :</h1>
<h5>Prenom</h5> <input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])) echo htmlentities(trim($_POST['prenom'])); ?>"><br />
<h5>Nom</h5> <input type="text" name="nom" value="<?php if (isset($_POST['nom'])) echo htmlentities(trim($_POST['nom'])); ?>"><br />
<h5>Numero de telephone</h5> <input type="tel" name="telephone" value="<?php if (isset($_POST['telephone'])) echo htmlentities(trim($_POST['telephone'])); ?>"><br />
<h5>Adresse</h5> <input type="text" name="adresse_postale" value="<?php if (isset($_POST['adresse_postale'])) echo htmlentities(trim($_POST['adresse_postale'])); ?>"><br />


</form>
<?php
if (isset($erreur)) echo '<br />',$erreur;//
?>
