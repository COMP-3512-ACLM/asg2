<?php
require_once 'includes/db-users.inc.php';

define("LOGO", "Logo");

function outputHeader() {
    echo "<style>";
    echo "
    #log 
    {
        margin-left: 10em;
    }
    #headSearch
    {
        width: 30em;
        background-color: ghostwhite;
    }
    #headSearch input
    {
        width: 15em;
    }
    #headSearch button
    {
        display: none;
    }
    @media only screen and (max-width: 600px) 
    {   
        #log 
        {
            margin-left: 0%;
        }
        #headSearch
        {
            background-color: white;
            width: 5em;
        }
    }";
    echo "</style>";
    
    echo "<header>";
    
    echo '<img src="/asg2-combined/image/film.png">'; //change asg2-combined to new folder if updated
    echo "<button id='menu'><div></div><div></div><div></div></button>";
    
    echo "<nav>";
    
    outputNavLink("Home", "http://localhost/asg2-combined/index.php");
    outputNavLink("Browse", "http://localhost/asg2-combined/browse-movies.php");
    if (isLoggedIn()) {
        outputNavLink("Favorites", "http://localhost/asg2-combined/favorites.php");
    }
    outputNavLink("About", "http://localhost/asg2-combined/about.php");
    
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
        echo "<a href='http://localhost/asg2-combined/login.php' class='login' id='log' >Login</a>";
        echo "<a href='http://localhost/asg2-combined/signup.php' class='login important'>Sign Up</a>";
    }
    
    echo "</nav>";
    
    echo "</header>";
}

function outputNavLink($name, $href) {
    echo "<a href='$href'>$name</a>";
}

?>