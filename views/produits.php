<?php
require_once "views/navbar.php";
?>

<body id="productdisplay">



  <?php
  foreach ($ProduitsListView as  $produit) {


    echo '<div class="card cards">';
    echo '<img class="card-img-top" '.$produit["jaquettes"].' alt="Card image cap" style="width:100%">
    <div class="card-body">';

    echo '<h5 class="card-title"> '.$produit["Titre"].' </h5>';

    echo '

    <form method="post" action="./produits">

    <table>
    <tr>
    <th> Sur </th>
    <th> Sortie </th>
    <th> En Stock </th>
    <th> Prix </th>
    <th> PEGI </th>
    </tr>
    <tr>

    <td> '.$produit["nom_console"].'</td>
    <td>'.$produit["annee_de_sortie"].'</td>
    <td>'.$produit["stock"].'</td>
    <td>'.$produit["prix"].'€</td>
    <td>'.$produit["age"].'</td>


    </tr>
    </table>';
    echo    '<input  type= "hidden" name="quantite" value="1">';
    echo    ' <input name="id_product" type="hidden" value="'.$produit['id'].'">';
    echo    '<input  type= "submit" class="btn-product btn-primary" value="Ajouter Au Panier">


    </div>
    </div>
    </form>';

  }
  ?>





</body>
  <?php
  require_once "views/footer.php";
  ?>
