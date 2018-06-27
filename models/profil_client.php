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


  public function createOne ($pseudo, $mdp){

	$db=parent::connect();

   // on recherche si ce login est déjà utilisé par un autre membre
   $sql = 'SELECT * FROM profil_client WHERE pseudo="'.$db->quote($pseudo).'"';
   $req = $db->prepare($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());// voir s il y a une erreur
   $result=$req->execute();
   $data =$req->fetchAll(); //recup les données


   if (empty($data)) {// si rien ds le 1
      $sql = 'INSERT INTO profil_client VALUES(0, "","","","","","","","'.$db->quote($pseudo).'", "'.$db->quote($mdp).'")';
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



}



?>
