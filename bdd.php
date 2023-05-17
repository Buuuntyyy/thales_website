<?php

    try {
        $bd = new PDO ( "mysql:host=localhost;dbname=thales",
        "root", "" );
        $bd->exec('SET NAMES utf8');
    }
    catch (Exception $e) {
        die ("Erreur: Connexion à la base impossible");
    }

    $sql = "SELECT * FROM udp"; // Stocke le code SQL de la requête
    $req = $bd->prepare ($sql); // Requête préparée
    $req->execute (); // Requête exécutée
    $lesEnreg = $req->fetchall (); // Requête exécutée
    $req->closeCursor (); // Requête détruite
    print_r($lesEnreg);
    
    
?>