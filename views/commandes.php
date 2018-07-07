<?php
require_once "views/navbar.php";
?>





<table class="tableau">

  <tr> <!-- tr= ligne -->
    <th>Numéro client</th> <!--th= colonne-->
    <td> <?php  echo '.$commande["id_client"].';?> </td> <!-- td= cellule-->
</tr>
<hr style="width:50px;">
  <tr>
  <th>Date de commande</th>
  <th>Numéro de commande</th>
  <th>Article</th>
  <th>Prix Unitaire</th>
  <th>Quantité</th>
</tr>

<tr>
  <?php
  foreach ($CommandesListView as  $commande) {

echo '
    <td> '.$commande["date_de_commande"].' </td>
    <td> '.$commande["num_commande"].' </td>
    <td> '.$commande["Titre"].' </td>
    <td> '.$commande["date_de_commande"].' </td>
    <td> '.$commande["quantite"].' </td>';
  }
?>
</tr>







</table>
