<?php
require_once "views/navbar.php";
?>
<table class="tablo">
<tr >
<th class="gro">Numero de commande</th>

<th class="gro">Date de commande</th>
</tr>

<?php
foreach ($CommandesListView as  $commande) {

    echo "<tr ><td>".$commande["num_commande"]."</td>  <td>". $commande["date_de_commande"]."</td> </tr> ";
    
    
}

?>



</table>
