<?php

include "db-common.inc.php";

// Returns brief information on all movies.
function getAllMovies($connection) {
    try {
        // The fields to be selected in the query. This is to make the sql variable more readable and to make it easier to modify the query fields
        $fields = "id, tmdb_id, imdb_id, release_date, title, runtime, revenue, tagline, poster_path, vote_average, vote_count, popularity, overview";
        
        $sql = "SELECT $fields FROM movie";
        return runQuery($connection, $sql, null);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// Returns all information on a single movie.
function getSingleMovie($connection, $id) {
    try {
        $sql = "SELECT * FROM movie WHERE id=?";
        return runQuery($connection, $sql, $id);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

?>