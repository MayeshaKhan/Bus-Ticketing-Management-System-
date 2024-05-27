<?php
    include_once "../../../Model/profile/security/model.php";
    session_start();
    $passenger_id = $_SESSION['id'];
    $profileData = getProfile($passenger_id);

    //declaring variables for all input data
    $security_question  = $profileData['security_question'];
    $security_answer = $profileData['security_answer'];

    //declaring variables for all input data
    $password = ""; 

    //declaring variables for all input error
    $security_questionErr = $security_answerErr = $passwordErr = ""; 

    if(isset($_SESSION['update_form'])){

        $update_form = $_SESSION['update_form'];
        // print_r($update_form);
        
        $security_question = $update_form['security_question'];
        $security_answer = $update_form['security_answer'];
        $password = $update_form['password'];

        $security_questionErr = $update_form['security_questionErr'];
        $security_answerErr = $update_form['security_answerErr'];
        $passwordErr = $update_form['passwordErr'];

        $_SESSION['update_form'] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/style.css">
    <script src="../../JS/profile/security/update.js"></script>
    <title>Passenger: Update Security</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../../";
        include_once ('../../header.php');
        include_once('../../../Model/profile/security/model.php');
    ?>
    <h1>Update Security</h1>
    <a href="../update.php">Update</a> | 
    <a href="../change-password.php">Change Password</a> | 
    <a href="../security">Security Question</a>
    <br>
    <form action="<?php echo htmlspecialchars('../../../Controller/profile/security/update_control.php');?>" method="post" onsubmit="return isValid(this);"> 
    <fieldset>
        <legend>Update Security</legend>
        <label for="security_question">[Security Question]</label>
        <input type="text" name="security_question" id="security_question" value="<?php echo $security_question; ?>">
        <span id="security_questionErr" class="error"><?php echo $security_questionErr; ?></span>

        <label for="">[security_answer]</label>
        <input type="text" name="security_answer" id="security_answer" value="<?php echo $security_answer; ?>">
        <span id="security_answerErr" class="error"><?php echo $security_answerErr; ?></span>

        <label for="">[password]</label>
        <input type="password" name="password" id="password" value="<?php echo $password; ?>">
        <span id="passwordErr" class="error"><?php echo $passwordErr; ?></span>

        <input type="submit" value="Update">
        <a href="index.php">Cancel</a>
    </fieldset>
    
    </form>
    <?php include_once("../../footer.php"); ?>
    
</body>
</html>