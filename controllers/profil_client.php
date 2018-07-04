<?php
require_once "models/profil_client.php";

// on teste si le visiteur a soumis le formulaire
if (isset($_POST['profil_client']) && $_POST['profil_client'] == 'profil_client') {// isset= permet de voir si une variable est définie
	 // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
 if ( (isset($_POST['civilite']) && !empty($_POST['civilite'])) && (isset($_POST['nom']) && !empty($_POST['nom'])) && (isset($_POST['prenom']) && !empty($_POST['prenom'])) &&
 (isset($_POST['date_de_naissance']) && !empty($_POST['date_de_naissance'])) && (isset($_POST['genre']) && !empty($_POST['genre'])) && (isset($_POST['adresse_postale']) && !empty($_POST['adresse_postale'])) &&
 (isset($_POST['telephone']) && !empty($_POST['telephone']) && (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && (isset($_POST['mdp']) && !empty($_POST['mdp'])) &&
 (isset($_POST['mail']) && !empty($_POST['mail'])) )) {
			// on teste les deux mots de passe


				$client= new profil_clientModel();
				$erreur= $client-> createOne($_POST['pseudo'],$_POST['mdp']);

				if ($erreur==0)
				$_SESSION['pseudo'] = $_POST['pseudo'];

	 }
	 else {
			$erreur = 'Au moins un des champs est vide.';
	 }
}


$content = "views/profil_client.php";
require_once "views/layout.php";

?>
