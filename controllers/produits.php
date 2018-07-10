<?php

require_once "models/produits.php";

$produits =new ProduitsModel();
$ProduitsListView= $produits->getAll();


require_once "controllers/panier.php";
$content = "views/produits.php";
require_once "views/layout.php";

?>
