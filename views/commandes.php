<?php
require_once "views/navbar.php";
if (isset($_SESSION['id'])){
  ?>

  <table class="tableau">

    <tr> <!-- tr= ligne -->
      <th class="reduc">Numéro client</th> <!--th= colonne-->
      <td> <?php  echo $id_client;?> </td>
      <td></td>
      <td></td><!-- td= cellule-->
    </tr>
    <hr style="width:50px;">



    <?php
    $calcul= 0;
    foreach ($CommandesListView as  $commande) {

      echo '

      <tr>

      <th class="reduc">Date de commande</th>
      <td > '.$commande["date_de_commande"].' </td>
      <td></td>
      <td></td>
      </tr>
      <tr>
      <th class="reduc">Numéro de commande</th>
      <td class="small"> '.$commande["num_commande"].' </td>
      <td></td>
      <td></td>
      </tr>
      </tr>

        <th class="reduc">Article</th>
        <th class="reduc">Nom</th>
        <th class="reduc">Prix Unitaire</th>
        <th class="reduc">Quantité</th>
    
      </tr>

      <td > <img class= "pic" '.$commande["jaquettes"].'>  </td>
      <td> '.$commande["Titre"].' </td>
      <td> '.$commande["prix"].'€ </td>
<<<<<<< HEAD
      <td> <input  type= "number" name="quantite" value="'.$commande["quantite"].'" ></td>
      <td></td>
      </tr>';

      $calcul= ($commande["prix"] * $commande["quantite"]) + $calcul; // calcule pour le montant total


}
=======
      <td> '.$commande["quantite"].' </td></tr>';

      $calcul= ($commande["prix"] * $commande["quantite"]) + $calcul; // calcule pour le montant total


}
>>>>>>> 56fcacd9f42f35ee6658fa0224bc30b7d58a546e


    echo '
    <tr>
    <td></td>
    <td></td>

    <th>Montant total</th>
    <td>'.$calcul.'€</td>
    </tr>



<tr>
  <td></td>  <td></td><td></td>
<td><a href= "/E-commerce/index.php/paiement"><input type="submit" id= "validation" name="Validation" value="Validation" >
</a></td>


  </tr>
    ';



    echo '</tr>';

    echo '</table>';

}
?>


