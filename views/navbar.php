
<div id="bandeau">

	<img id="logo" src="/E-commerce/img/playerstore6.png">

	<?php
	if ($_SESSION){
		echo	'<a class="moncompte" href="/E-commerce/index.php/profil_client">Mon Compte</a>';
	}
	?>

	<?php
	echo	'<a class="inscription" href="/E-commerce/index.php/inscription">Inscription</a>';
	?>

	<?php
	if ($_SESSION){
		echo	'<a class="deconnexion" href="/E-commerce/index.php/deconnexion">Deconnexion</a>';
	}
	else{
		echo	'<a class="connexion" href="/E-commerce/index.php/connexion">Connexion</a>';
	}
	?>

	<?php

	if ($_SESSION){
		echo	'<a class="commandes" href="/E-commerce/index.php/commandes">Commandes</a>';
	}
	?>


</div>


<div id="navbar">

	<ul id="menu">


		<li><a class="home" href="/E-commerce/index.php/home">Home</a></li>

		<li>
			<a href="/E-commerce/index.php/produits">Produits</a>
			<ul id="produits">
				<li><a href="">Par Plateforme</a>

						<li><a href="#">PC</a></li>
						<li><a href="#">XBOX ONE</a></li>
						<li><a href="#">PS4</a></li>
						<li><a href="#">WII</a></li>

				</li>


				<li><a href="">Par Genre</a>

					<ul class="genre">
						<li><a href="#">AVENTURE</a></li>
						<li><a href="#">SIMULATION</a></li>
						<li><a href="#">COURSE</a></li>
						<li><a href="#">COMBAT</a></li>
						<li><a href="#">JEU DE ROLE</a></li>
						<li><a href="#">HORREUR</a></li>
						<li><a href="#">PUZZLE</a></li>
						<li><a href="#">STRATEGIE</a></li>
						<li><a href="#">EDUCATION</a></li>
					</ul>


				</li>

			</ul>
		</li>




		<li><a href="">Meilleures Ventes</a></li>
		<li><a href="">Mieux Notés</a></li>
		<li><a href="">Offres Spéciales</a></li>
		<li><a href="">Goodies</a></li>



		<li class="panier"  onmouseover="affichage('panier')" onmouseout="affichage('panier')">
			<dl>
				<dt>
					<a  href="/E-commerce/index.php/paiement"><img class="basket" src="/E-commerce/img/cart.png" width="35px" height="35px" ></a>
				</dt>

				<dd>
					<div class="dropdown" >
						<div id="cart" >
							<p><span id="in-cart-items-num"> <?php if (isset ($_SESSION ["panier"])){ echo count($_SESSION ["panier"]);}
							else{ echo 0;}?> </span> Article(s)</p>
						</div>


					</dd>
				</dl>
			</li>



			<li id="searchbar">
				<form>
					<input type="search" placeholder="recherche" aria-label="Search" >
					<button  type="submit">Rechercher</button>
				</form>
			</li>

		</ul>
	</div>

<form id="panier" onmouseover="affichage('panier')" onmouseout="affichage('panier')" action="/E-commerce/index.php/paiement" method="post" enctype="multipart/form-data">



		<?php

		$montant= 0;
		echo'	<table class="table">
		<thead>
		<tr>
		<th>Article</th>
		<th>Prix</th>
		<th>Quantité</th>
		<th> <a href="./produits?action=emptycart"><img src="/E-commerce/img/trash.png"></a></th>
		</tr>
		</thead>
		<tbody id="cart-tablebody">';
// le ? = pour integrer des variables avc la méthode GET
		if(isset($_SESSION["panier"])){


			foreach ($_SESSION["panier"] as  $pan){

				$montant= ($pan["prix"] * $pan["quantite"]) + $montant;
				echo'

				<tr>
				<td>'.$pan["titre"].'</td>
				<td>'.$pan["prix"].'€ </td>
				<td>'.$pan["quantite"].'</td>
				<td> <a href= "./produits?remove_id='.$pan['id'].'"> X </a></td>
				</tr>';
			}
		}
		echo '</tbody>


		<tr>
		<th> Total:</th>
		<td>'.$montant.'€</td>
		</tr>

		</table>

		<a href= "/E-commerce/index.php/paiement"<button id="confirm-command">Passer la commande</button></a>
		</form>';







		?>
