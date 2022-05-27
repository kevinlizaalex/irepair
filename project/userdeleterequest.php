<?php
include "include/dbconnect.php";
echo "hai";

$query = "UPDATE tbl_repairdetails SET status ='0' WHERE phone = '$r_phone' OR email = '$r_email'";
$result1 = mysqli_query($conn, $query);
