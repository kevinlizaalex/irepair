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
    <h5 class="text-center mb-4 mt-5">Users</h5>

    <div class="container mb-5">
        <table class="table table-bordered css-serial">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include("include/dbconnect.php");
                $sql = "SELECT * FROM tbl_user ";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
              <tr>
              <td scope='row'></th>
              <td scope='row'>" . $row['name'] . "</th>
              <td scope='row'>" . $row['email'] . "</th>
              <td scope='row'>" . $row['phone'] . "</th>
              <td scope='row'>";


                        if ($row['status'] == 0) {
                            echo "<p class='card-text text-danger'>INACTIVE</p>";
                        } else {
                            echo "<p class='card-text text-success'>ACTIVE</p>
                            ";
                        }

                        echo "<td scope='row'><form method='post'><button class='btn card-title bg-danger text-light text-decoration-none' name='delbtn' value='" . $row['id'] . "'><i class='bi bi-x-circle'></i> DEACTIVATE</button> <button class='btn card-title bg-success text-light text-decoration-none' name='acbtn' value='" . $row['id'] . "'><i class='bi bi-check-square'></i> ACTIVATE</button></th>
                        </form></td>";

                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </body>

    </html>
    <?php
    if (isset($_POST['delbtn'])) {
        include "include/dbconnect.php";
        $iid = $_POST['delbtn'];
        $sql1 = "UPDATE tbl_user SET status = '0' WHERE id = '$iid'";
        //     echo ("<script LANGUAGE='JavaScript'>
        //     window.alert(" . $sql1 . ");
        //   </script>");
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('User deactivated succesfully.');
            window.location.href='adminshowusers.php';
      </script>");
        }
        //echo "hai";
    }
    if (isset($_POST['acbtn'])) {
        include "include/dbconnect.php";
        $iid = $_POST['acbtn'];
        $sql1 = "UPDATE tbl_user SET status = '1' WHERE id = '$iid'";
        //     echo ("<script LANGUAGE='JavaScript'>
        //     window.alert(" . $sql1 . ");
        //   </script>");
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            echo ("<script LANGUAGE='JavaScript'>
        window.alert('User activated succesfully.');
        window.location.href='adminshowusers.php';
      </script>");
        }
        //echo "hai";
    }
    ?>
<?php
}
?>