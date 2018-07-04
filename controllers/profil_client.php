<?php
require_once "models/profil_client.php";

// on teste si le visiteur a soumis le formulaire
if (true) {// isset= permet de voir si une variable est définie
	 // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
 if (isset($_POST['pseudo'])) {
			// on teste les deux mots de passe


				$client= new profil_clientModel(['id' => 0 , 'civilite' =>"",'nom' => $_POST['nom'],'prenom' => $_POST['prenom'],'date_de_naissance' => $_POST['date_de_naissance'],
         'adresse_postale' => $_POST['adresse_postale'],'telephone' => $_POST['telephone'],'pseudo' => $_POST['pseudo'],'mdp' => $_POST['mdp'],'mail' => $_POST['mail'],'admin' => "no"]);
				$erreur= $client-> createOne($client);

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
