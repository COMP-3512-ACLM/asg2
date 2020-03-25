<?php

include "includes/db-movies.inc.php";

header("ContentType: application/json");
header("Access-Control-Allow-Origin: *");

$connection = getConnection();

if (isset($_GET["id"])) {
    $data = getSingleMovie($connection, $_GET["id"]);
} else {
    $data = getAllMovies($connection);
}

echo json_encode($data->fetchAll(PDO::FETCH_ASSOC), JSON_NUMERIC_CHECK);

$connection = null;

?>