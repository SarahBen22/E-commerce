<?php
$id_client=

require_once "models/commandes.php";
if (isset($_SESSION['id'])){

$id_client= $_SESSION['id'];

$commandes =new CommandesModel();
$CommandesListView= $commandes->getByIdClient($_SESSION['id']);
}
$content = "views/commandes.php";
require_once "views/layout.php";


?>
