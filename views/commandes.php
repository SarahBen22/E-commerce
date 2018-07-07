<?php
require_once "views/navbar.php";
if (isset($_SESSION['id'])){
?>






<table class="tableau">

  <tr> <!-- tr= ligne -->
    <th>Numéro client</th> <!--th= colonne-->
    <td> <?php  echo '.$id_client.';?> </td> <!-- td= cellule-->
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
<<<<<<< HEAD
=======
?>

</tr>

>>>>>>> 9787d56b49fb3c5d84ae7e3c25c2c86040857d30

echo '</tr>';

echo '</table>';
}
?>
