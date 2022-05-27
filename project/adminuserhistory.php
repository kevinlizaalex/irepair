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

    <h5 class="text-center mb-4 mt-5">Customer Details</h5>

    <div class="container mb-5">

        <?php
        include("include/dbconnect.php");
        if (!empty($_GET['id'])) {
            $_SESSION['viewuserid'] = $_GET['id'];
        }
        $userid = $_SESSION['viewuserid'];
        $sql = "SELECT * FROM tbl_repairdetails WHERE id=$userid";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "
                <div class='card'>
            <div class='card-header'>
                " . $row['model'] . " // " . $row['brand'];
                if ($row['rstate'] == 0) {
                    echo "<p class='card-text'><br>PENDING</p>";
                } else if ($row['rstate'] == 1) {
                    echo "<p class='card-text text-secondary'>RECIEVED</p>";
                } else if ($row['rstate'] == 2) {
                    echo "<p class='card-text text-warning'>PROGRESSING</p>";
                } else if ($row['rstate'] == 3) {
                    echo "<p class='card-text text-success'>COMPLETED</p>";
                } else if ($row['rstate'] == 4) {
                    echo "<p class='card-text text-success'>OUT FOR DELIVERY</p>";
                } else if ($row['rstate'] == 5) {
                    echo "<p class='card-text text-success'>WAITING FOR PICKUP</p>";
                } else if ($row['rstate'] == 6) {
                    echo "<p class='card-text text-success'>CLOSED</p>";
                } else {
                }
                echo "</div>
            <div class='card-body'>
                <h5 class='card-title'>" . $row['username'] . "</h5>
                <p class='card-text'></p>
                <p class='card-text'>Date recieved: " . $row['date'] . "</p>
                <p class='card-text'>Email: " . $row['useremail'] . "<br>Phone: " . $row['userphone'] . "<br>Address: " . $row['addressline1'] . ", " . $row['addressline2'] . ", " . $row['city'] . ", " . $row['state'] . ", " . $row['zip'] . "</p>
                <a href='adminrepairstatus.php' class='btn btn-primary'>BACK</a>
            </div>
        </div>";
            }
        }
        ?>

    </div>

    </body>

    </html>
<?php
}
?>