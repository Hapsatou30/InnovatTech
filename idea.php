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
                        <th>Id_categorie</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
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
                            <td><?php echo $row['Id_categorie']; ?></td>
                            <td><a href="update.php?Id= <?php echo $row['Id']; ?>" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 15 15"><path fill="#00CED1" fill-rule="evenodd" d="M1.903 7.297c0 3.044 2.207 5.118 4.686 5.547a.521.521 0 1 1-.178 1.027C3.5 13.367.861 10.913.861 7.297c0-1.537.699-2.745 1.515-3.663c.585-.658 1.254-1.193 1.792-1.602H2.532a.5.5 0 0 1 0-1h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V2.686l-.001.002c-.572.43-1.27.957-1.875 1.638c-.715.804-1.253 1.776-1.253 2.97m11.108.406c0-3.012-2.16-5.073-4.607-5.533a.521.521 0 1 1 .192-1.024c2.874.54 5.457 2.98 5.457 6.557c0 1.537-.699 2.744-1.515 3.663c-.585.658-1.254 1.193-1.792 1.602h1.636a.5.5 0 1 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 1 1 1 0v1.845h.002c.571-.432 1.27-.958 1.874-1.64c.715-.803 1.253-1.775 1.253-2.97" clip-rule="evenodd"/></svg></a></td>
                            <td><a href="delete.php?Id= <?php echo $row['Id']; ?>" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="#FF007F" d="M6 21h12V7H6zM19 4h-3.5l-1-1h-5l-1 1H5v2h14z"/></svg></a></td>
                            
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
                        <div class="form-group">
                            <label for="">Id_categorie</label>
                            <input type="text" name="Id_categorie" class="form-control">
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