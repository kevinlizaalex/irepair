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
    <h5 class="text-center mb-4 mt-5">MANAGE STOCK REQUESTS</h5>

    <div class="container mb-5">
        <table class="table table-bordered css-serial">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Requirement</th>
                    <th scope="col">Status</th>
                    <th scope="col">Stock update</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include("include/dbconnect.php");
                $sql = "SELECT * FROM tbl_spares";
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
              <td scope='row'>" . $row['quantity'] . "</th>
              <td scope='row'>" . $row['requirement'] . "</th>
              <td scope='row'>";
                        if ($row['requirement'] == 0 and $row['quantity'] > 0) {
                            echo "<p class='card-text text-success'>STOCKED WITHOUT REQUIREMENT</p>";
                        } else if ($row['requirement'] > 0 and $row['quantity'] != 0) {
                            echo "<p class='card-text text-warning'>STOCKED WITH REQUIREMENT</p>";
                        } else if ($row['requirement'] == 0 and $row['quantity'] == 0) {
                            echo "<p class='card-text text-danger'>URGENT STOCK REQUIRED</p>";
                        } else {
                        }
                        echo "</th>";
                        echo "<td>
                            
                            <form method=post>
                            
                              <input name='status' id='inputGroupSelect01' type='number' required />

                              <button class='btn btn-secondary' value='" . $row['id'] . "' name=rbtn>Update</button>
                            </form>
                            </td>";



                        echo "<td scope='row'><a class='btn btn-light' name='mbtn' value='hai' href='adminuserdetail.php?id=" . $row['id'] . "'>Show</a></th>
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
        $sql = "UPDATE `tbl_spares` SET `requirement`= `requirement`-'$sval' , `quantity` = `quantity` + '$sval' WHERE id = $id";
        //echo $sql;

        $result = mysqli_query($conn, $sql);
        //echo "hai";
        if ($result) {
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='adminspares.php';
      </script>");
        }
    }
    ?>

    </body>

    </html>
<?php
}
?>