<?php
session_start();
if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
{

    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
}
else
{
    $email = $password="";
}
  function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // declaring variables for all input data
    $email = $password = "";

    // declaring variables for all input error
    $emailErr = $passwordErr = $loginErr = "";

    // declaring a flag for validation
    $validatedFlag = true;

    // checking if the request method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // User ID validation
        if (isset($_POST['email']) && $_POST['email'] != "") {
            $email = test_input($_POST['email']);
        }else{
            $emailErr = "Please enter email";
            $validatedFlag = false;
        }
        // Password validation
        if (isset($_POST['password']) && $_POST['password'] != "") {
            $password = test_input($_POST['password']);
            if ($password == "") {
                
            }
        }else{
            $passwordErr = "Please enter Password";
            $validatedFlag = false;
        }

        include "../Model/model.php";

        if ($validatedFlag) 
        {

            if ($row = passenger_login($email, $password)) 
            {
                if (isset($_POST['remember'])) 
                {
                    setcookie("email", $email, time() + (7 * 24 * 3600), "/");
                    setcookie("password", $password, time() + (7 * 24 * 3600), "/");
                }else{
                    setcookie("email", "", time() - (7 * 24 * 3600), "/");
                    setcookie("password", "", time() - (7 * 24 * 3600), "/");
                }
                // session_start();
                $_SESSION["userType"] = 'passenger';
                $_SESSION["id"] = $row['id'];
                $_SESSION["email"] = $row['email'];

                // session_start();
                $_SESSION['login_form'] = NULL;
                
                header("location: ../View/passenger.php");
            } 
            else 
            {
                $loginErr ="Invalid Credential";

                $login_form = array(
                    'email' => $email,
                    'password' => $password,
    
                    'emailErr' => $emailErr,
                    'passwordErr' => $passwordErr,
                    'loginErr' => $loginErr
                );

    
                session_start();
                $_SESSION['login_form'] = $login_form;
    
                header("location: ../View/login.php");
            }
        }
        else 
        {
            $login_form = array(
                'email' => $email,
                'password' => $password,

                'emailErr' => $emailErr,
                'passwordErr' => $passwordErr,
                'loginErr' => $loginErr
            );
            
            print_r($login_form);

            session_start();
            $_SESSION['login_form'] = $login_form;

            header("location: ../View/login.php");
        }
    }
?>

