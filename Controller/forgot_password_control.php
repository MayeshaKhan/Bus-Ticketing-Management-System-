<?php

    include_once "../Model/model.php";

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = $security_answer = $new_password = $confirm_password = ""; 
    $security_question = "Enter valid email te see security question";
    //declaring variables for all input error
    $emailErr = $security_answerErr = $new_passwordErr = $confirm_passwordErr = ""; 
    //checking if request method is post
    $validationFlag = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Email validation
        if(isset($_POST['email']))
        {
            $email=test_input($_POST['email']);
            if($email=="")
            {
                $emailErr="Please enter User email";
                $validationFlag = false;
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
                $validationFlag = false;
            } 
            else if(email_exists($email) == false){ 
                $emailErr = "This email does not exist";  
                $validationFlag = false;
            }
            else{
                $security_question = get_security_question($email);
                echo $security_question;
            }

        }
        //security_answer validatoin
        if(isset($_POST['security_answer']))
        {
            $security_answer=test_input($_POST['security_answer']);
            if($security_answer=="")
            {
                $security_answerErr="Please enter User security_answer";
                $validationFlag = false;
            }
        }

        // checking if Security answer is right
        if($emailErr == "" && $security_answerErr == "")
        {
            if(security_answer_is_correct($email, $security_answer) == false)
            {
                $security_answerErr="Security answer is not correct";
                $validationFlag = false;
            }
        }

        //new_password validatoin
        if(isset($_POST['new_password']))
        {
            $new_password=test_input($_POST['new_password']);
            if($new_password=="")
            {
                $new_passwordErr="Please enter User new_password";
                $validationFlag = false;
            }
            else if (strlen ($new_password) < 6) 
            {  
                $new_passwordErr = "new_password must contain at least 6 digits.";  
                $validationFlag = false;
            }
        }

        //Confirm password validation
        if(isset($_POST['confirm_password']))
        {
            $confirm_password=test_input($_POST['confirm_password']);
            if($confirm_password=="")
            {
                $confirm_passwordErr="Enter the password to confirm";
                $validationFlag = false;
            }
        }
        if($new_passwordErr=="" && $confirm_passwordErr=="")
        {
            if($new_password != $confirm_password)
            {
                $confirm_passwordErr="Password does not match.";
                $validationFlag = false;
            }
        }
        
        //Inserting database if everything is right
        if($validationFlag)
        {
            $id = $_SESSION['id'];
            if(reset_password($email, $security_answer, $new_password))
            {
                // Redirecting to login page after registraion is successfull
                header("location: ../View/login.php");
            }
            else 
            {
                $loginErr ="Invalid Credential";

                $forgot_password_form = array(
                    'email' => $email,
                    'security_answer' => $security_answer,
                    'new_password' => $new_password,
                    'confirm_password' => $confirm_password,
                    'security_question' => $security_question,
    
                    'emailErr' => $emailErr,
                    'security_answerErr' => $security_answerErr,
                    'new_passwordErr' => $new_passwordErr,
                    'confirm_passwordErr' => $confirm_passwordErr
                );

    
                session_start();
                $_SESSION['forgot_password_form'] = $forgot_password_form;
    
                header("location: ../View/forgot_password.php");
            }
        }
        else 
        {
            if($emailErr == "")
            {
                $forgot_password_form = array(
                    'email' => $email,
                    'security_answer' => $security_answer,
                    'new_password' => $new_password,
                    'confirm_password' => $confirm_password,
                    'security_question' => $security_question,

                    'emailErr' => $emailErr,
                    'security_answerErr' => $security_answerErr,
                    'new_passwordErr' => $new_passwordErr,
                    'confirm_passwordErr' => $confirm_passwordErr
                );
            }
            else{
                $forgot_password_form = array(
                    'email' => $email,
                    'security_answer' => $security_answer,
                    'new_password' => $new_password,
                    'confirm_password' => $confirm_password,
                    'security_question' => $security_question,

                    'emailErr' => $emailErr,
                    'security_answerErr' => "",
                    'new_passwordErr' => "",
                    'confirm_passwordErr' => ""
                );
            }
            
            
            print_r($forgot_password_form);

            session_start();
            $_SESSION['forgot_password_form'] = $forgot_password_form;

            header("location: ../View/forgot_password.php");
        }
    }
?>