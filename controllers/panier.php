<?php




require_once "models/panier.php";

$count= 0;

$panier =new PanierModel();
$PanierListView= $panier->getAll();

foreach ($PanierListView as  $pan){

  $count= $count + $pan["quantite"];
}












 ?>
