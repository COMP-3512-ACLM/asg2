<?php
require_once "db-favorites.inc.php";
require_once 'db-movies.inc.php';

$connection = getConnection();

if (isset($_POST['search'])){
    header("Location: ../browse-movies.php");
}

if (isset($_POST['login'])){
    echo "<script>alert();</script>";
    header("Location: ../login.php");
}

if (isset($_POST['signUp'])){
    header("Location: ../signup.php");
}

function faves() {
    if (isset($_SESSION["Favorites"])) {
        faveContent($_SESSION["Favorites"]);
    }else{
        echo "<h1>You have not favorited any movies</h1>";
    }
}

function recommend(){
    if (isset($_SESSION["Favorites"]) && $_SESSION["Favorites"] != null) {
        $first_value = reset($_SESSION["Favorites"]);
            echo "<script>recommendMoviesWithFav($first_value);</script>";
    }
    else {
        echo "<script>recommendMoviesWithoutFav();</script>";
    }
}

?>