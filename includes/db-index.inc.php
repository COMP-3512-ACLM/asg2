<?php
include "includes/db-favorites.inc.php";

if (isset($_POST['search'])){
    header("Location: browse-movies.php");
}

if (isset($_POST['login'])){
    header("Location: login.php");
}

if (isset($_POST['signUp'])){
    header("Location: signup.php");
}

function faves() {
    if (isset($_SESSION["Favorites"])) {
        faveContent($_SESSION["Favorites"]);
    }else{
        echo "<h1>You have not favorited any movies</h1>";
    }
}

function reccomend(){

}

?>