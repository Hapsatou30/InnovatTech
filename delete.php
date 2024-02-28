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
        header('location:idea.php');
    } 
}

    
?>