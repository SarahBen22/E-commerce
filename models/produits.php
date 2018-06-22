<?php

require_once "./models/model.php";

class ProduitsModel extends Model {

	public function getAll (){

		$db=parent::connect();

		$sql = "select * from produits";
		$query = $db -> prepare("select * from produits");
		$query -> execute();
		$produitsList= $query -> fetchAll();

		return $produitsList;
	}
}

?>
