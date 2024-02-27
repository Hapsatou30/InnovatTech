<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php
        require_once "header.php";
    ?>
    <h1>Connexion</h1>
    <form action="traitement_connexion.php" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required><br>
        <input type="submit" value="Se connecter">
    </form>
    <?php
    require_once "footer.php";
    ?>
</body>
</html>
