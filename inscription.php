<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php
        require_once "header.php";
    ?>
    <h1>Inscription</h1>
    <form action="traitement_inscription.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>
        <label for="telephone">Téléphone :</label>
        <input type="tel" id="telephone" name="telephone"><br>
        <label for="date_inscription">Date_inscription :</label>
        <input type="text" id="date_inscription" name="date_inscription"><br>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required><br>
        <input type="submit" value="S'inscrire">
    </form>
    <?php
    require_once "footer.php";
    ?>
</body>
</html>
