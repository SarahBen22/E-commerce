<?php

require_once "models/commandes.php";

$commandes =new CommandesModel();
$CommandesListView= $commandes->getAll();

$content = "views/commandes.php";
require_once "views/layout.php";

?>
