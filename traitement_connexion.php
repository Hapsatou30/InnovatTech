<?php
/* Inclure le fichier config */
require_once "config.php";

// Récupérer les données du formulaire
$email = $_POST['email'];
$motdepasse = $_POST['motdepasse'];

// Préparer et exécuter la requête SQL de vérification
$requete = "SELECT Email, Mot_de_passe FROM Utilisateur WHERE Email='$email' AND Mot_de_passe='$motdepasse'";
$resultat = $connexion->query($requete);

// Vérifier si l'utilisateur existe dans la base de données
if ($resultat->num_rows > 0) {
    // Utilisateur trouvé, connectez l'utilisateur
    session_start();
    $_SESSION['email'] = $email;
    header('Location: index.php'); // Redirigez l'utilisateur vers la page d'accueil après la connexion
    exit;
} else {
    
    header('Location: connexion.php');
}

// Fermer la connexion
$connexion->close();
?>
