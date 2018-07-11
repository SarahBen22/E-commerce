<?php
require_once "models/profil_client.php";

// on teste si le visiteur a soumis le formulaire
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {// isset= permet de voir si une variable est définie
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))) {


		$client= new profil_clientModel (['id' => 0 , 'civilite' =>"",'nom' =>"",'prenom' => "",'date_de_naissance' =>"1991-03-01",
		'adresse_postale' => "",'telephone' => "",'pseudo' => "",'mdp' => "",'mail' =>"",'admin' => "no"]);
		$client= $client->getByData($_POST['pseudo']);

		if ($client && password_verify($_POST['mdp'], $client->mdp())){
// password_verify=pour decripter le mdp pour verifier s il correspond au mdp entré par l utilisateur
			$_SESSION['pseudo'] = $client->pseudo();
			$_SESSION['mail'] = $client->mail();
			$_SESSION['id'] = $client->id();
			$_SESSION['admin'] = $client->admin();
			$_SESSION['nom'] = $client->nom();
			$_SESSION['prenom'] = $client->prenom();
			$_SESSION['date_de_naissance'] = $client->date_de_naissance();
			$_SESSION['adresse_postale'] = $client->adresse_postale();
			$_SESSION['telephone'] = $client->telephone();
			$_SESSION['civilite'] = $client->civilite();
			$_SESSION['mail'] = $client->mail();
			$_SESSION['mdp'] = $client->mdp();
			// on met tous les $ session afin de recup les données à chaque connexion

			header('Location: ./home');
		}
		else{

			$erreur= 'l\'un des champs est incorrect';
		}
	}
	else {
		$erreur = 'Au moins un des champs est vide.';
	}
}

require_once "controllers/panier.php";
$content = "views/connexion.php";
require_once "views/layout.php";

?>
