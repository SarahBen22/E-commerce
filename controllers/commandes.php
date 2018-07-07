<?php
$id_client=

require_once "models/commandes.php";

$commandes =new CommandesModel();
$CommandesListView= $commandes->getById();

$content = "views/commandes.php";
require_once "views/layout.php";


?>
