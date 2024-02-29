<?php
/* Inclure le fichier config */
require_once "config.php";

// Récupérer les données du formulaire
$email = isset($_POST['email']) ? $_POST['email'] : '';
$motdepasse = isset($_POST['motdepasse']) ? $_POST['motdepasse'] : '';

// Vérifier si les champs email et motdepasse ne sont pas vides
if(empty($email) || empty($motdepasse)) {
    header('location: index.php?error=veuillez saisir votre email et mot de passe');
    exit;
}

// Préparer et exécuter la requête SQL de vérification
$stmt = $connexion->prepare("SELECT * FROM Utilisateur WHERE Email=? AND Mot_de_passe=?");
$stmt->bind_param("ss", $email, $motdepasse);
$stmt->execute();
$resultat = $stmt->get_result();

if ($resultat->num_rows > 0) {
    // Utilisateur trouvé, connectez l'utilisateur
    session_start();
    $_SESSION['email'] = $email;

    // Récupérer les informations de l'utilisateur
    $utilisateur = $resultat->fetch_assoc();
    $_SESSION['Id'] = $utilisateur['Id']; 
    $_SESSION['prenom'] = $utilisateur['Prenom'];
    $_SESSION['nom'] = $utilisateur['Nom']; 
    $_SESSION['logged'] = true;
    
    header('Location: accueil.php'); // Redirigez l'utilisateur vers la page d'accueil après la connexion
    exit;
} 

// Fermer la connexion
$stmt->close();
$connexion->close();
?>
