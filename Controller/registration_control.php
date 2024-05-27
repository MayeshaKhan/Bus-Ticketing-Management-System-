<?php

    include_once "../Model/model.php";

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    //declaring variables for all input data
    $uname  = $email = $contact = $address = $security_question = $security_answer = $password = $confirm_password = ""; 
    //declaring variables for all input error
    $unameErr = $emailErr = $contactErr = $addressErr = $security_questionErr = $security_answerErr = $passwordErr = $confirm_passwordErr = ""; 
    //checking if request method is post
    $validationFlag = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //Name validation
        if(isset($_POST['uname']))
        {
            $uname=test_input($_POST['uname']);
            if($uname=="")
            {
                $unameErr="Please enter User Name";
                $validationFlag = false;
            }
            else if (!preg_match("/^[a-zA-Z ]*$/",$uname)) 
            {  
                $unameErr = "Only alphabets and white space are allowed";  
                $validationFlag = false;
            }  
        }
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
            elseif(email_exists($email)){ 
                $emailErr = "This email is already exists";  
                $validationFlag = false;
            }
        }
    
        //Contact validatoin
        if(isset($_POST['contact']))
        {
            $contact=test_input($_POST['contact']);
            if($contact=="")
            {
                $contactErr="Please enter User contact";
                $validationFlag = false;
            }
            else if (!preg_match ("/^[0-9]*$/", $contact) ) 
            {  
                $contactErr = "Only numeric value is allowed.";  
                $validationFlag = false;
            }  
            //check mobile no length should not be less and greator than 11  
            else if (strlen ($contact) != 11) 
            {  
                $contactErr = "Mobile no must contain 11 digits.";  
                $validationFlag = false;
            } 
        }

        //Address validation
        if(isset($_POST['address']))
        {
            $address=test_input($_POST['address']);
            if($address=="")
            {
                $addressErr="Please enter User address";
                $validationFlag = false;
            }
           
        }

        //security_question validation
        if(isset($_POST['security_question']))
        {
            $security_question=test_input($_POST['security_question']);
            if($security_question=="")
            {
                $security_questionErr="Please enter User security_question";
                $validationFlag = false;
            }
           
        }

        //security_answer validation
        if(isset($_POST['security_answer']))
        {
            $security_answer=test_input($_POST['security_answer']);
            if($security_answer=="")
            {
                $security_answerErr="Please enter User security_answer";
                $validationFlag = false;
            }
           
        }

        //Password validatoin
        if(isset($_POST['password']))
        {
            $password=test_input($_POST['password']);
            if($password=="")
            {
                $passwordErr="Please enter User password";
                $validationFlag = false;
            }
            else if (strlen ($password) < 6) 
            {  
                $passwordErr = "Password must contain at least 6 digits.";  
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
        if($passwordErr=="" && $confirm_passwordErr=="")
        {
            if($password != $confirm_password)
            {
                $confirm_passwordErr="Password does not match.";
                $validationFlag = false;
            }
        }
        
        //Inserting database if everything is right
        if($validationFlag)
        {
            if(passengerRegistration($uname, $email, $contact, $address, $security_question, $security_answer, $password))
            {
                // Redirecting to login page after registraion is successfull
                header("location: ../View/login.php");
            }
        }
        else
        {
            $registration_form = array(
                'uname' => $uname,
                'email' => $email,
                'nid' => $nid,
                'contact' => $contact,
                'address' => $address,
                'security_question' => $security_question,
                'security_answer' => $security_answer,
                'password' => $password,
                'confirm_password' => $confirm_password,

                'unameErr' => $unameErr,
                'emailErr' => $emailErr,
                'nidErr' => $nidErr,
                'contactErr' => $contactErr,
                'addressErr' => $addressErr,
                'security_questionErr' => $security_questionErr,
                'security_answerErr' => $security_answerErr,
                'passwordErr' => $passwordErr,
                'confirm_passwordErr' => $confirm_passwordErr
            );

            session_start();
            $_SESSION['registration_form'] = $registration_form;

            header("location: ../View/registration.php");
        }
    }
?> 