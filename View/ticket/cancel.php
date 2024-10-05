<?php
    session_start();
    include_once('../../Model/ticket/model.php');
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
            header('location: index.php');
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
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Passenger: Cancel Ticket</title>
</head>
<body>
    
    <?php
        $dir = "../";
        include_once ('../header.php');
        include_once('../../Model/ticket/model.php');
    ?>
    <h1>Cancel Ticket</h1>

    <br/>
    <?php
        if($ticketData != NULL && $busData != NULL)
        {
        ?>
        <table>
            <tr>
                <th>Bus Data</th>
                <th>Ticket Data</th>
                <th>Cancellation Form</th>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <th>Id</th>
                            <td><?php echo $busData["id"]; ?></td>
                        </tr>
                        <tr>
                            <th>Vendor Id</th>
                            <td><?php echo $busData["vendor_id"]; ?></td>
                        </tr>
                        <tr>
                            <th>Bus Name</th>
                            <td><?php echo $busData["bus_name"]; ?></td>
                        </tr>
                        <tr>
                            <th>Total Seat</th>
                            <td><?php echo $busData["total_seat"]; ?></td>
                        </tr>
                        <tr>
                            <th>Seat Price</th>
                            <td><?php echo $busData["seat_price"]; ?></td>
                        </tr>
                        <tr>
                            <th>Start Place</th>
                            <td><?php echo getPlaceName($busData["start_place"]); ?></td>
                        </tr>
                        <tr>
                            <th>End Place</th>
                            <td><?php echo getPlaceName($busData["end_place"]); ?></td>
                        </tr>
                        <tr>
                            <th>Start Datetime</th>
                            <td><?php echo $busData["start_datetime"]; ?></td>
                        </tr>
                        <tr>
                            <th>End Datetime</th>
                            <td><?php echo $busData["end_datetime"]; ?></td>
                        </tr>
                        <tr>
                            <th>Stauts</th>
                            <td><?php echo $busData["status"]; ?></td>
                        </tr>
                    </table>
                </td>
                <td>
                <table>
                        <tr>
                            <th>Id</th>
                            <td><?php echo $ticketData["id"]; ?></td>
                        </tr>
                        <tr>
                            <th>Bus Id</th>
                            <td><?php echo $ticketData["bus_id"]; ?></td>
                        </tr>
                        <tr>
                            <th>Seat No</th>
                            <td>
                                <?php
                                $seatData = getSeat($ticketData['id']);
                                while($seat = mysqli_fetch_assoc($seatData)){
                                    echo $seat['seat_no']. ", ";
                                }
                                ?>
                            </td>

                        </tr>
                        <tr>
                            <th>Purchase Datetime</th>
                            <td><?php echo $ticketData["purchase_datetime"]; ?></td>
                        </tr>
                        <tr>
                            <th>Pirce</th>
                            <td><?php echo $ticketData["price"]; ?></td>
                        </tr>
                        <tr>
                            <th>Discount Price</th>
                            <td><?php echo $ticketData["discount_price"]; ?></td>
                        </tr>
                        <tr>
                            <th>Final Price</th>
                            <td><?php echo $ticketData["price"] - $ticketData["discount_price"]; ?></td>
                        </tr>
                        <tr>
                            <th>Stauts</th>
                            <td><?php echo $ticketData["status"]; ?></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <form class="ticket-form" action="<?php echo htmlspecialchars('../../Controller/ticket/cancel_control.php?ticket_id='. $ticket_id);?>" method="post">
                        <table>
                            <tr>
                                <th>Ticket Price</th>
                                <td><?php echo $ticketPrice;?></td>
                            </tr>
                            <tr>
                                <th>Deduction</th>
                                <td><?php echo $deductPrice;?></td>
                            </tr>
                            <tr>
                                <th>Refund</th>
                                <td><?php echo $refundPrice;?></td>
                            </tr>
                        </table>
                        (<?php echo $cancelMessage; ?>)
                        <p>Are you sure to cancel ticket?</p>
                        <a href="index.php">No</a>
                        <?php echo $cancelErr; ?>
                        <input type="submit" value="Confirm" name="confirm">
                    </form>
                </td>
            </tr>
        </table>
        <br>
        <a href="index.php">Back to List</a>
        <?php
        }
    ?>
    <?php include_once("../footer.php"); ?>
    
</body>
</html>