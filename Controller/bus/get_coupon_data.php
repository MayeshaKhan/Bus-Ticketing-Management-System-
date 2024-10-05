<?php

    include_once('../../Model/bus/model.php');
    
    if(isset($_GET['coupon']))
    {
        $coupon = $_GET['coupon'];
        $coupon_data = getDiscountCoupon($coupon);
        $response_json_data = json_encode($coupon_data);
        echo $response_json_data;
    }
    else{
        echo "false";
    }
?>