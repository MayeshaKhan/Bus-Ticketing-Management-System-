<?php
    require_once __DIR__ .'/../db.php';
    function get_coupon()
    {
        $con = getconnection();

        $sql = "select * from discount_coupon";

        $result = mysqli_query($con, $sql);

        // Closing database connection
        $con->close();

		if($result)
        {
			return $result;
		}
        else
        {
			return false;
		}
    }
?>