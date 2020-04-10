<?php
session_start();

require_once 'users.php';
require_once 'db-common.inc.php';


include "includes/helpers.inc.php";
// now retrieve galleries 

// now retrieve  paintings ... either all or a subset based on querystring
 


?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/reset.css" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/login.css" />
    <script src="script/header.js"></script>
</head>
<body >
    <?php outputHeader(); ?>
<main>
    <div id="login">
        <h1>Log In</h1>
        <p><?php echo $loginError; ?></p>
        <form method="post" action=""> 
            <span>Email</span><input type="email" name="email">
            <br>
            <span>Password</span><input type="password" name="password">

            <input type="submit" name="loginButton" id="submit">
        </form>
    </div>
    
</main>    
</body>
</html>