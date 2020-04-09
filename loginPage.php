<?php
session_start();

require_once 'Users.php';
require_once 'db-common.inc.php';

    
// now retrieve galleries 

// now retrieve  paintings ... either all or a subset based on querystring
 


?>
<!DOCTYPE html>
<html lang=en>
<head>
</head>
<body >
    
<main>
    <h1>Log In</h1>
    <p><?php echo $loginError; ?></p>
    <form method="post" action=""> 
        <span>Email</span><input type="email" name="email">
        <br>
        <span>Password</span><input type="password" name="password">
        
        <input type="submit" name="loginButton">
    </form>

    
</main>    
</body>
</html>