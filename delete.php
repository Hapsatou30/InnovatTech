<?php 
   session_start();
          /* Inclure le fichier config */
          require_once "config.php";
        
        require_once('verification.php');
?>
<?php


// Vérification si un identifiant d'idée est passé dans l'URL
if(isset($_GET['Id'])){
    // Récupération de l'identifiant de l'idée depuis l'URL
    $Id = $_GET['Id'];

    // Requête SQL pour vérifier si l'utilisateur est le propriétaire de l'idée
    $query_check_owner = "SELECT Id_utilisateur FROM Idee WHERE Id = ?";
    $stmt_check_owner = $connexion->prepare($query_check_owner);
    $stmt_check_owner->bind_param("i", $Id);
    if(!$stmt_check_owner->execute()){
        die("La connexion a échoué : " . $connexion->connect_error);
    }
    $result_check_owner = $stmt_check_owner->get_result();

    // Vérification si l'idée appartient à l'utilisateur actuel
    if($result_check_owner->num_rows === 1){
        $row_check_owner = $result_check_owner->fetch_assoc();
        // Comparaison de l'identifiant de l'utilisateur actuel avec celui de l'idée
        if($row_check_owner['Id_utilisateur'] != $_SESSION['Id']){
            // Si l'utilisateur n'est pas le propriétaire de l'idée, afficher un message d'erreur et arrêter le script
            die("Vous n'êtes pas autorisé à supprimer cette idée.");
        }
    } else {
        // Si aucune idée n'est trouvée avec l'identifiant spécifié, afficher un message d'erreur et arrêter le script
        die("Aucune idée trouvée avec cet identifiant.");
    }

    // Si l'utilisateur est le propriétaire de l'idée, exécuter la requête de suppression
    $query_delete = "DELETE FROM Idee WHERE Id = ?";
    $stmt_delete = $connexion->prepare($query_delete);
    $stmt_delete->bind_param("i", $Id);
    if(!$stmt_delete->execute()){
        die("La suppression de l'idée a échoué : " . $connexion->connect_error);
    }
    // Redirection vers la page idea.php après la suppression réussie
    header('Location: idea.php');
}
?>
