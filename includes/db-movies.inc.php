<?php

include "db-common.inc.php";

define("DBFIELDSBRIEF", "id, tmdb_id, imdb_id, release_date, title, runtime, revenue, tagline, poster_path, vote_average, vote_count, popularity, overview");

// Returns brief, important information on all movies.
function getAllMovies($connection) {
    try {
        $sql = "SELECT " . DBFIELDSBRIEF . " FROM movie";
        return runQuery($connection, $sql, null);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// Returns brief, important information on a single movie.
function getSingleMovieBrief($connection, $id) {
    try {
        $sql = "SELECT " . DBFIELDSBRIEF . " FROM movie WHERE id=?";
        return runQuery($connection, $sql, $id);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// Returns ALL information on a single movie.
function getSingleMovie($connection, $id) {
    try {
        $sql = "SELECT * FROM movie WHERE id=?";
        return runQuery($connection, $sql, $id);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

?>