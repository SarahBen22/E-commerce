<?php
$id_client=

require_once "models/commandes.php";
if (isset($_SESSION['id'])){

$id_client= $_SESSION['id'];

$commandes =new CommandesModel();
$CommandesListView= $commandes->getByIdClient((int)$_SESSION['id']);
}
require_once "controllers/panier.php";
$content = "views/commandes.php";
require_once "views/layout.php";



?>
