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
    <?php
    require_once "header.php";
    ?>
     <div class="banner">
            <img src="./images/back1.avif" alt="banniere">
            <h1> Collaborez, partagez et votez pour les meilleures idées.</h1>
            <p>Rejoignez la communauté InnovateTech Solutions et partagez vos idées !</p>
        </div>
    <main>
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
    <?php
    require_once "footer.php";
    ?>
   
</body>
</html>