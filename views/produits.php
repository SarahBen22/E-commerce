<?php
require_once "views/navbar.php";
?>




<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img\jaquettes\play\img1.jpg" alt="Card image cap" style="width:100%">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>


<?php
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
