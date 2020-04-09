<?php
require_once 'includes/db-users.inc.php';
require_once 'includes/db-common.inc.php';
require_once 'includes/helpers.inc.php';

if (isLoggedIn()) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style/reset.css" />
        <link rel="stylesheet" href="style/style.css" />
        <script src="script/browse.js"></script>
    </head>
    <body>
        <?php outputHeader(); ?>
        <main>
            <h1>Log In</h1>
            <p><?php echo $loginError; ?></p>
            <form method="post" action="" class="login"> 
                <span>Email</span><input type="email" name="email">
                <br>
                <span>Password</span><input type="password" name="password">
                <input type="submit" name="loginButton">
            </form>
        </main>
    </body>
</html>