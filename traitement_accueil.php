<?php
require_once "config.php";

$query = "SELECT * FROM Categorie";
$result = mysqli_query($connexion, $query);

if(mysqli_num_rows($result) > 0) {
    echo '<div class="row row-cols-1 row-cols-md-2 g-4">';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col">';
        echo '<div class="card">';
        echo '<img src="' . $row['Photo'] . '" class="card-img-top" alt="' . $row['Nom'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['Nom'] . '</h5>';
        echo '<p class="card-text">' . $row['Description'] . '</p>';
        echo '<a href="idea_categorie.php?categorie_id=' . $row['Id'] . '" class="btn btn-primary">Voir les idées</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "Aucune catégorie disponible pour le moment.";
}

mysqli_close($connexion);
?>

<style>

    .card {
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 10px 4px 8px rgba(0, 0, 0, 0.1);
   
}

.card-img-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    max-height: 200px;
    object-fit: cover;
}

.card-title {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.card-text {
    color: #555;
}

.btn-primary {
    background-color: #00CED1;
    border-color: #FFFF;
}

.btn-primary:hover {
    background-color: #FF007F;
    border-color: #FFFF;
}
</style>


<link rel="stylesheet" href="style.css">
