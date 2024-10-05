
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/style.css">
    <title>Passenger: Security</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../../";
        include_once ('../../header.php');
        include_once('../../../Model/profile/security/model.php');
    ?>
    <h1>Passenger: Security Question</h1>
    <a href="../update.php">Update</a> | 
    <a href="../change-password.php">Change Password</a> | 
    <a href="../security">Security Question</a>
    <br>
    <?php $data = getProfile($_SESSION['id']);?>
    <table>
        <tr>
            <th>Security Question:</th>
            <td><?php echo $data["security_question"]; ?></td>
        <tr>
            <th>Security Answer:</th>
            <td><?php echo $data["security_answer"]; ?></td>
            
        </tr>
    </table>
    <a href="update.php">Update Security</a>
    <br>
    <?php include_once("../../footer.php"); ?>
</body>
</html>