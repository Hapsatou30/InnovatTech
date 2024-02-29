<?php
    /* Inclure le fichier config */
    require_once "config.php";
    session_start();

    if(isset($_POST['ajouter'])){
        $Titre = $_POST['Titre'];
        $Description = $_POST['Description'];
        // Utilisez NOW() pour obtenir la date et l'heure actuelles du serveur MySQL
        $Date_creation = date("Y-m-d H:i:s"); // Formatage de la date selon le format attendu (année-mois-jour heure:minute:seconde)
        $Id_categorie = $_POST['Id_categorie'];
        
        // Récupérer l'identifiant de l'utilisateur à partir de la session
        $Id_utilisateur = isset($_SESSION['Id']) ? $_SESSION['Id'] : '';
        
        // Vérifier si l'identifiant de l'utilisateur est valide
        if (empty($Id_utilisateur)){
            // Gérer le cas où l'identifiant de l'utilisateur est invalide
            header('Location: idea.php');
            exit; // Arrêter l'exécution du script
        }

        // Effectuer la requête d'insertion en utilisant les valeurs récupérées
        $query = "INSERT INTO Idee(Titre, Description, Date_creation, Id_utilisateur, Id_categorie)
                  VALUES ('$Titre', '$Description', NOW(), '$Id_utilisateur', '$Id_categorie')";

        $result = mysqli_query($connexion, $query);

        if(!$result){
            // Gérer l'erreur en cas d'échec de l'insertion
            die("La connexion a échoué : " . $connexion->error);
        } else {
            // Rediriger vers la page idea.php après l'insertion réussie
            header('Location: idea.php');
            exit; // Arrêter l'exécution du script
        }
    }
?>
