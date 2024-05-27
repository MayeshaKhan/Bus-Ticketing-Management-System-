
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Passenger: My Profile</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include_once ('../header.php');
        include_once('../../Model/profile/model.php');
    ?>
    <h1>Passenger: My Profile</h1>
    <a href="update.php">Update</a> | 
    <a href="change-password.php">Change Password</a> | 
    <a href="security">Security Question</a>
    <br>
    <?php $data = getProfile($_SESSION['id']);?>
    <table>
        <tr>
            <th>[User Name]</th>
            <td><?php echo $data["uname"]; ?></td>
        <tr>
            <th>[Email]</th>
            <td><?php echo $data["email"]; ?></td>
            
        </tr>
        <tr>
            <th>[Contact]</th>
            <td><?php echo $data["contact"]; ?></td>

        </tr>
        <tr>
            <th>[Address]</th>
            <td><?php echo $data["address"]; ?></td>
        </tr>
    </table>
    <?php include_once("../footer.php"); ?>
</body>
</html>