<?php

require_once "./models/model.php";

class Type_de_jeuxModel extends Model {
	// attributs: correspondance à mes champs ds la bdd
	  private $id;
		private $aventure;
		private $rpg;
		private $course;
		private $horreur;
	  private $education;
	  private $combat;
    private $sport;
    private $strategie;
    private $puzzle;
    private $simulation;


		public function createOne ($aventure, $rpg, $course, $horreur,$education,$combat,$combat,$sport,$strategie,$puzzle,$simulation){

		$db=parent::connect();

		 // on recherche si ce login est déjà utilisé par un autre membre
		 $sql = 'SELECT * FROM type_de_jeux WHERE aventure="'.$db->quote($aventure).'"';
		 $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
		 $result=$req->execute();
		 $data =$req->fetchAll(); //recup les données


		 if (empty($data)) {// si rien ds le 1
				$sql = 'INSERT INTO type_de_jeux VALUES(0, "'.$db->quote($aventure).'", "'.$db->quote($rpg).'","'.$db->quote($course).'","'.$db->quote($horreur).'","'.$db->quote($education).'","'.$db->quote($combat).'","'.$db->quote($sport).'", "'.$db->quote($strategie).'","'.$db->quote($puzzle).'","'.$db->quote($simulation).'")';
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
	  public function aventure() { return $this->aventure; }
	  public function rpg() { return $this->rpg; }
	  public function course() { return $this->course;}
	  public function horreur() { return $this->horreur; }
	  public function education() { return $this->education; }
	  public function combat() { return $this->combat; }
    public function sport() { return $this->sport; }
    public function strategie() { return $this->strategie; }
    public function puzzle() { return $this->puzzle; }
    public function simulation() { return $this->simulation; }

		// SETTERS // pour assigner des valeurs aux attributs
		  public function setId( $id ){
		    $id = (int) $id;

		    if($id > 0){
		      $this->id = $id;
		    }
		}

		  public function setAventure( $aventure ){
		    if(is_string($taventure)){
		      $this->aventure = $aventure;
		    }
		}

		  public function setRpg( $rpg ){
		    if(is_string($rpg)){
		      $this->rpg = $rpg;
		    }
		}

		  public function setCours( $course ){
		    if(is_string($course)){
		      $this->course = $course;
		    }
		  }

		  public function setHorreur( $horreur){
        	if(is_string($horreur)){
		      $this->horreur = $horreur;
		}

		  public function setEducation( $education ){
		    if(is_int($education)){
		      $this->education = $education ;
		    }
		}


		  public function setCombat( $combat ){
		    if(is_string($combat)){
		      $this->combat= $combat;
		    }
		}

    public function setSport( $sport ){
      if(is_string($sport)){
        $this->sport= $sport;
      }
    }

    public function setStrategie( $strategie ){
      if(is_string($strategie)){
        $this->strategie= $strategie;
      }
  }

  public function setPuzzle( $puzzle ){
    if(is_string($puzzle)){
      $this->puzzle= $puzzle;
    }
}

public function setSimulation( $simulation ){
  if(is_string($simulation)){
    $this->simulation= $simulation;
  }
}

}


?>
