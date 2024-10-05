<?php

    include_once "../../Model/profile/model.php";

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    session_start();
    //declaring variables for all input data
    $profileData = getProfile($_SESSION['id']);
    $real_old_password = $profileData['password'];

    $new_password = $old_password = $confirm_password = ""; 
    //declaring variables for all input error
    $new_passwordErr = $old_passwordErr = $confirm_passwordErr = ""; 
    //checking if request method is post
    $validationFlag = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //old_password validatoin
        if(isset($_POST['old_password']))
        {
            $old_password=test_input($_POST['old_password']);
            if($old_password=="")
            {
                $old_passwordErr="Please enter User old_password";
                $validationFlag = false;
            }
            else if ($old_password != $real_old_password) 
            {  
                $old_passwordErr = "Old password is not correct";  
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
            if(changePassword($id, $old_password, $new_password))
            {
                // Redirecting to login page after registraion is successfull
                header("location: ../../View/profile/");
            }
        }
        else 
        {
            $change_password_form = array(
                'old_password' => $old_password,
                'new_password' => $new_password,
                'confirm_password' => $confirm_password,
                
                'old_passwordErr' => $old_passwordErr,
                'new_passwordErr' => $new_passwordErr,
                'confirm_passwordErr' => $confirm_passwordErr,
            );
            
            print_r($change_password_form);

            session_start();
            $_SESSION['change_password_form'] = $change_password_form;

            header("location: ../../View/profile/change-password.php");
        }
    }
?>