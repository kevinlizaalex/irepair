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
    <h5 class="text-center mb-4 mt-5">Repair Quotations</h5>

    <div class="container mb-5">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Repair Type</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Pickup mode</th>
                    <th scope="col">Address 1</th>
                    <th scope="col">Address 2</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Zip</th>
                    <th scope="col">Country</th>
                    <th scope="col">Status</th>
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
              <td scope='row'>" . $row['id'] . "</th>
              <td scope='row'>" . $row['username'] . "</th>
              <td scope='row'>" . $row['userphone'] . "</th>
              <td scope='row'>" . $row['useremail'] . "</th>
              <td scope='row'>" . $row['repairtype'] . "</th>
              <td scope='row'>" . $row['brand'] . "</th>
              <td scope='row'>" . $row['model'] . "</th>
              <td scope='row'>" . $row['pickupmode'] . "</th>
              <td scope='row'>" . $row['addressline1'] . "</th>
              <td scope='row'>" . $row['addressline2'] . "</th>
              <td scope='row'>" . $row['city'] . "</th>
              <td scope='row'>" . $row['state'] . "</th>
              <td scope='row'>" . $row['zip'] . "</th>
              <td scope='row'>" . $row['country'] . "</th>";

                        if ($row['rstatus'] == 0) {
                            echo "<td>
<form method=post>
    <button class='btn btn-success' value='" . $row['id'] . "' name=ap> Aprove </button>
    <button class='btn btn-danger' value='" . $row['id'] . "' name=re>Reject</button>
</form>
</td>";
                        } else if ($row['rstatus'] == 1) {
                            echo "<td>
<form method=post>
<button class='btn btn-success' value='" . $row['id'] . "' name=ap disabled=true>Aprove</button>
<button class='btn btn-danger' value='" . $row['id'] . "' name=re>Reject</button>
</form>
</td>";
                        } else if ($row['rstatus'] == 2) {
                            echo "<td>
<form method=post>
<button class='btn btn-success' value='" . $row['id'] . "' name='ap'>Aprove</button>
<button class='btn btn-danger' value='" . $row['id'] . "' name='re' disabled=true>Reject</button>
</form>
</td>";
                        } else {
                        }
                        "</tr>";
                    }
                }
                ?>

            </tbody>
        </table>

    </div>

    <?php
    if (isset($_POST['ap'])) {
        include "include/dbconnect.php";
        $id = $_POST['ap'];
        $sql = "UPDATE `tbl_repairdetails` SET `rstatus`= 1 WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        //echo "hai";
    }
    if (isset($_POST['re'])) {
        include "include/dbconnect.php";
        $rid = $_POST['re'];
        $rsql = "UPDATE `tbl_repairdetails` SET `rstatus`= 2 WHERE id = $rid";
        $rresult = mysqli_query($conn, $rsql);
        //echo "hai";
    }
    ?>

    </body>

    </html>
<?php
}
?>