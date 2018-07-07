<?php
require_once "views/navbar.php";

foreach ($ProduitsListView as  $produit) {

echo $produit["Titre"];
echo "</br>";

echo $produit["nom_console"];

echo "</br>";

echo $produit["id_jeux"];
echo "</br>";


echo $produit["annee_de_sortie"];
echo "</br>";

echo $produit["stock"];
echo "</br>";

echo $produit["prix"];
echo "</br>";


echo $produit["id_pegi"];
echo "</br>";

}
?>
