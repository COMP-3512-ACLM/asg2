<?php 
session_start();

$value = $_POST['favorite'];
// Check if favorites exists
if ( !isset($_SESSION["Favorites"])) {
    //If not existing, initialize empty array
    $_SESSION["Favorites"] = [];
} 

if(in_array($value, $_SESSION["Favorites"]))
{
    echo '<script>alert("Movie is already in your favorites");</script>';
    header("Location: single-movie.php?id=" . $value); //go back to requestor page
}
else
{
    array_push($_SESSION["Favorites"], $value);
    header("Location: single-movie.php?id=" . $value); //go back to requestor page
}
//$favorites = $_SESSION["Favorites"]; 

//$favorites = $_GET["id"];

//$_SESSION["Favorites"] = $favorites; 
?>