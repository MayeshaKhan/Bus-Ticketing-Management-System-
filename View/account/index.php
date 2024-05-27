
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Passenger: Account</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include_once ('../header.php');
        include_once('../../Model/account/model.php');
    ?>
    <h1>My Account</h1>
    <a href="deposit.php">Deposit</a> | 
    <a href="withdraw.php">Withdraw</a>
    <br>
    <table>
        <tr>
            <th>[Id]</th>
            <th>[Transaction Datetime]</th>
            <th>[Amount]</th>
            <th>[Description]</th>
        </tr>
        <?php
            $data = getTransaction($_SESSION['id']);
            $backupData = getTransaction($_SESSION['id']);
            $account = 0;
            foreach ($data as $key => $value) {
                $account += $value['ammount'];
            }
            echo "Account: ".$account;
            while ($row = mysqli_fetch_assoc($backupData)) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["trans_datetime"]; ?></td>
                    <td><?php echo $row["ammount"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                </tr>
                <?php
            }
        ?>
    </table>
    <?php include_once("../footer.php"); ?>
</body>
</html>