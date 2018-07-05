

	<div id="bandeau">
		<img id="logo" src="/E-commerce/img/arcade-logo.png">

		<?php
			echo	'<a class="moncompte" href="/E-commerce/index.php/profil_client">Mon Compte</a>';
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
					echo	'<a class="commandes" href="/E-commerce/index.php/commandes">Commandes</a>';
				?>

			</div>

			<div id="navbar">

				<ul id="menu">
				  	<li><a class="home" href="/E-commerce/">Home</a></li>

				  	<li><a href="news.asp">Par Plateforme</a>
				  		<ul class="plateforme">
							<li><a href="#">PC</a></li>
							<li><a href="#">XBOX ONE</a></li>
							<li><a href="#">PS4</a></li>
							<li><a href="#">WII</a></li>
						</ul>
					</li>

				  	<li><a href="contact.asp">Par Genre</a>
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
				  	<li><a href="about.asp">Meilleurs Ventes</a></li>
				  	<li><a href="about.asp">Mieux Notés</a></li>
				  	<li><a href="about.asp">Offres Spéciales</a></li>
				  	<li><a href="about.asp">Goodies</a></li>
				  	<li class="panier"><a  href="about.asp"><img class="basket" src="/E-commerce/img/cart.png" width="35px" height="35px" ></a></li>
				 	<li id="searchbar">
				  	<form>
						<input type="search" placeholder="recherche" aria-label="Search" >
						<button  type="submit">Rechercher</button>
					</form>
					</li>

				</ul>
			</div>










		<?php

		?>
