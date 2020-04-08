<?php

define("LOGO", "Logo");

function outputHeader() {
    echo "<header>";
    
    echo "<h1 class='logo'>" . LOGO . "</h1>";
    echo "<button id='menu'><div></div><div></div><div></div></button>";
    
    echo "<nav>";
    
    outputNavLink("Home", "#");
    outputNavLink("Browse", "#");
    outputNavLink("Favourites", "#"); /* TODO: check if logged in */
    outputNavLink("About", "#");
    
    echo "<input type='text' placeholder='Search movies' />";
    
    /* TODO: check if logged in */
    echo "<a href='#' class='login'>Login</a>";
    echo "<a href='#' class='login important'>Sign Up</a>";
    
    echo "</nav>";
    
    echo "</header>";
}

function outputNavLink($name, $href) {
    echo "<a href='$href'>$name</a>";
}

?>