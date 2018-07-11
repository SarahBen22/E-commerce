<?php

require_once "models/produits.php";

$produits =new ProduitsModel();
$ProduitsListView= $produits->getAll();

// Add product to cart
if(isset($_POST['id_product'])){
  $product = new ProduitsModel(['id' => 0,'prix'=>0]);
  $product = $product->get((int)$_POST['id_product']);
  if($product){
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

    if(isset($_SESSION["panier"])){  //if session var already exist
      if(isset($_SESSION["panier"][$_POST['id_product']])) //check item exist in products array
      {
        $_SESSION['total'] += $newProduct["prix"];
        $newProduct["quantite"] = $_SESSION["panier"][$_POST['id_product']]['quantite']+1;
        unset($_SESSION["panier"][$_POST['id_product']]); //unset old item
      }
      else{
        $newProduct["quantite"] = 1;
        $_SESSION['total'] += $newProduct["prix"];
      }
    }
    else{
      $newProduct["quantite"] = 1;
      $_SESSION['total'] = $newProduct["prix"];
    }
    $_SESSION["panier"][$_POST['id_product']] = $newProduct;
  }
}
// Delete product from cart
if(isset($_GET["remove_id"]) && isset($_SESSION["panier"]))
{
  $id_product = $_GET["remove_id"]; //get the product id to remove
  if(isset($_SESSION["panier"][$id_product]) && $_SESSION["panier"][$id_product]['quantite'] <= 1)
  {
    $_SESSION['total'] -= $_SESSION["panier"][$id_product]['prix'];
    unset($_SESSION["panier"][$id_product]);
  }
  elseif(isset($_SESSION["panier"][$id_product])){
    $_SESSION['total'] -= $_SESSION["panier"][$id_product]['prix'];
    $_SESSION["panier"][$id_product]['quantite']--;
  }
}
if(isset($_GET["action"]) && $_GET["action"] == 'emptycart' && isset($_SESSION["panier"]))
{
  $_SESSION['total'] = 0;
  foreach($_SESSION["panier"] as $product){
    unset($_SESSION["panier"][$product['id']]);
  }
}


require_once "controllers/panier.php";
$content = "views/produits.php";
require_once "views/layout.php";

?>
