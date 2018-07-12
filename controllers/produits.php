<?php

require_once "models/produits.php";

$produits =new ProduitsModel(); //On créer un nouvel objet Produits

// ---------------- RECUPERATION DE LA LISTE DES PRODUITS ----------------//
//Si la variable console est passer en methode GET (via l'url)
if(isset($_GET['console'])){

  // On récupère seulement les produits qui appartiènnent à une certaine console
  $ProduitsListView= $produits->getByConsole($_GET['console']);

}else{

  // Sinon on récupère tous les produits
  $ProduitsListView= $produits->getAll();

}
// --------------------- FIN ----------------------//


// ---------------- PANIER ----------------//
// Ajout d'un produit au panier si le formulaire id_product est défini
if(isset($_POST['id_product'])){

  // On récupère les informations du produit dans un objet
  $product = new ProduitsModel(['id' => 0,'prix'=>0]);
  $product = $product->get((int)$_POST['id_product']); // En fonction de son id

  // Si l'objet existe réellement (pas d'erreur)
  if($product){

    // On place toutes ses information dans un tableau $newProduct
    $newProduct["id"] = $product->id();
    $newProduct["titre"] = $product->Titre();
    $newProduct["id_console"] = $product->id_console();
    $newProduct["id_jeux"] = $product->id_jeux();
    $newProduct["annee_de_sortie"] = $product->annee_de_sortie();
    $newProduct["stock"] = $product->stock();
    $newProduct["prix"] = $product->prix();
    $newProduct["id_pegi"] = $product->id_pegi();
    $newProduct["jaquettes"] = $product->jaquettes();
    $newProduct["quantite"] = 0;

    // Les articles du panier sont placés dans un tableau en variable de SESSION
    if(isset($_SESSION["panier"])){ // Si le panier est défini

      //On vérifie si le produit existe déjà dans le panier
      if(isset($_SESSION["panier"][$_POST['id_product']]))
      {
        // Si il existe on ajoute le prix au total, on ajoute à la quantité
        $_SESSION['total'] += $newProduct["prix"];
        $newProduct["quantite"] = $_SESSION["panier"][$_POST['id_product']]['quantite']+1;
        unset($_SESSION["panier"][$_POST['id_product']]); // on enlève l'ancienne variable pour ajouter la nouvelle plus loin
      }
      else{
        //Sinon on défini la quantité à 1 et on ajoute le prix au total
        $newProduct["quantite"] = 1;
        $_SESSION['total'] += $newProduct["prix"];
      }
    }
    else{ // Si le panier n'est pas défini on initialise la quantité et le montant total
      $newProduct["quantite"] = 1;
      $_SESSION['total'] = $newProduct["prix"];
    }

    // Enfin on ajoute le tableau $newProduct au tableau $_SESSION[panier]
    // La clée utilisée est l'id du produit pour le retrouver facilement
    $_SESSION["panier"][$_POST['id_product']] = $newProduct;
  }
}

// Suppression d'un produit du panier
if(isset($_GET["remove_id"]) && isset($_SESSION["panier"])) // Si le panier et la variable remove_id existes
{
  $id_product = $_GET["remove_id"]; //On récupère l'id du produit à supprimer

  // Si la quantité est infèrieur ou égale à 1
  if(isset($_SESSION["panier"][$id_product]) && $_SESSION["panier"][$id_product]['quantite'] <= 1)
  {
    $_SESSION['total'] -= $_SESSION["panier"][$id_product]['prix']; // On soustrait le prix au total
    unset($_SESSION["panier"][$id_product]); // On enlève l'article de la variable de session
  }
  elseif(isset($_SESSION["panier"][$id_product])){
    // Sinon en soustrait simplement 1 à quantité et on soustrait le prix au total
    $_SESSION['total'] -= $_SESSION["panier"][$id_product]['prix'];
    $_SESSION["panier"][$id_product]['quantite']--;
  }
}

// Suppression de tous les articles du panier
if(isset($_GET["action"]) && $_GET["action"] == 'emptycart' && isset($_SESSION["panier"]))
{
  // Si la variable action est défini et vaut emptycart
  $_SESSION['total'] = 0; // Le total vaut 0

  // On fait une boucle pour enlevé tous les articles de la variable de session
  foreach($_SESSION["panier"] as $product){
    unset($_SESSION["panier"][$product['id']]);
  }
}
// ----------------FIN DU PANIER ----------------//


require_once "controllers/panier.php";

// ---------------- AFFICHAGE DE LA VUE ----------------//
$content = "views/produits.php";
require_once "views/layout.php";
?>
