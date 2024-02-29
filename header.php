
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./images/building.webp" alt="logo"></a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link"  href="accueil.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="idea.php"> Proposez une nouvelle idée</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="index.php">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
            <p class="Prenom_nom" style="  margin-top:4%; font-size: 20px; color: black; font-weight: bold; font-family: roboto; text-decoration: none; margin-right: 10px;" > <?php echo $prenom ?> <?php echo $nom ?>
            <svg style="margin-left:40%;" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 256 256"><path fill="#FF007F" d="M240 94c0 70-103.79 126.66-108.21 129a8 8 0 0 1-7.58 0C119.79 220.66 16 164 16 94a62.07 62.07 0 0 1 62-62c20.65 0 38.73 8.88 50 23.89C139.27 40.88 157.35 32 178 32a62.07 62.07 0 0 1 62 62"/></svg>
            </p>         
        </nav>
    </header>
</body>
</html>