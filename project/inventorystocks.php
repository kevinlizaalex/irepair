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
    <h5 class="text-center mb-4 mt-5">STOCKS</h5>
    <h6 class="text-center mb-4 mt-5"> -- DISPLAY --</h6>

    <div class="container mb-5">
        <table class="table table-bordered css-serial">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $a1 = "Display";
                include("include/dbconnect.php");
                $sql = "SELECT brand, model, price, quantity FROM tbl_spares where category = 'Display' group by brand";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
              <tr>
              <td scope='row'></th>
              <td scope='row'>" . $row['brand'] . "</th>
              <td scope='row'>" . $row['model'] . "</th>
              <td scope='row'>" . $row['price'] . "</th>
              <td scope='row'>" . $row['quantity'] . "</th>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <h6 class="text-center mb-4 mt-5">DISPLAY</h6>

    <div class="container mb-5">
        <table class="table table-bordered css-serial">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $a1 = "Display";
                include("include/dbconnect.php");
                $sql = "SELECT brand, model, price, quantity FROM tbl_spares where category = 'Battery' group by brand";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
              <tr>
              <td scope='row'></th>
              <td scope='row'>" . $row['brand'] . "</th>
              <td scope='row'>" . $row['model'] . "</th>
              <td scope='row'>" . $row['price'] . "</th>
              <td scope='row'>" . $row['quantity'] . "</th>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <h6 class="text-center mb-4 mt-5">DISPLAY</h6>

    <div class="container mb-5">
        <table class="table table-bordered css-serial">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include("include/dbconnect.php");
                $sql = "SELECT brand, model, price, quantity FROM tbl_spares where category = 'Board' group by brand";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
              <tr>
              <td scope='row'></th>
              <td scope='row'>" . $row['brand'] . "</th>
              <td scope='row'>" . $row['model'] . "</th>
              <td scope='row'>" . $row['price'] . "</th>
              <td scope='row'>" . $row['quantity'] . "</th>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </body>

    </html>
    <?php
    if (isset($_POST['dbtn'])) {
        include "include/dbconnect.php";
        $iid = $_POST['delbtn'];
        $sql1 = "UPDATE tbl_user SET status = '0' WHERE id = '$iid'";
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
<?php
}
?>