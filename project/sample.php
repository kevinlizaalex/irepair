<?php
include("include/header.php");
include("include/dbconnect.php");
echo "<select class='custom-select' id='inputGroupSelect01' name='spareselect'>
<option selected>Choose...</option>";
$repairType = $row['repairtype'];
$fecthGradesql = "SELECT * FROM `tbl_spares` WHERE `category`='$repairType'";
$fecthGradesqlResult = mysqli_query($conn, $fecthGradesql);
if (mysqli_num_rows($fecthGradesqlResult) > 0) {
    while ($Typerow = mysqli_fetch_assoc($fecthGradesqlResult)) {

        echo "<option value='" . $Typerow['id'] . "'>" . $Typerow['model'] . "</option>";
    }
}
