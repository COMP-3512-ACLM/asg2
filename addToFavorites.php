<?php 
session_start();

// Check if favorites exists
if ( !isset($_SESSION["Favorites"])) {
    //If not existing, initialize empty array
    $_SESSION["Favorites"] = [];
} 

$favorites = $_SESSION["Favorites"]; 

$favorites = $_GET["id"];

$_SESSION["Favorites"] = $favorites; 

$header("Location: " . $_SERVER["HTTP_REFERER"]); //go back to requestor page
?>