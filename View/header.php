<?php
if(isset($dir) == false){
    $dir = "";
}
if(isset($_SESSION) == false){
    session_start();
}

if(isset($_SESSION['userType']) && $_SESSION['userType'] == 'passenger'){
    echo '<nav>';
    // echo'<div>';
    echo '<div class="nav-links">';
        echo '<a href="'.$dir.'">Home</a>';
        echo '<a href="'.$dir.'bus">See bus</a>';
        echo '<a href="'.$dir.'coupon">See Coupon</a>';
        echo '<a href="'.$dir.'ticket">My tickets</a>';

        echo '<a href="'.$dir.'profile">Profile</a>';
        echo '<a href="'.$dir.'account">Account</a>';
        echo '<a href="'.$dir.'logout.php" class="logout-link">Logout</a>';
    // echo '</div>';
    echo '</div>';

    echo '</nav>';

    echo '<hr>';

    echo '<h1>Passenger Panel</h1>';
    echo 'ID: ', $_SESSION['id'];
    echo ' | ';
    echo 'Email: ', $_SESSION['email'];
} else {
    header('location: ../');
}
?>