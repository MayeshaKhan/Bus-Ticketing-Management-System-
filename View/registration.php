<?php
    session_start();
    //declaring variables for all input data
    $uname  = $email =  $nid = $contact =$address = $security_question = $security_answer = $password = $confirm_password = ""; 
    //declaring variables for all input error
    $unameErr = $emailErr =  $nidErr = $contactErr =$addressErr = $security_questionErr = $security_answerErr = $passwordErr = $confirm_passwordErr = ""; 
    
    if(isset($_SESSION['registration_form'])){
        $registration_form = $_SESSION['registration_form'];
        // print_r($registration_form);

        $uname  = $registration_form['uname'];
        $email = $registration_form['email'];
        $nid = $registration_form['nid'];
        $contact = $registration_form['contact'];
        $address = $registration_form['address'];
        $security_question = $registration_form['security_question'];
        $security_answer = $registration_form['security_answer'];
        $password = $registration_form['password'];
        $confirm_password = $registration_form['confirm_password'];

        $unameErr  = $registration_form['unameErr'];
        $emailErr = $registration_form['emailErr'];
        $nidErr = $registration_form['nidErr'];
        $contactErr = $registration_form['contactErr'];
        $addressErr = $registration_form['addressErr'];
        $security_questionErr = $registration_form['security_questionErr'];
        $security_answerErr = $registration_form['security_answerErr'];
        $passwordErr = $registration_form['passwordErr'];
        $confirm_passwordErr = $registration_form['confirm_passwordErr'];

        $_SESSION['registration_form'] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/registration.js"></script>
    <title>Document</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>

    <?php
        include('home_header.php'); 
    ?>
    
    <form method="post" action="<?php echo htmlspecialchars('../Controller/registration_control.php');?>" novalidate onsubmit="return isValid(this);"> 
        <fieldset>
            <legend>Registration</legend>

            <label for="uname">Full name:</label>
            <input type="text" id="uname" name="uname" value="<?php echo $uname;?>">
            <span id="unameErr" class="error"><?php echo $unameErr ?></span>

            <label for="email" >Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email;?>">
            <span id="emailErr" class="error"><?php echo $emailErr ?></span>
            
            <label for="contact">Contact :</label>
            <input type="text" id="contact" name="contact" value="<?php echo $contact;?>">
            <span id="contactErr" class="error"><?php echo $contactErr ?></span>
            
            <label for="address">Address :</label>
            <textarea id="address" name="address"><?php echo $address;?></textarea>
            <span id="addressErr" class="error"><?php echo $addressErr ?></span>
            
            <label for="security_question">Security Question :</label>
            <textarea id="security_question" name="security_question"><?php echo $security_question;?></textarea>
            <span id="security_questionErr" class="error"><?php echo $security_questionErr ?></span>
            
            <label for="security_answer">Security Answer :</label>
            <textarea id="security_answer" name="security_answer"><?php echo $security_answer;?></textarea>
            <span id="security_answerErr" class="error"><?php echo $security_answerErr ?></span>
            
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" value="<?php echo $password;?>">
            <span id="passwordErr" class="error"><?php echo $passwordErr ?></span>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password;?>">
            <span id="confirm_passwordErr" class="error"><?php echo $confirm_passwordErr ?></span>

            <br>
            <a href="login.php">Already have an account? Login here</a>
            <br><br>
        
            <input type="submit" value="Register">
        </fieldset>
    </form>
    <?php include_once("footer.php"); ?>
</body>
</html>