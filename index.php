<?php

include "includes/helpers.inc.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style/reset.css" />
        <link rel="stylesheet" href="style/style.css" />
        <script src="script/header.js"></script>
    </head>
    <body>
        <?php
        $loggedin = false; // TODO: temporary, remove this

        if ($loggedin) {
        ?>
        <!-- BEGIN Logged in version -->
        <?php outputHeader() ?>
        
        <!-- END Logged in version -->
        <?php } else { ?>
        <!-- BEGIN Logged out version -->
        <div class="hero-img"></div>
        <div class="landing">
            <h1>Search Movies</h1>
            <form action="browse-movies.php">
                <input name="search" type="text" placeholder="Search movies" />
                <button class="icon">🔍</button>
            </form>
            <div class="button-container">
                <a class="login">Login</a>
                <a class="login important">Sign Up</a>
            </div>
        </div>
        <!-- END Logged out version -->
        <?php
        }
        ?>
    </body>
</html>