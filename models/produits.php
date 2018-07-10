<?php

require_once "./models/model.php";

class ProduitsModel extends Model {
	// attributs: correspondance à mes champs ds la bdd
	  private $id;
		private $titre;
		private $id_console;
		private $id_jeux;
		private $annee_de_sortie;
	  private $stock;
		private $prix;
		private $id_pegi;


		public function createOne ($titre, $id_console, $id_jeux, $annee_de_sortie,$stock,$id_pegi){

		$db=parent::connect();

		 // on recherche si le produit est déjà utilisé par un autre membre
		 $sql = 'SELECT * FROM produits WHERE titre="$titre"';
		 $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
		 $result=$req->execute();
		 $data =$req->fetchAll(); //recup les données


		 if (empty($data)) {
				$sql = 'INSERT INTO produits VALUES(0, "$titre","$id_console","$id_jeux","$annee_de_sortie","$stock","$prix","$id_pegi")';
				$req= $db->prepare($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
				 $req->execute();

				return "le produit a bien été ajouté "; // utilisateur a été ajouté
		 }
		 else {
				$erreur = 'le produit n\'a pas été ajouté correctement';
				return $erreur;
		 }

		}

	public function getAll (){

		$db=parent::connect();

		$sql = "select * from produits
		LEFT JOIN consoles on produits.id_console= consoles.id
		LEFT JOIN pegi on produits.id_pegi= pegi.id ";
		$query = $db -> prepare($sql);
		$query -> execute();
		$produitsList= $query -> fetchAll();


		return $produitsList;
	}

	// GETTERS //
	  public function id() { return $this->id; }
	  public function titre() { return $this->titre; }
	  public function id_console() { return $this->id_console; }
	  public function id_jeux() { return $this->id_jeux;}
	  public function annee_de_sortie() { return $this->annee_de_sortie; }
	  public function stock() { return $this->stock; }
		public function prix() { return $this->prix; }
	  public function id_pegi() { return $this->id_pegi; }




		// SETTERS // pour assigner des valeurs aux attributs
		  public function setId( $id ){
		    $id = (int) $id;

		    if($id > 0){
		      $this->id = $id;
		    }
		}

		  public function setTitre( $titre ){
		    if(is_string($titre)){
		      $this->titre = $titre;
		    }
		}

		  public function setId_console( $id_console ){
		    if(is_string($id_console)){
		      $this->id_console = $id_console;
		    }
		}

		  public function setId_jeux( $id_jeux ){
		    if(is_string($id_jeux)){
		      $this->id_jeux = $id_jeux;
		    }
		  }

		  public function setAnnee_de_sortie( $annee_de_sortie){
		      $this->annee_de_sortie = $annee_de_sortie;
		}

		  public function setStock( $stock ){
		    if(is_int($stock )){
		      $this->stock  = $stock ;
		    }
		}

		public function setPrix( $prix ){
			if(is_int($prix)){
				$this->prix  = $prix ;
			}
	}


		  public function setId_pegi( $id_pegi ){
		    if(is_int($id_pegi)){
		      $this->id_pegi = $id_pegi;
		    }
		}

		//UPDATE
			public function update(ProduitsModel $prod){

				$db=parent::connect();

				// On teste d'abord si l'utilisateur existe déjà ou si il est vide
				if($this->exists($prod->titre())){
					return '<p class="red">Le\'produit'.$prod->titre().' est déjà enregistré.</p>';
				}
				elseif($prod->titre() == ''){
					return '<p class="red">Le produit n\'a pas été enregistré correctement.</p>';
				}

				$sql= "UPDATE prod SET titre = :titre, id_console = :id_console, id_jeux = :id_jeux, annee_de_sortie = :annee_de_sortie , stock = :stock, id_pegi = :id_pegi WHERE id=".$prod->id();
				$query= $db -> prepare ($sql);
				$query->bindValue(':titre', $prod->titre());
				$query->bindValue(':id_console', $prod->id_console());
				$query->bindValue(':id_jeux', $prod->id_jeux());
				$query->bindValue(':annee_de_sortie', $prod->annee_de_sortie());
				$query->bindValue(':stock ', $prod->stock());
				$query->bindValue(':prix ', $prod->prix());
				$query->bindValue(':id_pegi', $prod->id_pegi());


				$result = $query -> execute ();

				if($result){	// Si $result est vrai alors la requête c'est bien déroulé
					return '<p class="green">Le\'produit '.$prod->titre().' a bien été modifié.</p>';
				}
				else{
					return '<p class="red">Echec de la modification du \'produit '.$prod->titre().'</p>';
				}
			}




		  // DELETE
		  	public function delete($data){

		  		$db=parent::connect();

		  		if(is_int($data)){
		  			$sql= "DELETE FROM produits WHERE id = ".$data;
		  			$query= $db -> prepare ($sql);
		  			$query -> execute ();

		  			return '<p class="green">Le produit a bien été supprimé.</p>';
		  		}

		  		return '<p class="red">Echec de la suppression du produit.</p>';
		  	}








}


?>
