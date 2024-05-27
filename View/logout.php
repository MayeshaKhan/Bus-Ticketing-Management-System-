<?php
    session_start();
    session_reset();
    session_destroy();
    // setcookie("userType", "", time() - (7 * 24 * 3600), "/");
    // setcookie("id", "", time() - (7 * 24 * 3600), "/");
    // setcookie("email", "", time() - (7 * 24 * 3600), "/");
    header('location: login.php');
?>