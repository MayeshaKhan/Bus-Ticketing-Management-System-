<?php
    include_once('../../Model/bus/model.php');

    //declaring variables for all input data
    $start_place = $end_place = $date = ""; 

    //declaring variables for all input error
    $start_placeErr = $end_placeErr = $dateErr = ""; 

    $busData = NULL;

    session_start();
    if(isset($_SESSION['find_bus_form'])){
        

        $find_bus_form = $_SESSION['find_bus_form'];
        // print_r($find_bus_form);
        
        $start_place = $find_bus_form['start_place'];
        $end_place = $find_bus_form['end_place'];
        $date = $find_bus_form['date'];

        $start_placeErr = $find_bus_form['start_placeErr'];
        $end_placeErr = $find_bus_form['end_placeErr'];
        $dateErr = $find_bus_form['dateErr'];

        $busData = $find_bus_form['busData'];

        $_SESSION['find_bus_form'] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Passenger: Find Bus</title>
</head>
<body>
<h1 class= "header"> Bus ticketing management system</h1>   
    <?php
        $dir = "../";
        include_once ('../header.php');
    ?>
    <h1>Find Bus</h1>
    <form action="../../Controller/bus/find_control.php" method="post">
        <fieldset>
            <legend>Find Bus</legend>

            <label for="start_place">Start Place:</label>
            <select name="start_place" id="start_place">
                <option value="" selected>Choose a place</option>
                <?php
                    $data = getPlace();
                    while ($row = mysqli_fetch_assoc($data))
                    {
                        ?>
                        <option value="<?php echo $row['id']; ?>" <?php echo $row['id']==$start_place ? "selected" : "" ?> >
                            <?php echo $row['name']; ?>
                        </option>
                        <?php
                    }
                ?>
            </select>
            <span class="error"><?php echo $start_placeErr ?></span>
            

            <label for="end_place">End Place:</label>
            <select name="end_place" id="end_place">
                <option value="" selected>Choose a place</option>
                <?php
                    $data = getPlace();
                    while ($row = mysqli_fetch_assoc($data))
                    {
                        ?>
                        <option value="<?php echo $row['id']; ?>"  <?php echo $row['id']==$end_place ? "selected" : "" ?>>
                            <?php echo $row['name']; ?>
                        </option>
                        <?php
                    }
                ?>
            </select>
            <span class="error"><?php echo $end_placeErr ?></span>
            

            <label for="date">Start Datetime:</label>
            <input type="date" id="date" name="date" value="<?php echo $date;?>">
            <span class="error"><?php echo $dateErr ?></span>

            <input type="submit" value="Find">

        </fieldset>
        
    </form>

    <br/>
    <?php
        if($busData != NULL)
        {
            ?>
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
                    foreach ($busData as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["id"]; ?></td>
                            
                            <td><?php echo $value["bus_name"]; ?></td>
                            <td><?php echo $value["total_seat"]; ?></td>
                            <td><?php echo $value["seat_price"]; ?></td>
                            <td><?php echo getPlaceName($value["start_place"]); ?></td>
                            <td><?php echo getPlaceName($value["end_place"]); ?></td>
                            <td><?php echo $value["start_datetime"]; ?></td>
                            <td><?php echo $value["end_datetime"]; ?></td>
                            <td><?php echo $value["status"]; ?></td>
                            <td>
                                <a href="book.php?bus_id=<?php echo $value["id"]; ?>">
                                    Book
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
            <?php
        }
    ?>
    <?php include_once("../footer.php"); ?>
    
</body>
</html>