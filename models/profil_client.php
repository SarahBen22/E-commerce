<?php


require_once "./models/model.php";

class profil_clientModel extends Model {
// attributs: correspondance à mes champs ds la bdd
  private $id;
	private $civilite;
	private $nom;
	private $prenom;
	private $date_de_naissance;
	private $genre;
  private $adresse_postale;
  private $telephone;
  private $pseudo;
  private $mdp;
  private $mail;


  public function createOne ($pseudo, $mdp){

	$db=parent::connect();
//  $mdp=openssl_encrypt ($mdp,'aes128', '$2a$10$1qAz2wSx3eDc4rFv5tGb5t',true,2048204820482048);// mdp= mot de passe, aes128_= algorithme de cryptage,true=option, 2048*4= un nombre qui fait 16 chiffres=valeur d'initialisation 

   // on recherche si ce login est déjà utilisé par un autre membre
   $sql = 'SELECT * FROM profil_client WHERE pseudo="'.$db->quote($pseudo).'"';
   $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
   $result=$req->execute();
   $data =$req->fetchAll(); //recup les données


   if (empty($data)) {// si rien ds le 1
      $sql = 'INSERT INTO profil_client VALUES(0, "","","","1950-01-01",1,"","","'.$db->quote($pseudo).'", "'.$db->quote($mdp).'", "'.$db->quote($mail).'")';
      $req= $db->prepare($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
       $req->execute();

      return "Félicitation, votre inscription a bien été prise en compte"; // utilisateur a été ajouté
   }
   else {
      $erreur = 'Un membre possède déjà ce pseudo.';
      return $erreur;
   }

  }
	public function getAll (){

		$db=parent::connect();

		$sql = "select * from profil_client";
		$query = $db -> prepare($sql);
		$query -> execute();
		$profil_clientList= $query -> fetchAll();

		return $profil_clientList;
	}


// GETTERS //
  public function id() { return $this->id; }
  public function civilite() { return $this->civilite; }
  public function nom() { return $this->nom; }
  public function prenom() { return $this->prenom; }
  public function date_de_naissance() { return $this->date_de_naissance;}
  public function genre() { return $this->genre; }
  public function adresse_postale() { return $this->adresse_postale; }
  public function telephone() { return $this->telephone; }
  public function pseudo() { return $this->pseudo; }
  public function mdp() { return $this->mdp; }
  public function mail() { return $this->mail; }




// SETTERS // pour assigner des valeurs aux attributs
  public function setId( $id ){
    $id = (int) $id;

    if($id > 0){
      $this->id = $id;
    }
}

  public function setCivilite( $civilite ){
    if(is_string($civilite)){
      $this->civilite = $civilite;
    }
}

  public function setNom( $nom ){
    if(is_string($nom)){
      $this->nom = $nom;
    }
}

  public function setPrenom( $prenom ){
    if(is_string($prenom)){
      $this->prenom = $prenom;
    }
  }

  public function setDate_de_naissance( $Date_de_naissance){
      $this->Date_de_naissance = $Date_de_naissance;
}

  public function setGenre( $genre ){
    if(is_int($genre)){
      $this->genre = $genre;
    }
}

  public function setAdresse_postale( $adresse_postale ){
    if(is_string($adresse_postale)){
      $this->adresse_postale = $adresse_postale;
    }
}
    public function setTelephone( $telephone ){
      if(is_string($telephone)){
        $this->telephone = $telephone;
      }
}

    public function setPseudo( $pseudo ){
      if(is_string($pseudo)){
        $this->pseudo = $pseudo;
        }
}
    public function setMdp( $mdp ){
      if(is_string($mdp)){
        $this->mdp = $mdp;
          }
}

    public function setMail( $mail ){
  if(is_string($mail)){
    $this->mail = $mail;
      }
}


//UPDATE
	public function update(Profil_clientModel $client){

		$db=parent::connect();

		// On teste d'abord si l'utilisateur existe déjà ou si il est vide
		if($this->exists($client->nom_client())){
			return '<p class="red">Le nom d\'utilisateur '.$client->nom_client().' est déjà utilisé.</p>';
		}
		elseif($client->nom_client() == ''){
			return '<p class="red">Le nom d\'utilisateur est vide.</p>';
		}

		$sql= "UPDATE client SET civilite = :civilite, nom = :nom, prenom = :prenom, date_de_naissance = : date_de_naissance, genre = :genre, adresse_postale = :adresse_postale , telephone = :telephone, pseudo = :pseudo, mdp= :mdp, mail = :mail WHERE id=".$client->id();
		$query= $db -> prepare ($sql);
		$query->bindValue(':nom_client', $client->nom_client());
		$query->bindValue(':mot_de_passe', $client->mot_de_passe());
		$query->bindValue(':civilite', $client->civilite());
		$query->bindValue(':prenom', $client->prenom());
		$query->bindValue(':nom', $client->nom());
		$query->bindValue(':adresse', $client->adresse());
		$query->bindValue(':telephone', $client->telephone());
		$query->bindValue(':email', $client->email());

		$result = $query -> execute ();

		if($result){	// Si $result est vrai alors la requête c'est bien déroulé
			return '<p class="green">L\'utilisateur '.$client->nom_client().' à bien été modifié.</p>';
		}
		else{
			return '<p class="red">Echec de la modification de l\'utilisateur '.$client->nom_client().'</p>';
		}
	}




  // DELETE
  	public function delete($data){

  		$db=parent::connect();

  		if(is_int($data)){
  			$sql= "DELETE FROM client WHERE id = ".$data;
  			$query= $db -> prepare ($sql);
  			$query -> execute ();

  			return '<p class="green">L\'utilisateur à bien été supprimé.</p>';
  		}

  		return '<p class="red">Echec de la suppression de l\'utilisateur.</p>';
  	}




































}



?>
