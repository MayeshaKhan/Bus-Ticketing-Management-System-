
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Passenger: See Coupon</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include_once ('../header.php');
        include_once('../../Model/coupon/model.php');
    ?>
    <h1>Coupon List</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Coupon</th>
            <th>Percentage</th>
            <th>Max Discount</th>
        </tr>
        <?php
            $data = get_coupon();
            while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["coupon"]; ?></td>
                <td><?php echo $row["percentage"]; ?></td>
                <td><?php echo $row["max_discount"]; ?></td>
            </tr>
            <?php
            }
        ?>
    </table>
    <?php include_once("../footer.php"); ?>
</body>
</html>