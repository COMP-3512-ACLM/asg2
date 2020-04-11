<?php
include_once "includes/db-favorites.inc.php";
include_once 'includes/db-movies.inc.php';
include_once 'includes/db-common.inc.php';



define("FIELDS_BRIEF", "id, tmdb_id, imdb_id, release_date, title, runtime, revenue, tagline, poster_path, vote_average, vote_count, popularity, overview");

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
    $connection = getConnection();
    if (isset($_SESSION["Favorites"])) {
        $first_value = reset($_SESSION["Favorites"]);
        $id = $first_value['id'];
        $date = substr($first_value['release_date'], 0, 3) . "%";
        $avgLow = $first_value['vote_average'] - 0.25;
        $avgHigh = $first_value['vote_average'] + 0.25;

        $sql = "SELECT " . FIELDS_BRIEF . " FROM movie WHERE id != ? AND release_date LIKE ? AND vote_average >= ? AND vote_average <= ?";
        $parameters = array($id, $date, $avgLow, $avgHigh);
        $list = getList($connection, $sql, $parameters);
        if(count($list) >= 10 AND  count($list) <= 15){
            displayRecomends($list);
        }if(count($list) > 15){
            displayRecomends(array_slice($list, 0, 16));
        }else{
            displayRecomends($list);
            displayRecomends(array_slice(getExtras($connection), 0, (9 - count($list))));
        }
    }
    else {
        //Display some random movies according to assignment
        displayRecomends(array_slice(getExtras($connection), 0, 14));
    }

    $connection = null;
}

function getExtras($connection){
    $list = getAllMoviesBrief($connection);
    array_multisort(array_column($list, 'vote_average'), SORT_DESC, $list);
    return($list);
}

function displayRecomends($recc){
    $conn = getConnection();
    
    foreach ($recc as $key => $value) {        
        // get movie from database
        $movie = getSingleMovie($conn, $value);
        
        displaySingleMovie($movie);
    }
    
    $conn = null;
}

function getList($connection, $sql, $parameters){
    try {
        return runQuery($connection, $sql, $parameters);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

?>