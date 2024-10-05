<?php
    include_once('../../Model/profile/model.php');

    //declaring variables for all input data
    $old_password = $new_password = $confirm_password = ""; 

    //declaring variables for all input error
    $old_passwordErr = $new_passwordErr = $confirm_passwordErr = ""; 

    session_start();
    if(isset($_SESSION['change_password_form'])){
        

        $change_password_form = $_SESSION['change_password_form'];
        //print_r($change_password_form);
        
        $old_password = $change_password_form['old_password'];
        $new_password = $change_password_form['new_password'];
        $confirm_password = $change_password_form['confirm_password'];

        $old_passwordErr = $change_password_form['old_passwordErr'];
        $new_passwordErr = $change_password_form['new_passwordErr'];
        $confirm_passwordErr = $change_password_form['confirm_passwordErr'];

        $_SESSION['change_password_form'] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../JS/profile/change-password.js"></script>
    <title>Document</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include('../header.php'); 
    ?>
    <h1>Passenger: Change Password</h1>
    <a href="update.php">Update</a> | 
    <a href="change-password.php">Change Password</a> | 
    <a href="security">Security Question</a>

    <form method="post" action="<?php echo htmlspecialchars('../../Controller/profile/change-password_control.php');?>" novalidate onsubmit="return isValid(this);"> 
    <fieldset>
    <legend>Change Password</legend>
        <label for="old_password">old_password :</label>
        <input type="password" id="old_password" name="old_password" value="<?php echo $old_password;?>">
        <span id="old_passwordErr" class="error"><?php echo $old_passwordErr ?></span>

        <label for="new_password">new_password :</label>
        <input type="password" id="new_password" name="new_password" value="<?php echo $new_password;?>">
        <span id="new_passwordErr" class="error"><?php echo $new_passwordErr ?></span>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password;?>">
        <span id="confirm_passwordErr" class="error"><?php echo $confirm_passwordErr ?></span>
    <br><br>
    
    <input type="submit" value="Change Password">
    <br>
    </fieldset>
    </form>
    <?php include_once("../footer.php"); ?>
</body>
</html>