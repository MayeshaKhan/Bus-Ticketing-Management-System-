<?php
    include_once("db.php");
function passengerRegistration($uname, $email, $contact, $address, $security_question, $security_answer, $password)
 {
        
        $con = getconnection();

         $sql = "INSERT INTO passenger (uname, email, contact, address, security_question, security_answer, password) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
 
        $stmt = $con->prepare($sql);

        $stmt->bind_param('sssssss', $uname, $email, $contact, $address, $security_question, $security_answer, $password);

       
        $result = $stmt->execute();

         $stmt->close();
        $con->close();

        return $result;
    }


//login  
function passenger_login($email, $password)
{
    $conn = getconnection();

    $sql = "SELECT * FROM passenger WHERE email=? AND password=?";
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("ss", $email, $password);
    
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;

    
    $stmt->close();
    $conn->close();
    
    if($count == 1)
    {
        
        $obj = $result->fetch_assoc();
        return $obj;
    }
    else
    {
        return false;
    }
}

    function email_exists($email)
    {
        $conn = getconnection();

        
        $sql = " SELECT email FROM passenger WHERE email=?";

        
        $stmt = $conn->prepare($sql);

        
        $stmt->bind_param('s', $email);

        
        $stmt->execute();

        
        $stmt->bind_result($result);

        
        $stmt->fetch();

        
        $stmt->close();
        $conn->close();

        return $result != null;
    }

    // security question
    function get_security_question($email)
    {
        $con = getconnection();
    
        
        $sql = "SELECT security_question FROM passenger WHERE email=?";
        $stmt = $con->prepare($sql);
    
        
        $stmt->bind_param("s", $email);
    
        
        $stmt->execute();
    
        
        $result = $stmt->get_result();
    
        
        $count = $result->num_rows;
    
        
        $stmt->close();
        $con->close();
    
        if ($count == 1) {
            
            $row = $result->fetch_assoc();
            return $row['security_question'];
        } else {
            return false;
        }
    }
    
    function security_answer_is_correct($email, $security_answer)
{
    $conn = getconnection();

    
    $sql = "SELECT * FROM passenger 
            WHERE email=? AND security_answer=?";
    $stmt = $conn->prepare($sql);

    
    $stmt->bind_param("ss", $email, $security_answer);

    
    $stmt->execute();

    
    $result = $stmt->get_result();

    
    $count = $result->num_rows;

    
    $stmt->close();
    $conn->close();

    return ($count == 1);
}

   
function reset_password($email, $security_answer, $new_password)
{
    $conn = getconnection();

    // Use a prepared statement to prevent SQL injection
    $sql = "UPDATE passenger SET password=? 
            WHERE email=? AND security_answer=?";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sss", $new_password, $email, $security_answer);

    // Execute the statement
    $result = $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    return $result;
}

?>

