<?php




require_once "models/panier.php";

$panier =new PanierModel();
$PanierListView= $panier->getAll();

$content = "views/navbar.php";
require_once "views/layout.php";











 ?>
