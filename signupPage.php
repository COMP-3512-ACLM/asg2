<?php
session_start();
require_once 'includes/db-users.inc.php'; 
require_once 'includes/db-common.inc.php';
?>
<!DOCTYPE html>
<html lang=en>
<head>
</head>
<body >
    
<main>
    <h1>Sign Up</h1>
    
    <form method="post" action=""> 
        <p><?php echo $errorMessage; ?></p>
        <br>
        <span>First Name</span><input type="text" placeholder="First Name" name="fName" value="<?php displayFirst(); ?>" required> <br>
        <span>Last Name</span><input type="text" placeholder="Last Name" name="lName" value="<?php displayLast(); ?>" required><br>
        <span>City</span><input type="text" placeholder="City" name="city" value="<?php displayCity(); ?>"  required> <br>
        <span>Country</span><input type="text" placeholder="Country" name="country" value="<?php displayCountry(); ?>"  required> <br>
        <span>Email</span><input type="email" placeholder="email@example.com" name="newEmail" value="<?php displayEmail(); ?>"  required><?php ?><br>
        <span>Password</span><input type="password" minlength="8" name="newPass" required><br>
        <span>Confirm Password</span><input type="password" minlength="8" name="confirmPass" required><br>
        <input type="submit" name="signupSubmit">
            Click
    </form>
    
    
    
</main>    
</body>
</html>