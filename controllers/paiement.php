<?php

require_once "models/paiement.php";

$paiement =new PaiementModel();
$PaiementListView= $paiement->getAll();

require_once "controllers/panier.php";
$content = "views/paiement.php";
require_once "views/layout.php";

?>
