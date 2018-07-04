<?php
require_once "views/navbar.php";

foreach ($CommandesListView as  $commande) {

    echo $commande["num_commande"];
    echo "</br>";
    
    echo $commande["date_de_commande"];
    
    echo "</br>";
    
    }
?>