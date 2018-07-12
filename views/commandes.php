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
    $numCommande = '0';

    // On affiche la liste de toutes les commandes et de tous les articles acheter par l'utilisateur
    foreach ($CommandesListView as  $commande) {

      //Lors de la première commande ou lors d'un changement de commande on affiche le montant total et les titres
      if($numCommande == '0' || $numCommande != $commande["num_commande"]){


        if($numCommande != '0'){ // On affiche le montant totale après avoir afficher une commande
          echo '
          <tr>
            <td class="total"></td>
            <td class="total"></td>

            <th class="total">Montant total</th>
            <td class="total">'.$calcul.'€</td>
          </tr>
          ';

          $calcul = 0;
        }

        $numCommande = $commande["num_commande"];

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
        <tr>
        <th class="reduc">Article</th>
        <th class="reduc">Nom</th>
        <th class="reduc">Prix Unitaire</th>
        <th class="reduc">Quantité</th>

        </tr>';
      }

      // On affiche les informations de chaques articles d'une commande
      echo '<td > <img class= "pic" '.$commande["jaquettes"].'>  </td>
      <td> '.$commande["Titre"].' </td>
      <td> '.$commande["prix"].'€ </td>
      <td> '.$commande["quantite"].' </td>
      <td></td>
      </tr>';

      // Au fur et à mesure on ajoute le prix des articles au total
      $calcul= ($commande["prix"] * $commande["quantite"]) + $calcul; // calcule pour le montant total


    }

    // Montant total de la dernière commande
    echo '
    <tr>
      <td class="total"></td>
      <td class="total"></td>

      <th class="total">Montant total</th>
      <td class="total">'.$calcul.'€</td>
    </tr>
    ';

    // echo'<tr>
    //     <td></td>  <td></td><td></td>
    //     <td><a href= "/E-commerce/index.php/paiement"><input type="submit" id= "validation" name="Validation" value="Validation" >
    //     </a></td>
    //     </tr>';

    echo '</tr>';

    echo '</table>';

  }
  ?>
