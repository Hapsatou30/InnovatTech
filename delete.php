<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
   
   /* Inclure le fichier config */
   require_once "config.php";

?>
<?php
if(isset($_GET['Id'])){
$Id = $_GET['Id']; 

$query = "DELETE FROM Idee WHERE Id = '$Id'";

$result = mysqli_query($connexion, $query);


if(!$result){
 die("La connexion a échoué : " . $connexion->connect_error);
}
else{

     // Afficher une boîte de dialogue de confirmation en JavaScript
     echo "<script>
             if(confirm('Voulez-vous vraiment supprimer cette idée ?')) {
                 window.location.href = 'delete.php?Id=$Id'; // Rediriger vers le script de suppression avec l'ID
             } else {
                 window.location.href = 'idea.php'; // Rediriger vers la page d'idées si l'utilisateur annule la suppression
             }
           </script>";
 

} 
}


?>
</body>
</html>