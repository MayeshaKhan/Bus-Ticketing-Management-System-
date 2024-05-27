<?php

    include_once "../../Model/account/model.php";

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    //declaring variables for all input data
    $ammount = ""; 
    //declaring variables for all input error
    $ammountErr = ""; 
    //checking if request method is post
    $validationFlag = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //ammount validation
        if(isset($_POST['ammount']))
        {
            $ammount=test_input($_POST['ammount']);
            if($ammount=="")
            {
                $ammountErr="Please enter ammount";
                $validationFlag = false;
            }
            else if ($ammount < 100) 
            {  
                $ammountErr = "Minimum deposit ammount is 100";  
                $validationFlag = false;
            } 
        }
        //Inserting database if everything is right
        if($validationFlag)
        {
            session_start();
            $passenger_id = $_SESSION['id'];
            if(deposit($ammount, $passenger_id))
            {
                // Redirecting to login page after registraion is successfull
                header("location: ../../View/account/");
            }
        }
        else 
        {
            $deposit_form = array(
                'ammount' => $ammount,

                'ammountErr' => $ammountErr
            );
            
            print_r($deposit_form);

            session_start();
            $_SESSION['deposit_form'] = $deposit_form;

            header("location: ../../View/account/deposit.php");
        }
    }
?>