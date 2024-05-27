<?php
    
    require_once __DIR__ .'/../db.php';

    function getTransaction($passenger_id)
    {
        $con = getconnection();

        $sql = "SELECT * FROM transaction
                WHERE usertype='passenger' AND user_id = ?
                order by id desc";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $passenger_id);
        $stmt->execute();
        $result = $stmt->get_result();

        
        $stmt->close();
        $con->close();

        if ($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    function deposit($ammount, $passenger_id)
    {
        $con = getconnection();

        $description = "Deposits";
        $userType = "passenger";

        $sql = "INSERT INTO transaction (ammount, description, usertype, user_id) 
                VALUES (?, ?, ?, ?)";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param("dsss", $ammount, $description, $userType, $passenger_id);
        $result = $stmt->execute();

        
        $stmt->close();
        $con->close();

        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function withdraw($ammount, $passenger_id)
    {
        $con = getconnection();

        $ammount = 0 - $ammount;

        $description = "withdraw";
        $userType = "passenger";

        $sql = "INSERT INTO transaction (ammount, description, usertype, user_id) 
                VALUES (?, ?, ?, ?)";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param("dsss", $ammount, $description, $userType, $passenger_id);
        $result = $stmt->execute();

        
        $stmt->close();
        $con->close();

        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>




