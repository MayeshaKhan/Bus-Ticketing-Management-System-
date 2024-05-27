<?php
    include_once('../../Model/profile/model.php');

    //declaring variables for all input data
    session_start();
    $profileData = getProfile($_SESSION['id']);

    $uname  = $profileData['uname'];
    $email = $exEmail = $profileData['email'];
    $contact = $profileData['contact'];
    $address = $profileData['address'];

    //declaring variables for all input error
    $unameErr = $emailErr = $contactErr =$addressErr = ""; 

    if(isset($_SESSION['update_form'])){
        

        $update_form = $_SESSION['update_form'];
        print_r($update_form);
        
        $uname   = $update_form['uname'];
        $email   = $update_form['email'];
        $contact   = $update_form['contact'];
        $address   = $update_form['address'];

        $unameErr   = $update_form['unameErr'];
        $emailErr   = $update_form['emailErr'];
        $contactErr   = $update_form['contactErr'];
        $addressErr  = $update_form['addressErr'];

        $_SESSION['update_form'] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../JS/profile/update.js"></script>
    <title>Passenger: Update Profile</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include_once ('../header.php');
    ?>
    <h1>Passenger: Update Profile</h1>
    <a href="update.php">Update</a> | 
    <a href="change-password.php">Change Password</a> | 
    <a href="security">Security Question</a>
    <br>
    <form action="<?php echo htmlspecialchars('../../Controller/profile/update_control.php');?>" method="post" onsubmit="return isValid(this);">
        <fieldset>
            <legend>Update Profile</legend>
            <label for="uname">[User Name]</label>
            <input type="text" name="uname" id="uname" value="<?php echo $uname; ?>">
            <span id="unameErr" class="error"><?php echo $unameErr; ?></span>

            <label for="email">[Email]</label>
            <input type="text" name="email" id="email" value="<?php echo $email; ?>">
            <span id="emailErr" class="error"><?php echo $emailErr; ?></span>

            <label for="">[Contact]</label>
            <input type="text" name="contact" id="contact" value="<?php echo $contact; ?>">
            <span id="contactErr" class="error"><?php echo $contactErr; ?></span>

            <label for="">[Address]</label>
            <input type="text" name="address" id="address" value="<?php echo $address; ?>">
            <span id="addressErr" class="error"><?php echo $addressErr; ?></span>

            <input type="submit" value="Update">
        </fieldset>
    </form>
    <?php include_once("../footer.php"); ?>
    
</body>
</html>