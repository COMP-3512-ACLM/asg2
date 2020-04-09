<?php

include 'includes/helpers.inc.php';
include 'includes/db-movies.inc.php';

session_start();

// Check if user exists
if ( !isset($_SESSION['user'])) { //IDK user??
    // User is not logged in ... redirect to login
    //$header = ("Location:");
} 

// Check if favorites exists
if ( !isset($_SESSION["Favorites"])) {
    //Initialize empty array
    $_SESSION["Favorites"] = [];
} 

if ($_SESSION["Favorites"] === []){
    displayNoMovieMessage();
} else {  
    // print title of page
    echo '<h1>Favorite Movies</h1>';
    
    // remove All Movies button
    echo '<form method="post">';
    echo '<input type="submit" name="removeAll" value="Remove All Movies">';
    echo '</form>';
    
    // onClick of remove all movie button
    if ( isset($_POST['removeAll'])) {
         removeAllMovies();
    }
    
    $favorites = $_SESSION["Favorites"];
    
    faveContent($favorites);
    
    // onClick of remove movie button
    if ( isset($_GET['remove'])) {
        removeSingleMovie($_GET['movieId'], $favorites);
    }
}

// Function to display a single movie -- Works-ish
function displaySingleMovie ($movie) {     
    //link function same as browse-movies.php -- NOT YET IMPLEMENTED
    echo '<img src = "https://image.tmdb.org/t/p/w92/' . $movie['poster_path'] . '">'; 
    echo '<h2>' . $movie['title'] .'</h2>';
}

// Function to remove movie 
function removeSingleMovie ($key, $favorites){
    //remove movie using index/key
    unset($favorites[$key]);
    $_SESSION["Favorites"] = $favorites; 
}

// Function to remove all movies -- Works
function removeAllMovies (){   
    // Set the array to be empty
    $_SESSION["Favorites"] = [];
}

// Function to Display Message
function displayNoMovieMessage(){
    echo "No Movies Available";
}

function faveContent ($favorites){
    //Loop through favorites array and generate all movies in list -- Works
    foreach ($favorites as $key => $value) {        
        // get movie from database
        $conn = getConnection();
        $movie = getSingleMovie($conn, $value);
        
        displaySingleMovie($movie);
        
        // remove Movie button
        echo '<form method="GET">';
        echo '<input type="submit" name="remove" value="Remove Movie">';
        echo '<input type="hidden" name="movieId" value=' . $key .'>';
        echo '</form>';
    }
}

$conn = null;
?>