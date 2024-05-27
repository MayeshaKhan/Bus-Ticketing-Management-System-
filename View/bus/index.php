
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Passenger: See Bus</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
    
        $dir = "../";
        include_once ('../header.php');
        include_once('../../Model/bus/model.php');
    ?>
    <h1>Bus List</h1>
    <a href="find.php">Find Bus</a><br>
    <table>
        <tr>
            <th>Id</th>
            
            <th>Bus Name</th>
            <th>Total Seat</th>
            <th>Seat Price</th>
            <th>Start Place</th>
            <th>End Place</th>
            <th>Start Datetime</th>
            <th>End Datetime</th>
            <th>Stauts</th>
        </tr>
        <?php
            $data = getBus();
            while ($row = mysqli_fetch_assoc($data)) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    
                    <td><?php echo $row["bus_name"]; ?></td>
                    <td><?php echo $row["total_seat"]; ?></td>
                    <td><?php echo $row["seat_price"]; ?></td>
                    <td><?php echo getPlaceName($row["start_place"]); ?></td>
                    <td><?php echo getPlaceName($row["end_place"]); ?></td>
                    <td><?php echo $row["start_datetime"]; ?></td>
                    <td><?php echo $row["end_datetime"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td>
                        <a href="book.php?bus_id=<?php echo $row["id"]; ?>">
                            Book
                        </a>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
    <?php include_once("../footer.php"); ?>
</body>
</html>