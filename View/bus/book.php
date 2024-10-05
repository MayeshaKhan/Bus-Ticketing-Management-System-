<?php
    include_once('../../Model/bus/model.php');
    $bus_id = NULL;
    
    if(isset($_GET['bus_id']))
    {
        $bus_id = $_GET['bus_id'];
    }
    else{
        header('location: find.php');
    }

    session_start();
    if(isset($_SESSION['book_bus_form'])){
        
        $book_bus_form = $_SESSION['book_bus_form'];

        print_r($book_bus_form);
        $seat = $book_bus_form['seat'];
        $seatErr = $book_bus_form['seatErr'];

        $_SESSION['book_bus_form'] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../JS/bus/book.js"></script>
    <title>Passenger: Book Bus</title>
</head>
<h1 class= "header"> Bus ticketing management system</h1>   
<body onload="load_page(<?php echo $bus_id;?>)">
  
    <?php
        $dir = "../";
        include_once ('../header.php');
    ?>
    <h1>Book Ticket</h1>

    <br/>
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <th>Id</th>
                            <td>
                                <span id="bus_id">
                                    <?php //echo $busData["id"]; ?>
                                </span>
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Bus Name</th>
                            <td>
                                <span id="bus_name">
                                    <?php //echo $busData["bus_name"]; ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Seat</th>
                            <td>
                                <span id="total_seat">
                                    <?php //echo $busData["total_seat"]; ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Seat Price</th>
                            <td>
                                <span id="seat_price">
                                    <?php //echo $busData["seat_price"]; ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Start Place</th>
                            <td>
                                <span id="start_place">
                                    <?php //echo getPlaceName($busData["start_place"]); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>End Place</th>
                            <td>
                                <span id="end_place">
                                    <?php //echo getPlaceName($busData["end_place"]); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Start Datetime</th>
                            <td>
                                <span id="start_datetime">
                                    <?php //echo $busData["start_datetime"]; ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>End Datetime</th>
                            <td>
                                <span id="end_datetime">
                                    <?php //echo $busData["end_datetime"]; ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span id="status">
                                    <?php //echo $busData["status"]; ?>
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <h2>Choose seat</h2>
                    <form id="booking-form">
                        <div class="bus" id="seat-view">
                            <!-- seat-view -->
                        </div>
                        <span id="seatErr" class="error">Choose seat</span>
                        <!-- <input type="submit" value="Book">
                        <a href="index.php">Cancel</a> -->
                    </form>
                </td>
                <td>
                    <form class="ticket-form" method="post" onsubmit="return isValid(this);">
                        <fieldset>
                            <legend>Confirm ticket</legend>

                            <label for="coupon">Use coupon(optional)</label>
                            <input type="text" name="coupon" id="coupon" value="" onkeyup="validatedCoupon(this.value);">
                            <span id="couponErr" class="error"></span>
                            <table>
                                <tr>
                                    <td>
                                        <label for="seat">Seat Choosen</label>
                                        <input id="seat-input" type="hidden" value="[]" name="seat">
                                    </td>
                                    <td>
                                        <span id="seat-choosen-data">No seat choosen</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="price">Total Price: </label>
                                    </td>
                                    <td>
                                        <span id="total_price">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="discount_price">Discount Price: </label>
                                    </td>
                                    <td>
                                        <span id="discount_price">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="final_price">Final Price: </label>
                                    </td>
                                    <td>
                                        <span id="final_price">0</span>
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" value="Confirm" name="confirm">
                            <a href="index.php">Cancel</a>
                        </fieldset>
                    </form>
                </td>
            </tr>
        </table>
    <?php include_once("../footer.php"); ?>
    
</body>
</html>