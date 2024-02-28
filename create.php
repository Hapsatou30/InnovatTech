<?php
    /* Inclure le fichier config */
    require_once "config.php";
    if(isset($_POST['ajouter'])){
        $Titre = $_POST['Titre'];
        $Description = $_POST['Description'];
        $Date_creation = $_POST['Date_creation'];
        $Statut= $_POST['Statut'];
        $Id_utilisateur = $_POST['Id_utilisateur'];

        if($Titre == "" || empty($Titre)){
        header('Location:idea.php');
        }
        else{
            $query = "INSERT INTO `Idee`( `Titre`, `Description`, `Date_creation`, `Statut`, `Id_utilisateur`)
             values ('$Titre','$Description', '$Date_creation','$Statut','$Id_utilisateur')";

             $result = mysqli_query($connexion,$query);
             if(!$result){
                die("la connexion a échoue". $connexion->error);
             }
             else{
                header('Location:idea.php');
             }
        }
    }
?>