<?php
/* Inclure le fichier config */
require_once "config.php";

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$date_inscription= $_POST['date_inscription'];
$motdepasse = $_POST['motdepasse'];

// Préparer et exécuter la requête SQL d'insertion
$requete = "INSERT INTO Utilisateur (Nom, Prenom, Email, Telephone, date_inscription, Mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$telephone', '$date_inscription', '$motdepasse')";

if ($connexion->query($requete) === TRUE) {
   
} else {
    echo "Erreur lors de l'inscription : " . $connexion->error;
}

// Fermer la connexion
$connexion->close();
?>
