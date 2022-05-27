<?php
include("include/dbconnect.php");

if (isset($_POST['rbtn'])) {
    include "include/dbconnect.php";
    $id = $_POST['rbtn'];
    $sval = $_POST['status'];
    $sql = "UPDATE `tbl_spares` SET `requirement`= `requirement`+'$sval' WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:adminspares.php');
    }
    //echo "hai";
}
