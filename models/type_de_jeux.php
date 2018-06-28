<?php

require_once "./models/model.php";

class Type_de_jeuxModel extends Model {
	// attributs: correspondance à mes champs ds la bdd
	  private $id;
		private $nom;


		public function createOne ($Nom){

		$db=parent::connect();

		 // on recherche si ce login est déjà utilisé par un autre membre
		 $sql = 'SELECT * FROM type_de_jeux WHERE nom="'.$db->quote($Nom).'"';
		 $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
		 $result=$req->execute();
		 $data =$req->fetchAll(); //recup les données


		 if (empty($data)) {// si rien ds le 1
				$sql = 'INSERT INTO type_de_jeux VALUES(0, "'.$db->quote($Nom).'")';
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


}


?>
