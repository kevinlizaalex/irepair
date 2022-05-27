<?php
include("include/dbconnect.php");
if (isset($_POST['paybutton'])) {
    $repairid = $_POST['paybutton'];
    $updateTransactionId = "UPDATE `tbl_repairdetails` SET `payment_status`='1' WHERE `id`='$repairid'";
    echo $updateTransactionId;
    $result = mysqli_query($conn, $updateTransactionId);
    if ($result) {
        header('location:userdashboard.php');
    }
} else {
    echo "asdasdasd";
    echo $_POST['paybutton'];
}
