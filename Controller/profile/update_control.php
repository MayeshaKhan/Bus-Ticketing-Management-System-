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

    $uname  = $profileData['uname'];
    $email = $exEmail = $profileData['email'];
    $contact = $profileData['contact'];
    $address = $profileData['address'];
    //declaring variables for all input error
    $unameErr = $emailErr = $contactErr =$addressErr = ""; 
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
            elseif($email != $exEmail && email_exists($email)){ 
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
        //Inserting database if everything is right
        if($validationFlag)
        {
            $id = $_SESSION['id'];
            if(updateProfile($id, $uname, $email, $contact, $address))
            {
                // Redirecting to login page after registraion is successfull
                session_start();
                $_SESSION['email'] = $email;
                header("location: ../../View/profile/");
            }
        }
        
        else 
        {
            $update_form = array(
                'uname' => $uname,
                'email' => $email,
                'contact' => $contact,
                'address' => $address,
                
                'unameErr' => $unameErr,
                'emailErr' => $emailErr,
                'contactErr' => $contactErr,
                'addressErr' => $addressErr
            );
            
            print_r($update_form);

            session_start();
            $_SESSION['update_form'] = $update_form;

            header("location: ../../View/profile/update.php");
        }
    }
?>