<?php

    include_once('../../Model/bus/model.php');

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $busData = NULL;
    //declaring variables for all input data
    $start_place = $end_place = $date = ""; 
    //declaring variables for all input error
    $start_placeErr = $end_placeErr = $dateErr = ""; 
    //checking if request method is post
    $validationFlag = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        //date validation
        if(isset($_POST['date']))
        {
            $date=test_input($_POST['date']);
            if($date=="")
            {
                $dateErr="Please enter date";
                // $validationFlag = false;
            }
           
        }
        //start_place validation
        if(isset($_POST['start_place']))
        {
            $start_place=test_input($_POST['start_place']);
            if($start_place=="")
            {
                $start_placeErr="Please choose start place";
                // $validationFlag = false;
            }
        }else{
            // $start_placeErr="Please choose start place";
            // $validationFlag = false;
        }
        //end_place validation
        if(isset($_POST['end_place']))
        {
            $end_place=test_input($_POST['end_place']);
            if($end_place=="")
            {
                $end_placeErr="Please choose end place";
                // $validationFlag = false;
            }
        }else{
            $end_placeErr="Please choose end place";
            // $validationFlag = false;
        }
        // start_place and end_place validation
        if($start_placeErr=="" && $end_placeErr=="")
        {
            if($start_place == $end_place && $start_place !="")
            {
                $start_placeErr="Start and End Place can not be same";
                $end_placeErr="Start and End Place can not be same";
                $validationFlag = false;
            }
        }
        //Inserting database if everything is right
        //if($validationFlag)
        {
            if($result = findBus($start_place, $end_place, $date))
            {
                while ($row = mysqli_fetch_assoc($result)) {
                    $busData[] = $row;
                }
            }
            $find_bus_form = array(
                'start_place' => $start_place,
                'end_place' => $end_place,
                'date' => $date,

                'start_placeErr' => $start_placeErr,
                'end_placeErr' => $end_placeErr,
                'dateErr' => $dateErr,

                'busData' => $busData
            );

            session_start();
            $_SESSION['find_bus_form'] = $find_bus_form;

            header("location: ../../View/bus/find.php");
        }
    }
?>