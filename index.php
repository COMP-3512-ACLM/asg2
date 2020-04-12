<?php
include_once "includes/helpers.inc.php";
include_once "includes/db-users.inc.php";
include_once 'includes/db-index.inc.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style/reset.css" />
        <link rel="stylesheet" href="style/style.css" />
        <script src="script/header.js"></script>
        <script src="script/browse.js"></script>
        <script src="script/recommended.js"></script>
        <link rel="stylesheet" type="text/css" href="style/index.css" />
    </head>
    <body>
        <?php
            //isLoggedIn()
            if (isLoggedIn()) 
            {
            //BEGIN Logged in version
                echo "<section id='loged'>";
                    echo "<div id='header'>";
                        outputHeader();
                    echo "</div>";

                    echo "<div id='UInfo'>";
                        echo "<h2>User Info</h2>";
                        echo "<p>First Name: ";
                        displayFirst();
                        echo "</p>";
                        echo "<p>Last Name: ";
                        displayLast();
                        echo "</p>";
                        echo "<p>City: ";
                        displayCity();
                        echo "</p>";
                        echo "<p>Country: ";
                        displayCountry();
                        echo "</p>";
                    echo "</div>";

                    echo "<div id='search'>";
                        echo "<form method='post' action='includes/db-index.inc.php'>";
                            echo "<input name='title' type='text' id='sTitle' placeholder='Search movies' />";
                            echo "<button type='submit' name='search' onclick='homeSearch()' class='icon'>🔍</button>";
                        echo "</form>";
                    echo "</div>";

                    echo "<div id='favorite'>";
                        faves();
                    echo "</div>";

                    echo "<div id='recommend'>";
                        echo "<h2>Movies You May Like</h2>";
                        recommend();
                    echo "</div>";
                echo "</div>";
            //END Logged in version
            } else 
            { 
            //BEGIN Logged out version
            echo "<div id='header'>";
                outputHeader();
            echo "</div>";
            echo "<div class='landing' id='loggedOut'>";
                echo "<div class='button-container' id='loButtons'>";
                    echo "<form method='post' action='includes/db-index.inc.php'>";
                        echo "<button type='submit' name='login' class='log'>Login</button>";
                        echo "<button type='submit' name='signUp' class='sign'>Sign Up</button>";
                    echo "</form>";
                echo "</div>";
                echo "<div id='loSearch'>";
                    echo "<h1>Search Movies</h1>";
                    echo "<form method='post' action='includes/db-index.inc.php'>";
                        echo "<input name='title' type='text' id='sTitle' placeholder='Search movies' />";
                        echo "<button type='submit' name='search' onclick='homeSearch()' class='icon'>🔍</button>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            //END Logged out version
            }
        ?>
    </body>
</html>