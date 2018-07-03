<?php

require_once "models/produits.php";

$produits =new ProduitsModel();
$ProduitsListView= $produits->getAll();

$content = "views/produits.php";
require_once "views/layout.php";

?>
