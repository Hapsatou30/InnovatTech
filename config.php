<?php
/* Database connexion */
// Connexion à la base de données 
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "Innovate";

// Créer une connexion
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}
?>