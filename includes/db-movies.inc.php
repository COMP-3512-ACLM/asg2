<?php

include "db-common.inc.php";

function getAllMovies($connection) {
    try {
        $sql = "SELECT * FROM movie";
        return runQuery($connection, $sql, null);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function getSingleMovie($connection, $id) {
    try {
        $sql = "SELECT * FROM movie WHERE id=?";
        return runQuery($connection, $sql, $id);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

?>