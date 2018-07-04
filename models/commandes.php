<?php

require_once "./models/model.php";

class CommandesModel extends Model {
	// attributs: correspondance à mes champs ds la bdd
	  private $id;
		private $num_commande;
		private $date_de_commande;
		private $id_client;
		private $quantite;
		


		public function createOne ($num_commande, $date_de_commande, $id_client,$quantite){

		$db=parent::connect();

		 // on recherche si ce login est déjà utilisé par un autre membre
		 $sql = 'SELECT * FROM commandes WHERE num_commande="'.$db->quote($num_commande).'"';
		 $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
		 $result=$req->execute();
		 $data =$req->fetchAll(); //recup les données


		 if (empty($data)) {// si rien ds le 1
				$sql = 'INSERT INTO commandes VALUES(0, "'.$db->quote($num_commandes).'","'.$db->quote($date_de_commande).'","'.$db->quote($id_client).'","'.$db->quote($quantite).'")';
				$req= $db->prepare($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
				 $req->execute();

				return "la commande a bien été ajouté "; // utilisateur a été ajouté
		 }
		 else {
				$erreur = 'la commande n\'a pas été ajouté correctement';
				return $erreur;
		 }

		}

	public function getAll (){

		$db=parent::connect();

		$sql = "select * from commandes INNER JOIN produits on commandes.quantite = produits.id";
		$query = $db -> prepare($sql);
		$query -> execute();
		$commandesList= $query -> fetchAll();

		return $commandesList;
	}

	// GETTERS //
	  public function id() { return $this->id; }
	  public function num_commande() { return $this->num_commande; }
	  public function date_de_commande() { return $this->date_de_commande; }
		public function id_client() { return $this->id_client;}
		public function quantite() { return $this->quantite;}
	

		// SETTERS // pour assigner des valeurs aux attributs
		  public function setId( $id ){
		    $id = (int) $id;

		    if($id > 0){
		      $this->id = $id;
		    }
		}

		  public function setNum_commande( $num_commande ){
		    if(is_string($num_commande)){
		      $this->num_commande = $num_commande;
		    }
		}

		  public function setDate_de_commande( $date_de_commande ){
		    if(is_string($date_de_commande)){
		      $this->date_de_commande = $date_de_commande;
		    }
		}

		  public function setId_client( $id_client ){
		    if(is_string($id_client)){
		      $this->id_client = $id_client;
				}
				
			}
			
			public function setQuantite( $quantite ){
		    if(is_int($quantite)){
		      $this->quantite = $quantite;
				}
				
		  }


		//UPDATE
			public function update(CommandesModel $comm){

				$db=parent::connect();

				// On teste d'abord si l'utilisateur existe déjà ou si il est vide
				if($this->exists($comm->num_commande())){
					return '<p class="red">La\'commande'.$comm->num_commande().' est déjà enregistré.</p>';
				}
				elseif($comm->num_commande() == ''){
					return '<p class="red">La commande n\'a pas été enregistré correctement.</p>';
				}

				$sql= "UPDATE comm SET num_commande = :num_commande, date_de_commande = :date_de_commande, id_client = :id_client, quantite = :quantite WHERE id=".$comm->id();
				$query= $db -> prepare ($sql);
				$query->bindValue(':num_commande', $comm->num_commande());
				$query->bindValue(':date_de_commande', $comm->date_de_commande());
				$query->bindValue(':id_client', $comm->id_client());
				$query->bindValue(':quantite', $comm->quantite());
				


				$result = $query -> execute ();

				if($result){	// Si $result est vrai alors la requête c'est bien déroulé
					return '<p class="green">La\'commande '.$comm->num_commande().' a bien été modifié.</p>';
				}
				else{
					return '<p class="red">Echec de la modification de la \'commande '.$comm->num_commande().'</p>';
				}
			}




		  // DELETE
		  	public function delete($data){

		  		$db=parent::connect();

		  		if(is_int($data)){
		  			$sql= "DELETE FROM commandes WHERE id = ".$data;
		  			$query= $db -> prepare ($sql);
		  			$query -> execute ();

		  			return '<p class="green">La commande a bien été supprimé.</p>';
		  		}

		  		return '<p class="red">Echec de la suppression de la commande.</p>';
		  	}








}


?>