<?php
require_once __DIR__ .'/../db.php';

function getProfile($passenger_id)
{
    $con = getconnection();

    $sql = "SELECT * FROM passenger WHERE id = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $passenger_id);
    $stmt->execute();
    $result = $stmt->get_result();

    
    $stmt->close();
    $con->close();

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function email_exists($email)
{
    $conn = getconnection();
    $sql = "SELECT email FROM passenger WHERE email = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    
    $stmt->close();
    $conn->close();

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function updateProfile($id, $uname, $email, $contact, $address)
{
    $conn = getconnection();
    $sql = "UPDATE passenger SET uname = ?, email = ?, contact = ?, address = ? WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $uname, $email, $contact, $address, $id);
    $result = $stmt->execute();

   
    $stmt->close();
    $conn->close();

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function changePassword($id, $old_password, $new_password)
{
    $conn = getconnection();
    $sql = "UPDATE passenger SET password = ? WHERE id = ? AND password = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $new_password, $id, $old_password);
    $result = $stmt->execute();

    
    $stmt->close();
    $conn->close();

    if ($result) {
        return $result;
    } else {
        return false;
    }
}
?>
