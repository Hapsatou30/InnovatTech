<?php
    session_start();
    if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
        header('Location: index.php?error=3');

    }
    $prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';
    $nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : '';