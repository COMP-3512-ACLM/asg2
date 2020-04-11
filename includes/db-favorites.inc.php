<?php

include 'includes/db-movies.inc.php';

session_start();

// Function to display a single movie -- Works
function displaySingleMovie ($movie) {     
    //Links to single-movie.php with "id" parameter
    $id = $movie['id'];
    echo '<a href="single-movie.php?id=' .$id . '"><img src = "https://image.tmdb.org/t/p/w92/' . $movie['poster_path'] . '"></a>'; 
    echo '<a href="single-movie.php?id=' .$id . '"><p>' . $movie['title'] .'</p></a>';
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
    echo "<p>No Movies Available</p>";
}


//Function to generate content 
function faveContent ($favorites){ 
    
    // print title of page
    echo '<h1>Favorite Movies</h1>';
    
    // remove All Movies button
    echo '<form method="post">';
    echo '<input type="submit" name="removeAll" value="Remove All Movies">';
    echo '</form>';
    
    //Loop through favorites array and generate all movies in list -- Works
    $conn = getConnection();
    
    foreach ($favorites as $key => $value) {        
        // get movie from database
        $movie = getSingleMovie($conn, $value);
        
        displaySingleMovie($movie);
        
        // remove Movie button
        echo '<form method="GET">';
        echo '<input type="submit" name="remove" value="Remove Movie">';
        echo '<input type="hidden" name="movieId" value=' . $key .'>';
        echo '</form>';
    }
    
    $conn = null;
}
?>