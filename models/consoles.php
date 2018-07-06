<?php


require_once "./models/model.php";

class consolesModel extends Model {
// attributs: correspondance à mes champs ds la bdd
  private $id;
	private $nom_console;



  public function createOne ($nom_console){

	$db=parent::connect();

   // on recherche si ce login est déjà utilisé par un autre membre
   $sql = 'SELECT * FROM consoles WHERE nom_console="$nom_console"';
   $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
   $result=$req->execute();
   $data =$req->fetchAll(); //recup les données


   if (empty($data)) {
      $sql = 'INSERT INTO consoles VALUES(0,"$nom_console")';
      $req= $db->prepare($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
       $req->execute();

      return "Félicitation, votre ajout de console a bien été prise en compte"; // utilisateur a été ajouté
   }
   else {
      $erreur = 'Votre ajout de console n\'a pas été prise en compte.';
      return $erreur;
   }

  }
	public function getAll (){

		$db=parent::connect();

		$sql = "select * from consoles";
		$query = $db -> prepare($sql);
		$query -> execute();
		$consolesList= $query -> fetchAll();

		return $consolesList;
	}


// GETTERS //
  public function id() { return $this->id; }
  public function civilite() { return $this->nom_console; }



// SETTERS // pour assigner des valeurs aux attributs
  public function setId( $id ){
    $id = (int) $id;

    if($id > 0){
      $this->id = $id;
    }
}

  public function setId_client( $nom_console ){
    if(is_int($nom_console)){
      $this->nom_console = $nom_console;
    }
}



//UPDATE
	public function update(ConsolesModel $cons){

		$db=parent::connect();

		// On teste d'abord si la commande existe déjà ou si il est vide
		if($this->exists($cons->nom_console())){
			return '<p class="red">La console est déjà enregistrée.</p>';
		}
		elseif($cons->nom_console() == ''){
			return '<p class="red">La console n\'a pas été correctement modifiée.</p>';
		}

		$sql= "UPDATE cons SET nom_console= :nom_console WHERE id=".$com->id();
		$query= $db -> prepare ($sql);
		$query->bindValue(':nom_console', $cons->nom_console());



		$result = $query -> execute ();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
			return '<p class="green">La console'.$cons->nom_console().' a bien été modifiée.</p>';
		}
		else{
			return '<p class="red">Echec de la modification de la console '.$cons->nom_console().'</p>';
		}
	}




  // DELETE
  	public function delete($data){

  		$db=parent::connect();

  		if(is_int($data)){
  			$sql= "DELETE FROM consoles WHERE id = ".$data;
  			$query= $db -> prepare ($sql);
  			$query -> execute ();

  			return '<p class="green">La console a bien été supprimée.</p>';
  		}

  		return '<p class="red">Echec de la suppression de la console.</p>';
  	}



}



?>
