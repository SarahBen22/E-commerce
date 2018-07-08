<?php
require_once "views/navbar.php";
?>



<body id="productdisplay">

<?php
foreach ($ProduitsListView as  $produit) {

echo '<div class="card">';
 echo '<img class="card-img-top"'; echo $produit["jaquettes"]; 'alt="Card image cap" style="width:100%">
  		<div class="card-body">';

echo '<h5 class="card-title">'; echo $produit["Titre"]; '</h5>';

echo '<table>
	<tr>
			<th> Sur </th>
			<th> Sortie </th>
			<th> En Stock </th>
			<th> Prix </th>
			<th> PEGI </th>
		</tr>
		<tr>
			<td>'; echo $produit["nom_console"]; echo'</td>
			<td>'; echo $produit["annee_de_sortie"]; echo'</td>
			<td>'; echo $produit["stock"]; echo'</td>
			<td>'; echo $produit["prix"]; echo'</td>
			<td>'; echo $produit["id_pegi"]; echo'</td>


		</tr>
	 </table>';
 echo    '<a href="#" class="btn btn-primary">Ajouter Au Panier</a>
  </div>
</div>';

}
?>




<?php
require_once "views/footer.php";
?>
</body>

<?php  
/* 

echo "</br>";

echo $produit["nom_console"];

echo "</br>";

echo $produit["id_jeux"];
echo "</br>";


echo $produit["annee_de_sortie"];
echo "</br>";

echo $produit["stock"];
echo "</br>";

echo $produit["prix"];
echo "</br>";


echo $produit["id_pegi"];
echo "</br>"; 

*/

?>
