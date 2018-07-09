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
				$client= new profil_clientModel (['id' => 0 , 'civilite' =>"",'nom' =>"",'prenom' => "",'date_de_naissance' => '1991-03-22',
         'adresse_postale' => "",'telephone' => "",'pseudo' => $_POST['pseudo'],'mdp' => $_POST['mdp'],'mail' =>"",'admin' => "no"]);
				$erreur= $client-> createOne($client);
			  $client= $client->getByData($_POST['pseudo']);

				if ($erreur==0)
				$_SESSION['pseudo'] = $client->pseudo();
		    $_SESSION['mail'] = $client->mail();
				$_SESSION['id'] = $client->id();
		    $_SESSION['admin'] = $client->admin();
				header ("location: ./profil_client");
			}
	 }
	 else {
			$erreur = 'Au moins un des champs est vide.';
	 }
}

require_once "controllers/panier.php";
$content = "views/inscription.php";
require_once "views/layout.php";

?>
