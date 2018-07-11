<?php
require_once "models/profil_client.php";

// on teste si le visiteur a soumis le formulaire
if (true) {// isset= permet de voir si une variable est définie
  // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
  if (isset($_POST['mail'])) {// on cherche à savoir si la pers a appuyé sur le bouton

     $date_de_naissance = (isset($_POST['date_de_naissance'])) ?  $_POST['date_de_naissance'] : '1907-07-07';

    $client= new profil_clientModel(['id' => $_POST['id'] , 'civilite' =>"mme",'nom' => htmlspecialchars($_POST['nom']),'prenom' =>  htmlspecialchars($_POST['prenom']),'date_de_naissance' => ($date_de_naissance),
    'adresse_postale' =>  htmlspecialchars($_POST['adresse_postale']),'telephone' =>  htmlspecialchars($_POST['telephone']),'pseudo' =>  htmlspecialchars($_POST['pseudo']),'mdp' =>  htmlspecialchars($_POST['mdp']),'mail' =>  htmlspecialchars($_POST['mail']),'admin' => "no"]);

    //htmlspecialchars= protection des données =SECURITE

    $erreur= $client-> update($client);

    if ($erreur==0)
    $_SESSION['pseudo'] = $_POST['pseudo'];

  }
  else {
    $erreur = 'Au moins un des champs est vide.';
  }
}

require_once "controllers/panier.php";
//$content= charger la vue qui correspond au controller dans le layout
$content = "views/profil_client.php";
require_once "views/layout.php";

?>
