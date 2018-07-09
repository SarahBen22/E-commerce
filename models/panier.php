<?php

require_once "./models/model.php";

class PanierModel extends Model {
	// attributs: correspondance à mes champs ds la bdd
	  private $id;
		private $id_produit;
	  private $id_commande;
		private $quantite;

		public function createOne ($id_produit, $id_commande,$quantite){

		$db=parent::connect();

		 // on recherche si ce login est déjà utilisé par un autre membre
		 $sql = 'SELECT * FROM panier WHERE id_produit= '.$id_produit;
		 $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
		 $result=$req->execute();
		 $data =$req->fetchAll(); //recup les données


		 if (empty($data)) {
				$sql = 'INSERT INTO panier VALUES(0, "'.$id_produit.'","'.$id_commande.'","'.$quantite.'")';
				$req= $db->prepare($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
				 $req->execute();

				return "le produit selectionné a bien été ajouté dans le panier"; // utilisateur a été ajouté
		 }
		 else {
				$erreur = 'le produit selectionné n\'a pas été ajouté correctement dans le panier';
				return $erreur;
		 }

		}

	public function getAll (){

		$db=parent::connect();

		$sql = "select * from panier
		LEFT JOIN produits on panier.id_produit = produits.id
    LEFT JOIN commandes on panier.id_commande = commandes.id ";
		$query = $db -> prepare($sql);
		$query -> execute();
		$panierList= $query -> fetchAll();

		return $panierList;
	}

	// GETTERS //
	  public function id() { return $this->id; }
	  public function id_produit() { return $this->id_produit; }
    public function id_commande() { return $this->id_commande; }
		public function quantite() { return $this->quantite;}

		// SETTERS // pour assigner des valeurs aux attributs
		  public function setId( $id ){
		    $id = (int) $id;

		    if($id > 0){
		      $this->id = $id;
		    }
		}

		  public function setId_produit( $id_produit ){
		    if(is_int($id_produit)){
		      $this->id_produit = $id_produit;
		    }
		}

    public function setCommande( $id_commande ){
      if(is_int($id_commande)){
        $this->id_commande= $id_commande;
      }
  }

	public function setQuantite( $quantite ){
		if(is_int($quantite)){
			$this->quantite = $quantite;
		}

	}

		//UPDATE
			public function update(PanierModel $pan){

				$db=parent::connect();

				// On teste d'abord si l'utilisateur existe déjà ou si il est vide
				if($this->exists($pan>id_produit())){
					return '<p class="red">Le produit '.$pan->nom().' a déjà été ajouté dans le panier.</p>';
				}
				elseif($pan->nom() == ''){
					return '<p class="red">Le panier est vide.</p>';
				}

				$sql= "UPDATE pan SET id_produit = :id_produit, id_commande = :id_commande, quantite = :quantite WHERE id=".$pan->id();
				$query= $db -> prepare ($sql);
				$query->bindValue(':id_produit', $pan->id_produit());
				$query->bindValue(':quantite', $comm->quantite());

				$result = $query -> execute ();

				if($result){	// Si $result est vrai alors la requête c'est bien déroulé
					return '<p class="green">Le panier'.$pan->nom().' a bien été modifié.</p>';
				}
				else{
					return '<p class="red">Echec de la modification du panier '.$pan->nom().'</p>';
				}
			}




		  // DELETE
		  	public function delete($data){

		  		$db=parent::connect();

		  		if(is_int($data)){
		  			$sql= "DELETE FROM panier WHERE id = ".$data;
		  			$query= $db -> prepare ($sql);
		  			$query -> execute ();

		  			return '<p class="green">Le produit a bien été supprimé dans le panier.</p>';
		  		}

		  		return '<p class="red">Echec de la suppression du produit dans le panier.</p>';
		  	}


}


?>
