<?php


require_once "./models/model.php";

class paiementModel extends Model {
// attributs: correspondance à mes champs ds la bdd
  private $id;
	private $type_de_paiement;
	private $num_de_carte;
	private $date_d_expiration;
	private $cryptogramme;
	private $nom_debiteur;
  private $prenom_debiteur;


  public function createOne (PaiementModel $paiement){

	$db=parent::connect();

      $sql = 'INSERT INTO paiement VALUES(0, "'.$db->quote($paiement-> type_de_paiement()).'","'.$db->quote($paiement->num_de_carte()).'","'.$db->quote($paiement->date_d_expiration()).'","'.$db->quote($paiement->cryptogramme()).'","'.$db->quote($paiement->nom_debiteur()).'","","","'.$db->quote($paiement->prenom_debiteur()).'")';
      $req= $db->prepare($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
      $req->execute();

      return "Félicitation, votre paiement a bien été prise en compte"; // utilisateur a été ajouté
   }

	public function getAll (){

		$db=parent::connect();

		$sql = "select * from paiement";
		$query = $db -> prepare($sql);
		$query -> execute();
		$paiementList= $query -> fetchAll();

		return $paiementList;
	}


// GETTERS //
  public function id() { return $this->id; }
  public function type_de_paiement() { return $this->type_de_paiement; }
  public function num_de_carte() { return $this->num_de_carte; }
  public function cryptogramme() { return $this->cryptogramme; }
  public function nom_debiteur() { return $this->nom_debiteur;}
  public function prenoom_debiteur() { return $this->prenom_debiteur; }


// SETTERS // pour assigner des valeurs aux attributs
  public function setId( $id ){
    $id = (int) $id;

    if($id > 0){
      $this->id = $id;
    }
}

  public function setType_de_paiement( $type_de_paiement ){
    if(is_string($type_de_paiement)){
      $this->type_de_paiement = $type_de_paiement;
    }
}

  public function setNum_de_carte( $num_de_carte ){
    if(is_string($num_de_carte)){
      $this->num_de_carte= $num_de_carte;
    }
}

  public function setCryptogramme( $cryptogramme ){
    if(is_string($cryptogramme )){
      $this->cryptogramme  = $cryptogramme ;
    }
  }

  public function setNom_debiteur( $nom_debiteur){
      $this->nom_debiteur = $nom_debiteur;
}

  public function setPrenom_debiteur( $prenom_debiteur ){
    if(is_int($prenom_debiteur)){
      $this->prenom_debiteur= $prenom_debiteur;
    }
}


//UPDATE
	public function update(paiementModel $pay){

		$db=parent::connect();

		// On teste d'abord si l'utilisateur existe déjà ou si il est vide
		if($this->exists($pay->nom_debiteur())){
			return '<p class="red">Le paiement de '.$pay->nom_debiteur().' est déjà utilisé.</p>';
		}
		elseif($pay->nom_debiteur() == ''){
			return '<p class="red">Le paiement n\'est pas passé.</p>';
		}

		$sql= "UPDATE pay SET civilite = :civilite, nom = :nom, prenom = :prenom, date_de_naissance = : date_de_naissance, genre = :genre, adresse_postale = :adresse_postale , telephone = :telephone, pseudo = :pseudo, mdp= :mdp, mail = :mail WHERE id=".$pay->id();
		$query= $db -> prepare ($sql);
		$query->bindValue(':type_de_paiement', $pay->type_de_paiement());
		$query->bindValue(':num_de_carte', $pay->num_de_carte());
		$query->bindValue(':cryptogramme', $pay->cryptogramme());
		$query->bindValue(':nom_debiteur', $pay->nom_debiteur());
		$query->bindValue(':prenom_debiteur', $pay->prenom_debiteur());

		$result = $query -> execute ();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
			return '<p class="green">L\'utilisateur '.$pay->type_de_paiement().' a bien été modifié.</p>';
		}
		else{
			return '<p class="red">Echec de la modification de l\'utilisateur '.$pay->type_de_paiement().'</p>';
		}
	}




  // DELETE
  	public function delete($data){

  		$db=parent::connect();

  		if(is_int($data)){
  			$sql= "DELETE FROM paiement WHERE id = ".$data;
  			$query= $db -> prepare ($sql);
  			$query -> execute ();

  			return '<p class="green">Le paiement a bien été annulé.</p>';
  		}

  		return '<p class="red">Echec de la suppression du paiement.</p>';
  	}



}



?>
