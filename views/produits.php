<?php
require_once "views/navbar.php";

foreach ($ProduitsListView as  $produit) {

echo $produit["Titre"];
echo "</br>";

echo $produit["nom_console"];

echo "</br>";

}
?>
