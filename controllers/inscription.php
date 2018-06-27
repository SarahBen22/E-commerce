<?php
require_once "models/profil_client.php";

// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {// isset= permet de voir si une variable est définie
	 // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	 if ((isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && (isset($_POST['mdp']) && !empty($_POST['mdp'])) && (isset($_POST['mdp_confirm']) && !empty($_POST['mdp_confirm']))) {
			// on teste les deux mots de passe
			if ($_POST['mdp'] != $_POST['mdp_confirm']) {
				 $erreur = 'Les 2 mots de passe sont différents.';
			}
			else {
				$client= new profil_clientModel ();
				$erreur= $client-> createOne($_POST['pseudo'],$_POST['mdp']);

				if ($erreur==0)
				$_SESSION['pseudo'] = $_POST['pseudo'];
			}
	 }
	 else {
			$erreur = 'Au moins un des champs est vide.';
	 }
}


$content = "views/inscription.php";
require_once "views/layout.php";

?>
