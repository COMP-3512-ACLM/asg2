<?php

include 'includes/helpers.inc.php';
include 'includes/db-favorites.inc.php';
require_once 'includes/db-users.inc.php';

// Check if user exists/logged-in
/*
if (!isLoggedIn()) { 
    // User is not logged in ... redirect to login page
    header("Location: login.php");
} 
*/

// Check if favorites exists
if ( !isset($_SESSION["Favorites"])) {
    //If not existing, initialize empty array
    $_SESSION["Favorites"] = [];
}

echo '<link rel="stylesheet" href="style/style.css" />';
echo '<link rel="stylesheet" href="style/browse.css" />';
echo '<link rel="stylesheet" href="style/favorite.css" />';
echo '<script src="script/header.js"></script>';

outputHeader(); //header
    
//$_SESSION["Favorites"] = ['13','1249']; //test case input -- need to be deleted in the finale

if ($_SESSION["Favorites"] === []){
    displayNoMovieMessage();
} else {  
    $favorites = $_SESSION["Favorites"];   
    
    // onClick of remove all movie button
    if ( isset($_POST['removeAll'])) {
         removeAllMovies();
    } 
    
    faveContent($favorites);
    
    // onClick of remove movie button
    if ( isset($_GET['remove'])) {
        removeSingleMovie($_GET['movieId'], $favorites);
    } 
}
?>