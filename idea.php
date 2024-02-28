<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idée</title>
    <link rel="stylesheet" href="idea.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

</head>
<body>
<?php
    require_once "header.php";
    ?>
    <main>
      
        <div class="container">
        <div class="box1">
        <h1>Liste des idées</h1>
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajouter une nouvelle Idée
        </button>
        </div>
        <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date_creation</th>
                        <th>Statut</th>
                        <th>Id_utilisateur</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    /* Inclure le fichier config */
                require_once "config.php";

                $query = "select * from Idee";

                $result =mysqli_query($connexion, $query);

                if(!$result){
                    die("La connexion a échoué : " . $connexion->connect_error);
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['Titre']; ?></td>
                            <td><?php echo $row['Description']; ?></td>
                            <td><?php echo $row['Date_creation']; ?></td>
                            <td><?php echo $row['Statut']; ?></td>
                            <td><?php echo $row['Id_utilisateur']; ?></td>
                            <td><a href="update.php?Id= <?php echo $row['Id']; ?>" class="btn btn-success">Update</a></td>
                            <td><a href="delete.php?Id= <?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a></td>
                            
                       </tr>
                       <?php
                       
                        }
                    }                   
                    
                    ?>
                      
            </table>
    </main>

    
    <?php
    require_once "footer.php";
    ?>
    <!-- Modal -->
    <form action="create.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une idée</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""> Titre</label>
                            <input type="text" name="Titre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""> Description</label>
                            <input type="text" name="Description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""> Date_creation</label>
                            <input type="text" name="Date_creation" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""> Statut</label>
                            <input type="text" name="Statut" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Id_utilisateur</label>
                            <input type="text" name="Id_utilisateur" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <input type="submit" class="btn " name="ajouter" value="Ajouter">
                    </div>
                </div>
            </div>
      </div>
    </form>
    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>

</body>
</html>