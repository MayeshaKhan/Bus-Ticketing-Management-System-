<?php
    
    if(isset($_SESSION) == false){
        session_start();
    }
    
    // if(isset($_COOKIE['userType']) && $_COOKIE['userType']=='passenger'){
    //     $_SESSION["userType"] = $_COOKIE['userType'];
    //     $_SESSION["id"] = $_COOKIE['id'];
    //     $_SESSION["email"] = $_COOKIE['email'];
    // }
    
    if(isset($_SESSION['userType']) && $_SESSION['userType']=='passenger'){
        header("location: passenger.php");
    }
?>
<nav>
    <a href="index.php">Homepage</a>
    <a href="login.php">Login</a>
    <a href="registration.php">Registration</a>
</nav>
