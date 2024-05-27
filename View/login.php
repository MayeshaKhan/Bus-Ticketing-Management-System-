<?php
    session_start();
    //declaring variables for all input data
    $email = $password = ""; 
    //declaring variables for all input error
    $emailErr= $passwordErr= $loginErr= ""; 
    
    if(isset($_COOKIE['email'])){
        $email = $_COOKIE['email'];
    }
    if(isset($_COOKIE['password'])){
        $password = $_COOKIE['password'];
    }
    if(isset($_SESSION['login_form'])){
        
        $login_form = $_SESSION['login_form'];
        // print_r($login_form);
        
        $email = $login_form['email'];
        $password = $login_form['password'];

        $emailErr = $login_form['emailErr'];
        $passwordErr = $login_form['passwordErr'];
        $loginErr = $login_form['loginErr'];

        $_SESSION['login_form'] = NULL;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/login.js"></script>
    <title>Login</title>
</head>
<body>
    <h1 class= "header"> Bus ticketing management system</h1>   
    <?php include('home_header.php'); ?>
    
    <main>
        <form action="<?php echo htmlspecialchars('../Controller/login_control.php');?>" method="post" novalidate  onsubmit="return isValid(this);" >
            <fieldset>
                <legend>Login</legend>
                
                <label for="email" >Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                <span  id="emailErr" class="error"><?php echo $emailErr ?></span>

                <label for="password">Password :</label>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>">
                <span id="passwordErr" class="error"><?php echo $passwordErr ?></span>

                <span class="error"><?php echo $loginErr ?></span><br>

                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>

                <a href="forgot_password.php">Forget Password?</a> | <a href="registration.php">No account? Register here</a>
                <br><br>
                
                <input type="submit" value="Login">
            </fieldset>
        </form>
    </main>
    
    <?php include_once("footer.php"); ?>
</body>
</html>