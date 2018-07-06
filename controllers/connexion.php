<?php
require_once "models/profil_client.php";

// on teste si le visiteur a soumis le formulaire
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {// isset= permet de voir si une variable est définie
	 // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	 if ((isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))) {


				$client= new profil_clientModel (['id' => 0 , 'civilite' =>"",'nom' =>"",'prenom' => "",'date_de_naissance' =>"1991-03-01",
         'adresse_postale' => "",'telephone' => "",'pseudo' => "",'mdp' => "",'mail' =>"",'admin' => "no"]);
				$client= $client->getByData($_POST['pseudo']);

		if ($client && $_POST['mdp']== $client-> mdp()){
			$_SESSION['pseudo'] = $client->pseudo();
	    $_SESSION['mail'] = $client->mail();
	    $_SESSION['admin'] = $client->admin();
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


$content = "views/connexion.php";
require_once "views/layout.php";

?>
