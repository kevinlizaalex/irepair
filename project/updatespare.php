<?php
include("include/header.php");

include("include/dbconnect.php");

if (isset($_POST['updateSpareStatus'])) {
    $id = $_POST['updateSpareStatus'];
    $spareIdgrade = $_POST['spareselect'];
    $quantity = 0;
    $priceOf = 0;

    $fetchStock = "SELECT `price`,`quantity` FROM `tbl_spares` WHERE `id`='$spareIdgrade'";
    $fetchStockResult = mysqli_query($conn, $fetchStock);
    if (mysqli_num_rows($fetchStockResult) > 0) {
        while ($spareQuantity = mysqli_fetch_assoc($fetchStockResult)) {
            $quantity = $spareQuantity['quantity'];
            $priceOf = $spareQuantity['price'];
        }
    }

    if ($quantity > 0) {
        $sql = "UPDATE `tbl_repairdetails` SET `spare`= '$spareIdgrade', `rate`= `rate`+ $priceOf WHERE id = '$id'";
        echo $sql;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $updatesparecountsql = "UPDATE `tbl_spares` SET `quantity`= `quantity`-1 WHERE id = '$spareIdgrade'";
            if (mysqli_query($conn, $updatesparecountsql)) {
                header('location:technicianallocation.php');
            }
        }
    } else {
        echo "<script>alert('Spare is out of stock');</script>";
        echo "<center><a class='btn btn-success m-5 p-2' href='adminspares.php'>Go to stock update</a></center>";
    }


    //echo "hai";
}
