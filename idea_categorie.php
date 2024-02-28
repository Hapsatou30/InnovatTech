<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les idées de cette categorie</title>
    <link rel="stylesheet" href="idea_categorie.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
<?php
    require_once "header.php";
    ?>
    <main>
      
<?php
require_once "config.php";

if(isset($_GET['categorie_id'])) {
    $categorie_id = $_GET['categorie_id'];

    $query = "SELECT * FROM Idee WHERE Id_categorie = $categorie_id";
    $result = mysqli_query($connexion, $query);

    if(mysqli_num_rows($result) > 0) {
        echo '<div class="container">';
        echo '<h1>Les idées dans cette catégorie</h1>';
        echo '<table class="table table-hover table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Titre</th>';
        echo '<th scope="col">Description</th>';
        echo '<th scope="col">Date de création</th>';
        echo '<th scope="col">Statut</th>';
        echo '<th scope="col">Modifier</th>';
        echo '<th scope="col">Supprimer</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['Titre'] . '</td>';
            echo '<td>' . $row['Description'] . '</td>';
            echo '<td>' . $row['Date_creation'] . '</td>';
            echo '<td>' . $row['Statut'] . '</td>';
            echo '<td><a href="update.php?Id=' . $row['Id'] . '" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 15 15"><path fill="#00CED1" fill-rule="evenodd" d="M1.903 7.297c0 3.044 2.207 5.118 4.686 5.547a.521.521 0 1 1-.178 1.027C3.5 13.367.861 10.913.861 7.297c0-1.537.699-2.745 1.515-3.663c.585-.658 1.254-1.193 1.792-1.602H2.532a.5.5 0 0 1 0-1h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V2.686l-.001.002c-.572.43-1.27.957-1.875 1.638c-.715.804-1.253 1.776-1.253 2.97m11.108.406c0-3.012-2.16-5.073-4.607-5.533a.521.521 0 1 1 .192-1.024c2.874.54 5.457 2.98 5.457 6.557c0 1.537-.699 2.744-1.515 3.663c-.585.658-1.254 1.193-1.792 1.602h1.636a.5.5 0 1 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 1 1 1 0v1.845h.002c.571-.432 1.27-.958 1.874-1.64c.715-.803 1.253-1.775 1.253-2.97" clip-rule="evenodd"/></svg></a></td>';
            echo '<td><a href="delete.php?Id=' . $row['Id'] . '" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="#FF007F" d="M6 21h12V7H6zM19 4h-3.5l-1-1h-5l-1 1H5v2h14z"/></svg></a></td>';
         
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo "Aucune idée disponible pour cette catégorie.";
    }
} else {
    echo "Erreur: Aucune catégorie sélectionnée.";
}

mysqli_close($connexion);
?>

</body>
</html>