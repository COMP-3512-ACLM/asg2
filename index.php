<?php

//include "includes/helpers.inc.php";
//include "includes/db-users.inc.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style/reset.css" />
        <link rel="stylesheet" href="style/style.css" />
        <script src="script/header.js"></script>
        <link rel="stylesheet" type="text/css" href="style/index.css" />
    </head>
    <body>
        <?php
            $loggedin = false;  //TODO: temporary, remove this
//isLoggedIn()
            if ($loggedin) {
            //BEGIN Logged in version
            echo "<section id='loged'>";
                echo "<div id='header'>";
                    //outputHeader();
                echo "</div>";

                echo "<div id='UInfo'>";
                    echo "<h2>User Info</h2>";
                    echo "<p>First Name: ";
                    //displayFirst();
                    echo "</p>";
                    echo "<p>Last Name: ";
                    //displayLast();
                    echo "</p>";
                    echo "<p>City: ";
                    //displayCity();
                    echo "</p>";
                    echo "<p>Country: ";
                    //displayCountry();
                    echo "</p>";
                echo "</div>";

                echo "<div id='search'>";
                    echo "<form action='browse-movies.php'>";
                        echo "<input name='search' type='text' placeholder='Search movies' />";
                        echo "<button class='icon'>🔍</button>";
                    echo "</form>";
                echo "</div>";
            
                echo "<div id='favorite'>";
                    echo "<h2>Favorite Movies</h2>";
                echo "</div>";

                echo "<div id='recomend'>";
                    echo "<h2>Movies You May Like</h2>";
                echo "</div>";
            echo "</div>";
            //END Logged in version
            } else { 
            //BEGIN Logged out version
            echo "<div class='landing'>";
                echo "<div class='button-container'>";
                    echo "<a class='login'>Login</a>";
                    echo "<a class='login important'>Sign Up</a>";
                echo "</div>";
                echo "<h1>Search Movies</h1>";
                echo "<form action='browse-movies.php'>";
                    echo "<input name='search' type='text' placeholder='Search movies' />";
                    echo "<button class='icon'>🔍</button>";
                echo "</form>";
            echo "</div>";
            echo "<p id='credit'>Hero image credit goes here</p>";
            //END Logged out version
            }
        ?>
    </body>
</html>