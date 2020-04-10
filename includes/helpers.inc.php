<?php

define("LOGO", "Logo");

function outputHeader() {
    echo "<header>";
    
    echo '<img src="film.png">';
    echo "<button id='menu'><div></div><div></div><div></div></button>";
    
    echo "<nav>";
    
    outputNavLink("Home", "#");
    outputNavLink("Browse", "http://localhost/asg2-css/browse-movies.php");
    outputNavLink("Favourites", "#"); /* TODO: check if logged in */
    outputNavLink("About", "http://localhost/asg2-css/about.php");
    
    echo "<form action='browse-movies.php'>";
    echo "<input name='search' type='text' placeholder='Search movies' />";
    echo "</form>";
    
    /* TODO: check if logged in */
    echo "<a href='http://localhost/asg2-css/loginPage.php' class='login'>Login</a>";
    echo "<a href='http://localhost/asg2-css/signupPage.php' class='login important'>Sign Up</a>";
    
    echo "</nav>";
    
    echo "</header>";
}

function outputNavLink($name, $href) {
    echo "<a href='$href'>$name</a>";
}

?>