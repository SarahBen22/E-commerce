<?php


class Model{

	private $user = "root";
	//private $password= "simplonco";
	private $password= "";
	private $dbname= "site_jeux_videos";
	private $host= "localhost";
	private $port= 8088;

	public function connect(){
		try{
			$db= new PDO ("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		}
		catch(PDOException $e) {
			echo "<span class=\"erreur\">Erreur de connexion à la base de données</span>";
		}

	}

}
?>
