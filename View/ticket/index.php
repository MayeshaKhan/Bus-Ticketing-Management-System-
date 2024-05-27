
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>My Ticket</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include_once ('../header.php');
        include_once('../../Model/ticket/model.php');
    ?>
    <h1>Bus List</h1>
    <table>
        <tr>
            <th>Ticket Id</th>
            <th>Bus Id</th>
            <th>Seat No</th>
            <th>Purchase Datetime</th>
            <th>Price</th>
            <th>Discount Price</th>
            <th>Final Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
            $ticketData = getTicket($_SESSION['id']);
            while ($ticket = mysqli_fetch_assoc($ticketData)) {
                ?>
                <tr>
                    <td><?php echo $ticket["id"]; ?></td>
                    <td><?php echo $ticket["bus_id"]; ?></td>
                    <td>
                        <?php
                        $seatData = getSeat($ticket['id']);
                        while($seat = mysqli_fetch_assoc($seatData)){
                            echo $seat['seat_no']. ", ";
                        }
                        ?>
                    </td>
                    <td><?php echo $ticket["purchase_datetime"]; ?></td>
                    <td><?php echo $ticket["price"]; ?></td>
                    <td><?php echo $ticket["discount_price"]; ?></td>
                    <td><?php echo $ticket["price"] - $ticket["discount_price"]; ?></td>
                    <td><?php echo $ticket["status"]; ?></td>
                        
                    <td>

                        <a href="details.php?ticket_id=<?php echo $ticket['id'];?>">
                            Details
                        </a>
                        <?php
                        if($ticket["status"] == 'booked')
                        {
                        ?>
                             | 
                            <a href="cancel.php?ticket_id=<?php echo $ticket['id'];?>">
                                Cancel
                            </a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
    <?php include_once("../footer.php"); ?>
</body>
</html>