<?php
    // require_once __DIR__ .'/../../db.php';
    // function getProfile($passenger_id)
    // {
    //     $con = getconnection();

    //     $sql = "select * from passenger where id ='$passenger_id' ";

    //     $result = mysqli_query($con, $sql);

    //     $count = mysqli_num_rows($result);

    //     // Closing database connection
    //     $con->close();

    //     if($count == 1)
    //     {
    //         $row = mysqli_fetch_assoc($result);
    //         return $row;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
    // function change_security($id, $password, $security_question, $security_answer)
    // {
    //     $conn = getconnection();
    //     $sql = "update passenger 
    //             set security_question='$security_question',
    //             security_answer='$security_answer' 
    //             where id='$id' and password='$password'";
        
    //     $result = mysqli_query($conn, $sql);
    //     // Closing database connection
    //     $conn->close();
    
    //     if($result)
    //     {
    //         return $result;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
  
    require_once __DIR__ .'/../../db.php';

    function getProfile($passenger_id)
    {
        $con = getconnection();

        $sql = "SELECT * FROM passenger WHERE id = ?";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $passenger_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Closing database connection
        $con->close();

        if ($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            return $row;
        }
        else
        {
            return false;
        }
    }

    function change_security($id, $password, $security_question, $security_answer)
    {
        $conn = getconnection();

        $sql = "UPDATE passenger 
                SET security_question=?, security_answer=? 
                WHERE id=? AND password=?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $security_question, $security_answer, $id, $password);
        $result = $stmt->execute();

        // Closing database connection
        $conn->close();

        return $result;
    }


?>