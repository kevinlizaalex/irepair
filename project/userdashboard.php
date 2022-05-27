<?php
include("include/header.php");
include("include/dbconnect.php");
if (isset($_SESSION["id"]) != session_id()) {

    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='userlogin.php';
      </script>");
} else {
?>

    <h5 class="text-center mb-4 mt-5" contenteditable>DASHBOARD</h5>



    <div class="container">
        <?php
        if (isset($_SESSION["id"]) == session_id()) {
            $nam = $_SESSION["s_name"];
            $phn = $_SESSION["s_phone"];
            $status = $_SESSION["s_status"];
            $selectid = $_SESSION["id"];

            $sql = "SELECT * FROM tbl_repairdetails WHERE userphone = $phn AND status = '1'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div style='display: inline-block;'>";
                    echo "<div class='card mb-3 shadow mx-3' style='width: 18rem;'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['model'] . "</h5>";
                    echo "<h6 class='card-subtitle mb-4 text-muted'>" . $row['brand'] . "</h6>";
                    echo "<h6 class='card-title'>" . $row['repairtype'] . " complaint</h6><br>";

                    if ($row['rate'] == 0) {
                        echo "<p class='card-text'>Rate: Pending to estimate !</p>";
                    } else {
                        echo "<p class='card-text'>Rate: ₹" . $row['rate'] . "</p>";
                    }
                    echo "<p class='card-text'>Spare details: ";
                    $Sparesql = "SELECT * FROM tbl_spares WHERE id='" . $row['spare'] . "'";
                    $SparesqlResult = mysqli_query($conn, $Sparesql);
                    if (mysqli_num_rows($SparesqlResult) > 0) {
                        while ($sparerow = mysqli_fetch_assoc($SparesqlResult)) {
                            echo  $sparerow['model'];
                        }
                    }
                    echo "</p>";

                    if ($row['rstate'] == 0) {
                        echo "<p class='card-text'>Status: <br>PENDING</p>";
                    } else if ($row['rstate'] == 1) {
                        echo "Status: <p class='card-text text-secondary'>RECIEVED</p>";
                    } else if ($row['rstate'] == 2) {
                        echo "Status: <p class='card-text text-warning'>PROGRESSING</p>";
                    } else if ($row['rstate'] == 3) {
                        echo "Status: <p class='card-text text-success'>COMPLETED</p>";
                    } else if ($row['rstate'] == 4) {
                        echo "Status: <p class='card-text text-success'>OUT FOR DELIVERY</p>";
                    } else if ($row['rstate'] == 5) {
                        echo "Status: <p class='card-text text-success'>WAITING FOR PICKUP</p>";
                    } else if ($row['rstate'] == 6) {
                        echo "Status: <p class='card-text text-success'>CLOSED</p>";
                    } else {
                    }

                    if ($row['payment_status'] == 0) {
                        echo "<h6 class='card-title'>Payment status: Pending</h6><br>";
                    } else {
                        echo "Payment status: <p class='card-text text-success'>DONE</p><br>";
                    }

                    if ($row['rstate'] >= 3 and $row['payment_status'] != 1) {
                        echo "<div class='mt-1'>";
                        echo "<form method='post' action='paymentgateway.php'>";
                        echo "<button name='pbtn' class='btn btn-danger' value='" . $row['id'] . "'>";
                        echo "<i class='bi bi-coin'></i></i>PAY";
                        echo "</button></form>";
                        echo "</div>";
                    } else if ($row['payment_status'] == 1) {
                        echo "<div class='mt-1'>";
                        echo "<form method='post' action='paymentgateway.php'>";
                        echo "<button name='pbtn' class='btn btn-success' value='" . $row['id'] . "' disabled>";
                        echo "<i class='bi bi-coin'></i></i>PAID";
                        echo "</button></form>";
                        echo "</div>";
                    }
                    if ($row['rstate'] == 0) {
                        echo "<form method='post'>";
                        echo "<div class='float-right mt-1'><button class='btn card-title bg-danger text-light text-decoration-none' name='delbtn' value='" . $row['id'] . "'><i class='bi bi-x-circle'></i> DELETE</button></div>";
                        echo "</form>";
                    }

                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='card-text text-danger h5'>NO REPAIR REQUESTS FOUND FOR YOU!</p>";
            }
        }
        ?>
        <?php
        if (isset($_POST['delbtn'])) {
            include "include/dbconnect.php";
            $iid = $_POST['delbtn'];
            $sql1 = "UPDATE tbl_repairdetails SET status = '0' WHERE id = '$iid'";
            //     echo ("<script LANGUAGE='JavaScript'>
            //     window.alert(" . $sql1 . ");
            //   </script>");
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                echo ("<script LANGUAGE='JavaScript'>
        window.alert('Request deleted succesfully.');
        window.location.href='userdashboard.php';
      </script>");
            }
            //echo "hai";
        }
        ?>
        <div>
            <h6 class="text-danger text-center"><i class="bi bi-exclamation-triangle"></i> Rate and spare details will be updated once the repair is in processing state ! </h6>
        </div>
    </div>

    </body>


    </html>
<?php
}
?>