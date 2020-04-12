<?php
require_once 'includes/db-users.inc.php';

function outputHeader() {
    echo "<style>";
    echo "
    #log 
    {
        margin-left: 90%;
    }
    #headSearch
    {
        width: 50em;
        background-color: ghostwhite;
    }
    #headSearch input
    {
        width: 90%;
    }
    @media only screen and (max-width: 600px) 
    {   
        #log 
        {
            margin-left: 0%;
        }
        #headSearch
        {
            width: 10em;
            background-color: white;
        }
        #headSearch input
        {
            width: 100%;
        }
    }";
    echo "</style>";
    
    echo "<header>";
    
    echo '<img src="image/film.png">'; //change asg2-combined to new folder if updated
    echo "<button id='menu'><div></div><div></div><div></div></button>";
    
    echo "<nav>";
    
    outputNavLink("Home", "index.php");
    outputNavLink("Browse", "browse-movies.php");
    if (isLoggedIn()) {
        outputNavLink("Favorites", "favorites.php");
    }
    outputNavLink("About", "about.php");
    
    echo "<div id='headSearch'>";
        echo "<form method='post' action='includes/db-index.inc.php'>";
            echo "<input name='title' type='text' id='sTitle' placeholder='Search movies' />";
            echo "<button type='submit' name='search' onclick='homeSearch()' class='icon'>🔍</button>";
        echo "</form>";
    echo "</div>";
    
    if (isLoggedIn()) {
        echo "<span>";
        getName();
        echo "</span>";
        echo "<a href='logout.php' class='login'>Log Out</a>";
    } else {
        echo "<a href='login.php' class='login' id='log' >Login</a>";
        echo "<a href='signup.php' class='login important'>Sign Up</a>";
    }
    
    echo "</nav>";
    
    echo "</header>";
}

function outputNavLink($name, $href) {
    echo "<a href='$href'>$name</a>";
}

?>