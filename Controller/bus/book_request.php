<?php

    include_once('../../Model/bus/model.php');

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $busData = $bus_id = NULL;
    //declaring variables for all input data
    $seat = $booked_seat = [];
    $coupon = "";
    $discount_coupon = NULL;
    //declaring variables for all input error
    $seatErr = $couponErr = ""; 
    // for validation trace
    $validationFlag = true;
    
    if(isset($_GET['bus_id']))
    {
        $bus_id = $_GET['bus_id'];
        $busData = getBusById($bus_id);
        $booked_seat_data = getBookedSeat($bus_id);
        while ($row = mysqli_fetch_array($booked_seat_data)) 
        {
            $booked_seat[] = $row['seat_no'];
        }
    }
    else{
        header('location: find.php');
    }
    //checking if request method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // seat validation
        if(isset($_POST['seat']))
        {
            $seat_json = $_POST['seat'];
            $seat = json_decode($seat_json);
            if(array_intersect($seat, $booked_seat) != [])
            {
                $seatErr = "You have choosed booked seat.";
                $validationFlag = false;
            }
        }
        else
        {
            $seatErr = "Please select at least one seat";
            $validationFlag = false;
        }
        // coupon validation
        if(isset($_POST['coupon']))
        {
            $coupon = $_POST['coupon'];
            if($coupon != "")
            {
                if(getDiscountCoupon($coupon))
                {
                    $discount_coupon = getDiscountCoupon($coupon);
                }
                else
                {
                    $couponErr = "Coupon is not valid";
                    $validationFlag = false;
                }
            }
        }
        //Inserting database if everything is right
        if($validationFlag)
        {
            $price = $busData['seat_price']*count($seat);
            $discount_price = 0;
            $coupon_id = null;
            if($discount_coupon != null)
            {
                $discount_price = min($price*$discount_coupon['percentage']/100.00, $discount_coupon['max_discount']);
                $coupon_id = $discount_coupon['id'];
            }
            $total_price = $price - $discount_price;
            session_start();
            $passenger_id = $_SESSION['id'];
            $bus_id = $busData['id'];
            if($ticket_id = bookTicket($price, $discount_price, $bus_id, $passenger_id, $coupon_id))
            {
                foreach ($seat as $key => $seat_no) {
                    bookSeat($seat_no, $ticket_id);
                }
            }
            $purchase_bus_form = array(
                "status" => true,
                "ticket_id" => $ticket_id,
                "bus_id" => $bus_id,
                'seat' => $seat,
                'coupon' => $coupon,

                'seatErr' => $seatErr,
                'couponErr' => $couponErr,

                'coupon_id' => $coupon_id,

                'price' => $price,
                'discount_price' => $discount_price,
                'total_price' => $total_price,
            );
            $response = json_encode($purchase_bus_form);
            echo $response;
        }
        else
        {
            $price = $busData['seat_price']*count($seat);
            // $coupon_id = $discount_coupon['id'];
            // $discount_price = min($price*$discount_coupon['percentage']/100.00, $discount_coupon['max_discount']);
            // $total_price = $price - $discount_price;
            $purchase_bus_form = array(
                "status" => false,
                "bus_id" => $bus_id,
                'seat' => $seat,
                'coupon' => $coupon,

                'seatErr' => $seatErr,
                'couponErr' => $couponErr,
            );
            $response = json_encode($purchase_bus_form);
            echo $response;
        }
    }
?>