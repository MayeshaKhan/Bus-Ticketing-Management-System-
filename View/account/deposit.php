<?php
    //declaring variables for all input data
    $ammount = ""; 
    //declaring variables for all input error
    $ammountErr = ""; 
    //checking if request method is post

    session_start();
    if(isset($_SESSION['deposit_form'])){
        

        $deposit_form = $_SESSION['deposit_form'];
        print_r($deposit_form);
        
        $ammount = $deposit_form['ammount'];

        $ammountErr = $deposit_form['ammountErr'];

        $_SESSION['deposit_form'] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../JS/account/deposit.js"></script>
    <title>Passenger: Deposit From</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include_once ('../header.php');
    ?>
    <h1>Deposit</h1>
    <form method="post" action="<?php echo htmlspecialchars('../../controller/account/deposit_control.php');?>" novalidate onsubmit="return isValid(this);"> 
    <fieldset>
    <legend>Deposit Form</legend>
    <label for="ammount">Amount:</label>
    <input type="number" id="ammount" name="ammount" value="<?php echo $ammount;?>">
    <span id="ammountErr" class="error"><?php echo $ammountErr ?></span>
    <br><br>

    
    <input type="submit" value="Deposit"><br>
    <a href="index.php">Cancel</a>
    </fieldset>
    </form>
    <?php include_once("../footer.php"); ?>
</body>
</html>