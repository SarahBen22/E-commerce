<?php

require_once "./models/model.php";

class Type_de_jeuxModel extends Model {
	// attributs: correspondance à mes champs ds la bdd
	  private $id;
		private $nom;


		public function createOne ($Nom){

		$db=parent::connect();

		 // on recherche si ce login est déjà utilisé par un autre membre
		 $sql = 'SELECT * FROM type_de_jeux WHERE nom="$Nom"';
		 $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
		 $result=$req->execute();
		 $data =$req->fetchAll(); //recup les données


		 if (empty($data)) {// si rien ds le 1
				$sql = 'INSERT INTO type_de_jeux VALUES(0, "$Nom")';
				$req= $db->prepare($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
				 $req->execute();

				return "le nouveau type de jeux a bien été ajouté "; // utilisateur a été ajouté
		 }
		 else {
				$erreur = 'le nouveau type de jeux n\'a pas été ajouté correctement';
				return $erreur;
		 }

		}

	public function getAll (){

		$db=parent::connect();

		$sql = "select * from type_de_jeux";
		$query = $db -> prepare($sql);
		$query -> execute();
		$type_de_jeuxList= $query -> fetchAll();

		return $type_de_jeuxList;
	}

	// GETTERS //
	  public function id() { return $this->id; }
	  public function nom() { return $this->nom; }

		// SETTERS // pour assigner des valeurs aux attributs
		  public function setId( $id ){
		    $id = (int) $id;

		    if($id > 0){
		      $this->id = $id;
		    }
		}

		  public function setAventure( $nom ){
		    if(is_string($nom)){
		      $this->nom = $nom;
		    }
		}

		//UPDATE
			public function update(Type_de_jeuxModel $type){

				$db=parent::connect();

				// On teste d'abord si l'utilisateur existe déjà ou si il est vide
				if($this->exists($type->nom())){
					return '<p class="red">Le type de jeux '.$type->nom().' est déjà utilisé.</p>';
				}
				elseif($type->nom() == ''){
					return '<p class="red">Le type de jeu est vide.</p>';
				}

				$sql= "UPDATE client SET nom = :nom WHERE id=".$type->id();
				$query= $db -> prepare ($sql);
				$query->bindValue(':nom', $type->nom());


				$result = $query -> execute ();

				if($result){	// Si $result est vrai alors la requête c'est bien déroulé
					return '<p class="green">Le type de jeu'.$type->nom().' a bien été modifié.</p>';
				}
				else{
					return '<p class="red">Echec de la modification du type de jeu '.$type->nom().'</p>';
				}
			}




		  // DELETE
		  	public function delete($data){

		  		$db=parent::connect();

		  		if(is_int($data)){
		  			$sql= "DELETE FROM type_de_jeux WHERE id = ".$data;
		  			$query= $db -> prepare ($sql);
		  			$query -> execute ();

		  			return '<p class="green">Le type de jeu a bien été supprimé.</p>';
		  		}

		  		return '<p class="red">Echec de la suppression du type de jeu.</p>';
		  	}


}


?>
