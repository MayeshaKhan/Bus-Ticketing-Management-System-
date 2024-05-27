<?php
    
    require_once __DIR__ .'/../db.php';
    
    function getTicket($passenger_id)
    {
        $con = getconnection();
    
        $sql = "SELECT * FROM ticket
                WHERE passenger_id = ?
                ORDER BY purchase_datetime DESC";
    
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $passenger_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Closing statement and database connection
        $stmt->close();
        $con->close();
    
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    function getTicketById($passenger_id, $ticket_id)
    {
        $con = getconnection();
    
        $sql = "SELECT * FROM ticket
                WHERE id = ? AND passenger_id = ?
                ORDER BY purchase_datetime DESC";
    
        $stmt = $con->prepare($sql);
        $stmt->bind_param("is", $ticket_id, $passenger_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Closing statement and database connection
        $stmt->close();
        $con->close();
    
        $count = mysqli_num_rows($result);
    
        if ($count == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }
    
    function cancelTicketById($passenger_id, $ticket_id)
    {
        $con = getconnection();
    
        $sql = "UPDATE ticket
                SET status = 'cancelled'
                WHERE id = ? AND passenger_id = ?";
    
        $stmt = $con->prepare($sql);
        $stmt->bind_param("is", $ticket_id, $passenger_id);
        $result = $stmt->execute();
    
        // Closing statement and database connection
        $stmt->close();
        $con->close();
    
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    function refund($ammount, $ticket_id, $passenger_id)
    {
        $con = getconnection();
    
        $description = "Refunds for cancelling ticket (ID: $ticket_id)";
        $userType = "passenger";
    
        $sql = "INSERT INTO transaction (ammount, description, usertype, user_id) 
                VALUES (?, ?, ?, ?)";
    
        $stmt = $con->prepare($sql);
        $stmt->bind_param("dssi", $ammount, $description, $userType, $passenger_id);
        $result = $stmt->execute();
    
        // Closing statement and database connection
        $stmt->close();
        $con->close();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    function getBusById($id)
    {
        $con = getconnection();
    
        $sql = "SELECT * FROM bus
                WHERE id = ? AND status = 'added'";
    
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Closing statement and database connection
        $stmt->close();
        $con->close();
    
        $count = mysqli_num_rows($result);
    
        if ($count == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }
    
    function getSeat($ticket_id)
    {
        $con = getconnection();
    
        $sql = "SELECT seat_no FROM seat
                WHERE ticket_id = ?";
    
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $ticket_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Closing statement and database connection
        $stmt->close();
        $con->close();
    
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    function getPlaceName($id)
    {
        $con = getconnection();
    
        $sql = "SELECT * FROM place WHERE id = ?";
    
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = mysqli_num_rows($result);
    
        // Closing statement and database connection
        $stmt->close();
        $con->close();
    
        if ($count == 1) {
            $obj = mysqli_fetch_assoc($result);
            return $obj['name'];
        } else {
            return false;
        }
    }
    function getBookedSeat($bus_id)
    {
        $con = getconnection();

        $sql = "SELECT seat.seat_no, seat.ticket_id FROM seat, ticket
                WHERE seat.ticket_id = ticket.id
                AND ticket.bus_id = ? 
                AND ticket.status = 'booked' 
                ";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $bus_id);
        $stmt->execute();
        $result = $stmt->get_result();

        
        $stmt->close();
        $con->close();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
?>