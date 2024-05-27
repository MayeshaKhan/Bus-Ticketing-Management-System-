<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Book Bus</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include_once ('../header.php');
        include_once('../../Model/ticket/model.php');
        $ticketData = $busData = null;
        $ticket_seat = $booked_seat = [];
        if(isset($_GET['ticket_id']))
        {
            $ticket_id = $_GET['ticket_id'];
            $passenger_id = $_SESSION['id'];
            $ticketData = getTicketById($passenger_id, $ticket_id);
            if($ticketData == false)
            {
                header ('location: index.php');
            }
            $bus_id = $ticketData['bus_id'];
            $busData = getBusById($bus_id);
            $ticket_seat_data = getSeat($ticket_id);
            while ($row = mysqli_fetch_array($ticket_seat_data)) 
            {
                $ticket_seat[] = $row['seat_no'];
            }
            $booked_seat_data = getBookedSeat($bus_id);
            while ($row = mysqli_fetch_array($booked_seat_data)) 
            {
                $booked_seat[] = $row['seat_no'];
            }
        }
        else{
            header('location: index.php');
        }
    ?>
    <h1>My tickets</h1>

    <br/>
    <?php
        if($ticketData != NULL && $busData != NULL)
        {
        ?>
        <table>
            <tr>
                <th>Bus Data</th>
                <th>Ticket Data</th>
                <th>Seat Data</th>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <th>Ticket Id</th>
                            <td><?php echo $busData["id"]; ?></td>
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
                        <tr>
                            <td colspan="2">
                                <a href="../bus/book.php?bus_id=<?php echo $bus_id;?>">Buy more ticket</a>
                            </td>
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
                        <?php
                        if ($ticketData["status"] != "cancelled" ) {
                            ?>
                                <tr>
                                    <td colspan="2">
                                        <a href="cancel.php?ticket_id=<?php echo $ticket_id;?>">Cancel Ticket</a>
                                    </td>
                                </tr>
                            <?php
                        }
                        ?>
                        
                    </table>
                </td>
                <td>
                    <div class="bus">
                        <?php
                        for ($i=1; $i <= $busData["total_seat"]; $i++) 
                        {
                            if (in_array($i, $ticket_seat)){
                            ?>
                                <div class="seat-label seat-label-choosed">
                                    <?php echo $i; ?>
                                </div>
                            <?php
                            } 
                            else if (in_array($i, $booked_seat)){
                            ?>
                                <div class="seat-label seat-label-booked">
                                    <?php echo $i; ?>
                                </div>
                            <?php
                            } 
                            
                            else{
                            ?>
                                <div class="seat-label">
                                    <?php echo $i; ?>
                                </div>
                            <?php
                            }
                        }
                        ?> 
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a href="index.php">Back to List</a>
                </td>
            </tr>
        </table>
        <br>
        
        <?php
        }
    ?>
    <?php include_once("../footer.php"); ?>
    
</body>
</html>