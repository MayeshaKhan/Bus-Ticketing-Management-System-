<?php
    session_start();
    //declaring variables for all input data
    $email = $security_answer = $new_password = $confirm_password = ""; 
    //declaring variables for all input error
    $emailErr = $security_answerErr = $new_passwordErr = $confirm_passwordErr = ""; 
    $security_question = "Enter valid email te see security question";
    if(isset($_SESSION['forgot_password_form'])){
        

        $forgot_password_form = $_SESSION['forgot_password_form'];
        // print_r($forgot_password_form);
        
        $email = $forgot_password_form['email'];
        $security_question = $forgot_password_form['security_question'];
        $security_answer = $forgot_password_form['security_answer'];
        $new_password = $forgot_password_form['new_password'];
        $confirm_password = $forgot_password_form['confirm_password'];


        $emailErr = $forgot_password_form['emailErr'];
        $security_answerErr = $forgot_password_form['security_answerErr'];
        $new_passwordErr = $forgot_password_form['new_passwordErr'];
        $confirm_passwordErr = $forgot_password_form['confirm_passwordErr'];

        $_SESSION['forgot_password_form'] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/forgot_password.js"></script>
    <title>Forgot Password</title>
</head>
<body>
    <?php
        include('home_header.php');
        
    ?>
    <h1 class= "header"> Bus ticketing management system</h1> 
    <h1>Forgot Password</h1>
    <form method="post" action="<?php echo htmlspecialchars('../Controller/forgot_password_control.php');?>" novalidate  onsubmit="return isValid(this);"> 
    <fieldset>
    <legend>Forgot Password</legend>
        <label for="email" >Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email;?>">
        <span id="emailErr" class="error"><?php echo $emailErr ?></span>
            
        <label for="security_question">security_question :</label>
        <input disabled type="text" id="security_question" name="security_question" value="<?php echo $security_question;?>">
        
        <label for="security_answer">security_answer :</label>
        <input type="text" id="security_answer" name="security_answer" value="<?php echo $security_answer;?>">
        <span id="security_answerErr" class="error"><?php echo $security_answerErr ?></span>

        <label for="new_password">new_password :</label>
        <input type="password" id="new_password" name="new_password" value="<?php echo $new_password;?>">
        <span id="new_passwordErr" class="error"><?php echo $new_passwordErr ?></span>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password;?>">
        <span id="confirm_passwordErr" class="error"><?php echo $confirm_passwordErr ?></span>
    <br><br>
    
    <input type="submit" value="Submit">
    <br>
    </fieldset>
    </form>
    <?php include_once("footer.php"); ?>
</body>
</html>