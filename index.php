<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./images/building.webp" alt="logo"></a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Idée</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Connexcion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="banner">
            <img src="./images/back1.avif" alt="banniere">
            <h1> Collaborez, partagez et votez pour les meilleures idées.</h1>
            <p>Rejoignez la communauté InnovateTech Solutions et partagez vos idées !</p>
        </div>
    </header>
    <main>
        <section class="login-registration">
            <h2>Connexion ou inscription</h2>
            <div class="links">
                <a href="login.php"><button>Se connecter</button></a>
                <a href="register.php"><button>S'inscrire</button></a>
            </div>
        </section>
        <section class="categories">
            <h2>Les Catégories</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                    <img src="./images/devweb.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">DEVELOPPEMENT WEB</h5>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                    <img src="./images/mobile.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">DEVELOPPEMEBT D'APPLICATION MOBILE</h5>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                    <img src="./images/IA.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">INTELLIGENCE ARTIFICIELLE</h5>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                    <img src="./images/securite.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">SECURITÉ INFORMATIQUE</h5>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer_principal">
          <div class="slogan">
            <div class="logo">
              <img src="images/building.webp" alt="Logo">
            </div>
            <div class="le_paragraphe_footer">
              <p>Collaborez, partagez et votez pour les meilleures idées.</p>
            </div>
          </div>
  
          <div class="nav-bar_footer">
            <ul>
              <li><a href="index.php">ACCUEIL</a></li>
              <li><a href="">SERVICES</a></li>
              <li><a href="">BLOG</a></li>
              <li><a href="">CONTACT</a></li>
            </ul>
          </div>
          
        </div>
  
        <div class="Copyright">
          Copyright@InnovateTech2024
        </div>
    </footer>
</body>
</html>