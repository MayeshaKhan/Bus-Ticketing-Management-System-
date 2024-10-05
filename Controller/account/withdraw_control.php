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
                $ammountErr="Please enter User ammount";
                $validationFlag = false;
            }
            else if ($ammount < 100) 
            {  
                $ammountErr = "Minimum withdraw ammount is 100";  
                $validationFlag = false;
            } 
            else
            {
                session_start();
                $data = getTransaction($_SESSION['id']);
                $account = 0;
                while ($row = mysqli_fetch_assoc($data))
                {
                    $account += $row['ammount'];
                }
                if ($ammount > $account) 
                {
                    $ammountErr = "Your account has ". $account. "TK only. Please choose less ammount";  
                    $validationFlag = false;
                }
            }
        }
        //Inserting database if everything is right
        if($validationFlag)
        {
            $passenger_id = $_SESSION['id'];
            if(withdraw($ammount, $passenger_id))
            {
                // Redirecting to login page after registraion is successfull
                header("location: ../../View/account/");
            }
        }
        else 
        {
            $withdraw_form = array(
                'ammount' => $ammount,

                'ammountErr' => $ammountErr
            );
            
            print_r($withdraw_form);

            session_start();
            $_SESSION['withdraw_form'] = $withdraw_form;

            header("location: ../../View/account/withdraw.php");
        }
    }
?>