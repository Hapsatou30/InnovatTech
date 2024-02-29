<?php
require_once('verification.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<style>
    .btn-primary {
    background-color: #00CED1;
    border-color: #FFFF;
    margin-top: 5px;
}

.btn-primary:hover {
    background-color: #FF007F;
    border-color: #FFFF;
}
</style>
<body>
<?php 
    require_once "header.php";
    /* Inclure le fichier config */
    require_once "config.php";
?>
<?php
if(isset($_GET['Id'])){
    $Id = $_GET['Id'];
} else {
    die("Aucun identifiant d'idée fourni.");
}

// Vérifier si l'utilisateur actuel est le propriétaire de l'idée
// Requête SQL pour vérifier le propriétaire de l'idée
$query_check_owner = "SELECT Id_utilisateur FROM Idee WHERE Id = ?";

// Préparation de la requête avec la connexion à la base de données
$stmt_check_owner = $connexion->prepare($query_check_owner);

// Liaison de l'identifiant de l'idée en tant que paramètre à la requête préparée
$stmt_check_owner->bind_param("i", $Id);

// Exécution de la requête préparée
if(!$stmt_check_owner->execute()){
    // Gestion de l'erreur si l'exécution échoue
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Récupération du résultat de la requête
$result_check_owner = $stmt_check_owner->get_result();

// Vérification du résultat de la requête
if($result_check_owner->num_rows === 1){
    // Si une seule ligne est renvoyée en résultat (une idée correspondante est trouvée)
    $row_check_owner = $result_check_owner->fetch_assoc();
    
    // Vérification si l'utilisateur actuel est le propriétaire de l'idée
    if($row_check_owner['Id_utilisateur'] != $_SESSION['Id']){
        // Si l'utilisateur actuel n'est pas le propriétaire de l'idée, afficher un message d'erreur
        die("Vous n'êtes pas autorisé à modifier cette idée.");
    }
} else {
    // Si aucune idée correspondante n'est trouvée, afficher un message d'erreur
    die("Aucune idée trouvée avec cet identifiant.");
}


$query = "SELECT Idee.*, Categorie.Nom AS Nom_categorie, Utilisateur.Prenom AS Proprietaire 
          FROM Idee 
          INNER JOIN Categorie ON Idee.Id_categorie = Categorie.Id 
          INNER JOIN Utilisateur ON Idee.Id_utilisateur = Utilisateur.Id 
          WHERE Idee.Id = ?";
$stmt = $connexion->prepare($query);
$stmt->bind_param("i", $Id); // "i" pour integer
if(!$stmt->execute()){
    die("La connexion a échoué : " . $connexion->connect_error);
}
$result = $stmt->get_result();
if($result->num_rows === 1){
    $row = $result->fetch_assoc();
} else {
    die("Aucune idée trouvée avec cet identifiant.");
}
?>

<?php
if(isset($_POST['modifier'])){
    // Récupérer l'identifiant de l'idée depuis l'URL
    if(isset($_GET['Id'])){
        $Id = $_GET['Id'];
    } else {
        die("Aucun identifiant d'idée fourni.");
    }

    // Récupérer les valeurs des champs du formulaire
    $Titre = $_POST['Titre'];
    $Description = $_POST['Description'];
    $Id_categorie = $_POST['Id_categorie'];
    
    // Récupérer l'identifiant de l'utilisateur à partir de la session
    $Id_utilisateur = isset($_SESSION['Id']) ? $_SESSION['Id'] : '';
    
    // Utiliser une requête préparée pour éviter les injections SQL
    $query = "UPDATE Idee 
              SET Titre = ?, Description = ?, Id_categorie = ? 
              WHERE Id = ? AND Id_utilisateur = ?";
    $stmt = $connexion->prepare($query);
    $stmt->bind_param("sssii", $Titre, $Description, $Id_categorie, $Id, $Id_utilisateur);
    // Exécuter la requête
    if($stmt->execute()){
        // Rediriger l'utilisateur vers la page idea.php après la modification réussie
        header('Location: idea.php?success=modification-réussie');
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        die("La modification a échoué : " . $stmt->error);
    }
}
?>
<div class="container">
    <form action="update.php?Id=<?php echo $Id; ?>" method="post">
        <div class="form-group">
            <label for=""> Propriétaire de l'idée</label>
            <input type="text" value="<?php echo $_SESSION['prenom']; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for=""> Titre</label>
            <input type="text" name="Titre" class="form-control" value="<?php echo $row['Titre']; ?>">
        </div>
        <div class="form-group">
            <label for=""> Description</label>
            <input type="text" name="Description" class="form-control" value="<?php echo $row['Description']; ?>">
        </div>
        <div class="form-group">
            <label for=""> Date_creation</label>
            <input type="text" class="form-control" value="<?php echo $row['Date_creation']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Catégorie</label>
            <select name="Id_categorie" class="form-control">
                <?php
                    $query_categories = "SELECT * FROM Categorie";
                    $result_categories = mysqli_query($connexion, $query_categories);
                    while ($row_categories = mysqli_fetch_assoc($result_categories)) {
                        $selected = ($row_categories['Id'] == $row['Id_categorie']) ? 'selected' : '';
                        echo "<option value='{$row_categories['Id']}' $selected>{$row_categories['Nom']}</option>";
                    }
                ?>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" name="modifier" value="Modifier">
    </form>
</div>
    
</body>
</html>
