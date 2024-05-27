<?php
    require_once __DIR__ .'/../db.php';
function getBus()
{
    $con = getconnection();

    // $sql = "SELECT * FROM bus WHERE start_datetime >= NOW() AND status = 'added' ORDER BY start_datetime";
    $sql = "SELECT * FROM bus WHERE status = 'added' ORDER BY start_datetime";

    $stmt = $con->prepare($sql);
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

function getBusById($id)
{
    $con = getconnection();

    // $sql = "SELECT * FROM bus WHERE id = ? AND start_datetime >= NOW() AND status = 'added'";
    $sql = "SELECT * FROM bus WHERE id = ? AND status = 'added'";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    
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

function findBus($start_place, $end_place, $date)
{
    $con = getconnection();

    $sql = "SELECT * FROM bus WHERE status = 'added' 
            AND start_place LIKE ? 
            AND end_place LIKE ? 
            AND start_datetime LIKE ? 
            ORDER BY start_datetime";

    $stmt = $con->prepare($sql);
    $start_place = "%$start_place%";
    $end_place = "%$end_place%";
    $date = "%$date%";
    $stmt->bind_param("sss", $start_place, $end_place, $date);
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

function getDiscountCoupon($coupon)
{
    $con = getconnection();

    $sql = "SELECT * FROM discount_coupon WHERE coupon = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $coupon);
    $stmt->execute();
    $result = $stmt->get_result();

    
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

function bookTicket($price, $discount_price, $bus_id, $passenger_id, $coupon_id)
{
    $con = getconnection();

    $status = "booked";

    $sql = "INSERT INTO ticket (price, discount_price, bus_id, passenger_id, coupon_id, status) VALUES (?, ?, ?, ?, ?, ?)";
    // if ($coupon_id != null && $coupon_id != "") {
    // } else {
    //     $sql = "INSERT INTO ticket (price, discount_price, bus_id, passenger_id, status) 
    //             VALUES (?, ?, ?, ?, ?)";
    // }

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ddiiss", $price, $discount_price, $bus_id, $passenger_id, $coupon_id, $status);
    $result = $stmt->execute();

    if ($result) {
        $last_id = $con->insert_id;
        
        $stmt->close();
        $con->close();
        return $last_id;
    } 
    else 
    {
        
        $stmt->close();
        $con->close();
        return false;
    }
}

function bookSeat($seat_no, $ticket_id)
{
    $con = getconnection();

    $sql = "INSERT INTO seat (seat_no, ticket_id) 
            VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $seat_no, $ticket_id);
    $result = $stmt->execute();

    
    $stmt->close();
    $con->close();

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function getPlace()
{
    $con = getconnection();

    $sql = "SELECT * FROM place";

    $stmt = $con->prepare($sql);
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

function getPlaceName($id)
{
    $con = getconnection();

    $sql = "SELECT * FROM place WHERE id = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = mysqli_num_rows($result);

    
    $stmt->close();
    $con->close();

    if ($count == 1) {
        $obj = mysqli_fetch_assoc($result);
        return $obj['name'];
    } else {
        return false;
    }
}
?>

