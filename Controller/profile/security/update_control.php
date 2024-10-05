<?php

    include_once "../../../Model/profile/security/model.php";

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    session_start();
    $passenger_id = $_SESSION['id'];
    $profileData = getProfile($passenger_id);
    //declaring variables for all input data
    $security_question  = $profileData['security_question'];
    $security_answer = $profileData['security_answer'];
    $real_password = $profileData['password'];
    //declaring variables for all input error
    $password = $passwordErr = "";
    $security_questionErr =$security_answerErr = ""; 
    //checking if request method is post
    $validationFlag = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        

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
        //password validatoin
        if(isset($_POST['password']))
        {
            $password=test_input($_POST['password']);
            if($password=="")
            {
                $passwordErr="Please enter User password";
                $validationFlag = false;
            }
            else if ($password != $real_password) 
            {  
                $passwordErr = "Password is not correct";  
                $validationFlag = false;
            } 
        }
        //Inserting database if everything is right
        if($validationFlag)
        {
            $id = $_SESSION['id'];
            if(change_security($id, $password, $security_question, $security_answer))
            {
                // Redirecting to login page after registraion is successfull
                header("location: ../../../View/profile/security/");
            }
        }
        else 
        {
            $update_form = array(
                'security_question' => $security_question,
                'security_answer' => $security_answer,
                'password' => $password,
                
                'security_questionErr' => $security_questionErr,
                'security_answerErr' => $security_answerErr,
                'passwordErr' => $passwordErr,
                'addressErr' => $addressErr
            );
            
            print_r($update_form);

            session_start();
            $_SESSION['update_form'] = $update_form;

            header("location: ../../../View/profile/security/update.php");
        }
    }
?>