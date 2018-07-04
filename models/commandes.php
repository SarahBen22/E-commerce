<?php


require_once "./models/model.php";

class commandesModel extends Model {
// attributs: correspondance à mes champs ds la bdd
  private $id;
	private $id_client;
	private $num_commande;
	private $date_de_commande;



  public function createOne ($id_client){

	$db=parent::connect();

   // on recherche si ce login est déjà utilisé par un autre membre
   $sql = 'SELECT * FROM commandes WHERE id_client="'.$db->quote($id_client).'"';
   $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
   $result=$req->execute();
   $data =$req->fetchAll(); //recup les données


   if (empty($data)) {// si rien ds le 1
      $sql = 'INSERT INTO commandes VALUES(0,"'.$db->quote($id_client).'", "'.$db->quote($num_commande).'", "'.$db->quote($date_de_commande).'")';
      $req= $db->prepare($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
       $req->execute();

      return "Félicitation, votre commande a bien été prise en compte"; // utilisateur a été ajouté
   }
   else {
      $erreur = 'Votre commande n\'a pas été prise en compte.';
      return $erreur;
   }

  }
	public function getAll (){

		$db=parent::connect();

		$sql = "select * from commandes";
		$query = $db -> prepare($sql);
		$query -> execute();
		$commandesList= $query -> fetchAll();

		return $commandesList;
	}


// GETTERS //
  public function id() { return $this->id; }
  public function civilite() { return $this->id_client; }
  public function nom() { return $this->num_commande; }
  public function prenom() { return $this->date_de_commande; }


// SETTERS // pour assigner des valeurs aux attributs
  public function setId( $id ){
    $id = (int) $id;

    if($id > 0){
      $this->id = $id;
    }
}

  public function setId_client( $id_client ){
    if(is_int($id_client)){
      $this->id_client = $id_client;
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


//UPDATE
	public function update(CommandesModel $com){

		$db=parent::connect();

		// On teste d'abord si la commande existe déjà ou si il est vide
		if($this->exists($com->id_client())){
			return '<p class="red">La commande de l\'utilisateur '.$com->id_client().' est déjà enregistrée.</p>';
		}
		elseif($client->nom_client() == ''){
			return '<p class="red">La commande de l\'utilisateur est vide.</p>';
		}

		$sql= "UPDATE com SET id_client= :id_client, num_commande = :num_commande, date_de_commande = :date_de_commande WHERE id=".$com->id();
		$query= $db -> prepare ($sql);
		$query->bindValue(':id_client', $com->id_client());
		$query->bindValue(':num_commande', $com->num_commande());
		$query->bindValue(':date_de_commande', $com->date_de_commande());


		$result = $query -> execute ();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
			return '<p class="green">La commande de l\'utilisateur '.$com->id_client().' a bien été modifiée.</p>';
		}
		else{
			return '<p class="red">Echec de la modification de la commande de  l\'utilisateur '.$com->id_client().'</p>';
		}
	}




  // DELETE
  	public function delete($data){

  		$db=parent::connect();

  		if(is_int($data)){
  			$sql= "DELETE FROM commandes WHERE id = ".$data;
  			$query= $db -> prepare ($sql);
  			$query -> execute ();

  			return '<p class="green">La commande a bien été supprimée.</p>';
  		}

  		return '<p class="red">Echec de la suppression de la commande.</p>';
  	}



}



?>
