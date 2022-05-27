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
    <style>
        .css-serial {
            counter-reset: serial-number;
            /* Set the serial number counter to 0 */
        }

        .css-serial td:first-child:before {
            counter-increment: serial-number;
            /* Increment the serial number counter */
            content: counter(serial-number);
            /* Display the counter */
        }
    </style>
    <h5 class="text-center mb-4 mt-5">Previous repair log</h5>

    <div class="container mb-5">
        <table class="table table-bordered css-serial">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Repair type</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include("include/dbconnect.php");
                $sql = "SELECT * FROM tbl_repairdetails";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
              <tr>
              <td scope='row'></th>
              <td scope='row'>" . $row['repairtype'] . "</th>
              <td scope='row'>" . $row['brand'] . "</th>
              <td scope='row'>" . $row['model'] . "</th>
              </tr>";
                    }
                }
                ?>

            </tbody>
        </table>

    </div>

    <?php
    if (isset($_POST['rbtn'])) {
        include "include/dbconnect.php";
        $id = $_POST['rbtn'];
        $sval = $_POST['status'];
        $sql = "UPDATE `tbl_repairdetails` SET `rstate`= '$sval' WHERE id = $id";
        //echo $sql;

        $result = mysqli_query($conn, $sql);
        //echo "hai";
    }
    ?>

    </body>

    </html>
<?php
}
?>