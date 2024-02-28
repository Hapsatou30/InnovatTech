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

    <div class="formulaire">
    <h1>Inscription</h1>
    <form action="traitement_inscription.php" method="post">
        <input type="text" id="nom" name="nom" placeholder="Nom" required><br>
        <input type="text" id="prenom" name="prenom" placeholder="Prenom" required><br>
        <input type="email" id="email" name="email" placeholder="Email" required><br>
        <input type="tel" id="telephone" name="telephone" placeholder="Telephone"><br>
        <input type="text" id="date_inscription" name="date_inscription" placeholder="Date"> <br>
        <input type="password" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required><br>
        <input type="submit" value="S'inscrire">
        <div class="connect">
            <p>Vous avez déjà un compte ? <a href="index.php">Connexion</a></p>
        </div>
    </form>
    </div>
</body>
</html>
