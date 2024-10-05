<?php

    include_once "../../Model/ticket/model.php";
    session_start();
    
    $ticketData = $busData = null;
    $ticket_seat = [];
    $ticketPrice = $deductPrice = $refundPrice = 0;
    $cancelMessage = $cancelErr = "";
    if(isset($_GET['ticket_id']))
    {
        $ticket_id = $_GET['ticket_id'];
        $passenger_id = $_SESSION['id'];
        $ticketData = getTicketById($passenger_id, $ticket_id);

        if($ticketData == false || $ticketData['status']=='cancelled'){
            // header('location: index.php');
        }

        $deductPrice = $ticketPrice = $ticketData['price']-$ticketData['discount_price'];
        $bus_id = $ticketData['bus_id'];
        $busData = getBusById($bus_id);
        $ticket_seat_data = getSeat($ticket_id);
        while ($row = mysqli_fetch_array($ticket_seat_data)) 
        {
            $ticket_seat[] = $row['seat_no'];
        }

        $busDatetime = new DateTime($busData['start_datetime']);

        if ($busDatetime > (new DateTime())->modify('+48 hours')) {
            // echo $busDatetime->format('Y-m-d H:i:s') . (new DateTime())->modify('+48 hours')->format('Y-m-d H:i:s');
            $cancelMessage = "10% deduct, 90% refund";
            $deductPrice = $ticketPrice * 10 /100.00;
            $refundPrice = $ticketPrice - $deductPrice;
        } 
        elseif ($busDatetime > (new DateTime())->modify('+24 hours')) {
            $cancelMessage = "20% deduct, 80% refund";
            $deductPrice = $ticketPrice * 20 /100.00;
            $refundPrice = $ticketPrice - $deductPrice;
        } 
        elseif ($busDatetime > (new DateTime())->modify('+12 hours')) {
            $cancelMessage = "60% deduct, 40% refund";
            $deductPrice = $ticketPrice * 60 /100.00;
            $refundPrice = $ticketPrice - $deductPrice;

        } 
        elseif ($busDatetime > (new DateTime())->modify('+6 hours')) {
            $cancelMessage = "80% deduct, 20% refund";
            $deductPrice = $ticketPrice * 80 /100.00;
            $refundPrice = $ticketPrice - $deductPrice;

        } 
        elseif ($busDatetime > (new DateTime())->modify('+3 hours')) {
            $cancelMessage = "90% deduct, 10% refund";
            $deductPrice = $ticketPrice * 90 /100.00;
            $refundPrice = $ticketPrice - $deductPrice;

        } 
        else{
            $cancelMessage = "No refund.";
            $deductPrice = $ticketPrice * 100 /100.00;
            $refundPrice = $ticketPrice - $deductPrice;
        }
    }
    else{
        // header('location: index.php');
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $cancel_result = cancelTicketById($passenger_id, $ticket_id);
        $refund_result = refund($refundPrice, $ticket_id, $passenger_id);
        if($cancel_result && $refund_result)
        {
            header("location: ../../View/ticket/details.php?ticket_id=" . $ticket_id);
        }
        else
        {
            $cancelErr = "Ticket cancellation is failed!<br/>";
            echo $cancelErr;
        }
    }
?>