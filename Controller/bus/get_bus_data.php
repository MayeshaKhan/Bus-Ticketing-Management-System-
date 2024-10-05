<?php

    include_once('../../Model/bus/model.php');
    
    if(isset($_GET['bus_id']))
    {
        $bus_id = $_GET['bus_id'];
        $busData = getBusById($bus_id);
        $booked_seat_data = getBookedSeat($bus_id);
        $booked_seat = [];
        while ($row = mysqli_fetch_array($booked_seat_data)) 
        {
            $booked_seat[] = $row['seat_no'];
        }
        $start_place = getPlaceName($busData["start_place"]);
        $end_place = getPlaceName($busData["end_place"]);
        $response_data = array(
            "bus_data" => $busData, 
            "booked_seat_data" => $booked_seat,
            "start_place" => $start_place,
            "end_place" => $end_place
        );
        $response_json_data = json_encode($response_data);
        echo $response_json_data;
    }
    else{
        echo "";
    }
?>