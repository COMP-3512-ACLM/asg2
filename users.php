<?php
require_once 'db-common.inc.php';
$errorMessage = "";
$loginError = "";
if (isset($_POST['loginButton'])){
    login();
}

if (isset($_POST['signupSubmit'])){
    registration();
}

//log in functions--------------------------------------------------------------
function login(){
    try{
        $connection = getConnection();
        if (isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] != "" && $_POST['password'] != ""){
            
            $sql = 'select * from users where email=?';
            $emailEntered = $_POST['email'];
            $user = runQuery ($connection, $sql, array($emailEntered));
            $userRow = $user->fetch(PDO::FETCH_ASSOC);
            $connection = null;
            if (isset($userRow['email'])){
                if($userRow['email'] == $_POST['email']){
                    checkPassword($userRow, $_POST['password']);
                }
            }
            else{//email not found
                $GLOBALS['loginError'] = "The email entered is incorrect";
            }
        }
        else{// missing email or password
            $GLOBALS['loginError'] = "Missing the Email or Password field";
        }
    }catch (PDOException $e){
        die( $e->getMessage() );
    }
}


function checkPassword($row, $passwordEntered){
    $userPass = $row['password'];
    if (password_verify($passwordEntered, $userPass)){
        if(!isset($_SESSION['userLogin'])){
            $_SESSION['userLogin'] = $row;
            header("Location: "); //add the home page
        }     
    }
    else{//incorrect password
        $GLOBALS['loginError'] = "The password entered is incorrect";
    }
}
//end of log in functions--------------------------------------------------

//Sign up functions ---------------------------------------------------------------------------
function registration(){
    $_SESSION['first'] = $_POST['fName'];
    $_SESSION['last'] = $_POST['lName'];
    $_SESSION['uCountry'] = $_POST['country'];
    $_SESSION['uEmail'] = $_POST['newEmail'];
    $_SESSION['uCity'] = $_POST['city'];
    $validEmail = false;
    $validPass = false;
    
    if(isset($_POST['newEmail'])){
        $validEmail = validateEmail($_POST['newEmail']);
    }
    if ($validEmail){
        $validPass = validatePassword($_POST['newPass'], $_POST['confirmPass']);
    }
    
    if($validEmail && $validPass){
        echo "YAT";
        createAccount($_POST['newEmail'], $_POST['newPass']);
    }
}

function createAccount($email, $password){
    try{
        $connection = getConnection(); 
        $hashedPass = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $userId = getId();
        $sql = "insert into users (id, firstname, lastname, city, country, email, password, salt, password_sha256) values (?, ?, ?,  ?, ?, ?, ?, null, null)";
        $tt = runQuery ($connection, $sql, array($userId, $_SESSION['first'], $_SESSION['last'], $_SESSION['uCity'], $_SESSION['uCountry'], $_SESSION['uEmail'], $hashedPass));
        $connection = null;
        session_unset();
    }catch (PDOException $e){
        die( $e->getMessage() );
    }
}

function getId(){
    try{
        $connection = getConnection(); 
        $sql = "select count(id) as numOfAccounts from users";
        $result = runQuery ($connection, $sql, null);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $newId = $row['numOfAccounts'] + 1;
        return $newId;
    }catch (PDOException $e){
        die( $e->getMessage() );
    }
}

function validateEmail($newEmail){
    try{
        $connection = getConnection();
        $sql = 'select email from users';
        $allUsers = runQuery ($connection, $sql, null);
        $connection = null;
        $valid = true;
        foreach ($allUsers as $user){
            if($user['email'] == $newEmail){
                $valid = false;
            }
            
        }
        if(!$valid){//directs them to the home page
            $GLOBALS['errorMessage'] = "The email provided is already in use, please try a different email.";
            
        }
        return $valid;
    }catch (PDOException $e){
        die( $e->getMessage() );
    }
    
}

function validatePassword($password1, $password2){
    $result = null;
    if ($password1 == $password2){
        $result = true;
    }
    else{
        $result = false;
        $GLOBALS['errorMessage'] = "The passwords do not match";
    }
    return $result;
}
//end of sign up functions ---------------------------------------------------------------------------

//log out function
function logout(){
    $_SESSION['userLogin'] = "";
    //header("Location: Index.php")
}

//this will display the user info in a list
function getUserInfo(){
    echo "<ul>";
        echo '<li>' . $_SESSION['userLogin']['firstname'] . '</li>';
        echo '<li>' . $_SESSION['userLogin']['lastname'] . '</li>';
        echo '<li>' . $_SESSION['userLogin']['city'] . '</li>';
        echo '<li>' . $_SESSION['userLogin']['country'] . '</li>';
    echo "</ul>";
    
}



//the following 5 functions are for the form to dipslay the previous data
function displayFirst(){
    if(isset($_SESSION['first'])){
        echo $_SESSION['first'];
    }
    else{
        echo "";
    }
}
function displayLast(){
    if(isset($_SESSION['last'])){
        echo $_SESSION['last'];
    }
    else{
        echo "";
    }
}
function displayCity(){
    if(isset($_SESSION['uCity'])){
        echo $_SESSION['uCity'];
    }
    else{
        echo "";
    }
}
function displayCountry(){
    if(isset($_SESSION['uCountry'])){
        echo $_SESSION['uCountry'];
    }
    else{
        echo "";
    }
}
function displayEmail(){
    if(isset($_SESSION['uEmail'])){
        echo $_SESSION['uEmail'];
    }
    else{
        echo "";
    }
}
?>
