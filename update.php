
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
<?php 
    require_once "header.php";
          /* Inclure le fichier config */
          require_once "config.php";

?>
<?php
if(isset($_GET['Id'])){
    $Id = $_GET['Id'];
                $query = "SELECT * FROM Idee WHERE Id = '$Id'";


                $result =mysqli_query($connexion, $query);

                if(!$result){
                    die("La connexion a échoué : " . $connexion->connect_error);
                }
                else{
                    $row = mysqli_fetch_assoc($result);

                } 
            }              
?>

<?php
  if(isset($_POST['modifier'])){
    // Vérifiez si l'ID a été transmis via GET
    if(isset($_GET['Id'])){
        $Id = $_GET['Id'];
    }
    // Récupérez les valeurs des champs du formulaire
    $Titre = $_POST['Titre'];
    $Description = $_POST['Description'];
    $Date_creation = $_POST['Date_creation'];
    $Statut = $_POST['Statut'];
    $Id_utilisateur = $_POST['Id_utilisateur'];

    // Utilisez une requête préparée pour éviter les injections SQL
    $query = "UPDATE Idee SET Titre = ?, Description = ?, Date_creation = ?, Statut = ?, Id_utilisateur = ? WHERE Id = ?";
    $stmt = $connexion->prepare($query);
    $stmt->bind_param("ssssii", $Titre, $Description, $Date_creation, $Statut, $Id_utilisateur, $Id);
    // Exécutez la requête
    if($stmt->execute()){
        // Redirigez l'utilisateur vers la page idea.php après la modification réussie
        header('Location: idea.php?success=modification-réussie');
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        die("La modification a échoué : " . $stmt->error);
    }
}

?>
<div class="container">
<form action="update.php?Id= <?php  echo $Id; ?>" method="post">
    <div class="form-group">
        <label for=""> Titre</label>
        <input type="text" name="Titre" class="form-control" value="<?php echo $row['Titre'] ?>">
    </div>
    <div class="form-group">
        <label for=""> Description</label>
        <input type="text" name="Description" class="form-control" value="<?php echo $row['Description'] ?>">
    </div>
    <div class="form-group">
        <label for=""> Date_creation</label>
        <input type="text" name="Date_creation" class="form-control" value="<?php echo $row['Date_creation'] ?>">
    </div>
    <div class="form-group">
        <label for=""> Statut</label>
        <input type="text" name="Statut" class="form-control" value="<?php echo $row['Statut'] ?>">
    </div>
    <div class="form-group">
        <label for="">Id_utilisateur</label>
        <input type="text" name="Id_utilisateur" class="form-control" value="<?php echo $row['Id_utilisateur'] ?>">
    </div>
    <input type="submit" class="btn btn-primary " name="modifier" value="Modifier">
    </form>
</div>
    
</body>
</html>