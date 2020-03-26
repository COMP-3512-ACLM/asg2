<?php

include "includes/db-movies.inc.php";

header("ContentType: application/json");
header("Access-Control-Allow-Origin: *");

$connection = getConnection();

if (isset($_GET["id"])) {
    $data = getSingleMovie($connection, $_GET["id"])->fetch(PDO::FETCH_ASSOC);
} else {
    $data = getAllMovies($connection)->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode($data, JSON_NUMERIC_CHECK);

$connection = null;

?>