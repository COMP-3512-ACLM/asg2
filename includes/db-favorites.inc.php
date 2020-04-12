<?php

require_once 'db-movies.inc.php';

session_start();

// Function to display a single movie -- Works
function displaySingleMovie ($movie) {     
    //Links to single-movie.php with "id" parameter
    $id = $movie['id'];
    echo '<li>';
    echo '<a href="single-movie.php?id=' .$id . '"><img src = "https://image.tmdb.org/t/p/w92/' . $movie['poster_path'] . '"></a>'; 
    echo '<a href="single-movie.php?id=' .$id . '"><p>' . $movie['title'] .'</p></a>';
    echo '</li>';
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
    echo "<h1>No Movies Available</h1>";
}


//Function to generate content 
function faveContent ($favorites){ 
    
    // print title of page
    echo '<main>';
        echo '<div id="top">';
        echo '<h1>Favorite Movies</h1>';
        // remove All Movies button
        echo '<form method="post">';
        echo '<input type="submit" class="btn" name="removeAll" value="Remove All Movies">';
        echo '</form>';
        echo '</div>';
        //Loop through favorites array and generate all movies in list -- Works
        $conn = getConnection();
        
        echo '<div id="favelist">';
            echo '<ul>';
            foreach ($favorites as $key => $value) {        
                // get movie from database
                $movie = getSingleMovie($conn, $value);

                displaySingleMovie($movie);

                // remove Movie button
                echo '<form method="GET">';
                echo '<input type="submit" class="btn" name="remove" value="Remove Movie">';
                echo '<input type="hidden" name="movieId" value=' . $key .'>';
                echo '</form>';
            }
            echo '</ul>';
        echo '<div>';
    echo '</main>';
    $conn = null;
}
?>