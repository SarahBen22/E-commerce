<?php
require_once "models/profil_client.php";

// on teste si le visiteur a soumis le formulaire
if (true) {// isset= permet de voir si une variable est définie
	 // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
 if (isset($_POST['mail'])) {
			// on teste les deux mots de passe


				$client= new profil_clientModel(['id' => 0 , 'civilite' =>"",'nom' => htmlspecialchars($_POST['nom']),'prenom' =>  htmlspecialchars($_POST['prenom']),'date_de_naissance' =>  htmlspecialchars($_POST['date_de_naissance']),
         'adresse_postale' =>  htmlspecialchars($_POST['adresse_postale']),'telephone' =>  htmlspecialchars($_POST['telephone']),'pseudo' =>  htmlspecialchars($_POST['pseudo']),'mdp' =>  htmlspecialchars($_POST['mdp']),'mail' =>  htmlspecialchars($_POST['mail']),'admin' => "no"]);
//htmlspecialchars= protection des données
      	$erreur= $client-> update($client);

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
