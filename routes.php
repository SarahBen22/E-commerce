<?php

class Route {
  private function formatUrl(){

    if (isset($_SERVER["PATH_INFO"])){
      $url = $_SERVER["PATH_INFO"];
    }
    else {
      $url="/home/";
    }

    $urlTrim= trim($url,"/");


    $urlTab=explode ("/", $url);

    return $urlTab;

  }


  public function getController(){

   $controllers= $this->formatUrl();

   //Controlleurs de Connexion / Déconnexion
  if(isset($controllers[2]) && $controllers[2] == "connexion"){
    require_once "controllers/connexion.php";
  }
  else if(isset($controllers[2]) && $controllers[2] == "deconnexion"){
    require_once "controllers/deconnexion.php";
  }

  $controllerPath = "controllers/".$controllers[1].".php";

    // On teste si le fichier existe avant de l'inclure pour eviter une erreur
  if(file_exists($controllerPath)){
    require_once $controllerPath;
    return $controllers;
  }
  else{
    require_once "views/erreur.php";
  }
}
}

?>
