<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: ./home');
    exit();
    
require_once "controllers/panier.php";
require_once "views/layout.php";
    ?>
