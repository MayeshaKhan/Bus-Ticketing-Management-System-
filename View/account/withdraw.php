<?php
    //declaring variables for all input data
    $ammount = ""; 
    //declaring variables for all input error
    $ammountErr = ""; 
    //checking if request method is post

    session_start();
    if(isset($_SESSION['withdraw_form'])){
        

        $withdraw_form = $_SESSION['withdraw_form'];
        // print_r($withdraw_form);
        
        $ammount = $withdraw_form['ammount'];

        $ammountErr = $withdraw_form['ammountErr'];

        $_SESSION['withdraw_form'] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../JS/account/withdraw.js"></script>
    <title>Passenger: Withdraw</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include_once ('../header.php');
    ?>
    <h1>My Withdraw</h1>
    <form method="post" action="<?php echo htmlspecialchars('../../controller/account/withdraw_control.php');?>" novalidate onsubmit="return isValid(this);"> 
    <fieldset>
    <legend>withdraw Form</legend>
    <label for="ammount">Amount:</label>
    <input type="number" id="ammount" name="ammount" value="<?php echo $ammount;?>">
    <span id="ammountErr" class="error"><?php echo $ammountErr ?></span>
    <br><br>

   
    <input type="submit" value="Withdraw"><br>
    <a href="index.php">Cancel</a>
    </fieldset>
    </form>
    <?php include_once("../footer.php"); ?>
</body>
</html>