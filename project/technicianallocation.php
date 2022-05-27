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
  <h5 class="text-center mb-4 mt-5">MANAGE REPAIRS</h5>

  <div class="container mb-5">
    <table class="table table-bordered css-serial">
      <thead class="">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Repair</th>
          <th scope="col">Mobile</th>
          <th scope="col">Spare</th>
          <th scope="col">IMEI</th>
          <th scope="col">Servie cost</th>
          <th scope="col">Status</th>
          <th scope="col">Total cost</th>
          <th scope="col">Status update</th>
          <th scope="col">Details</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include("include/dbconnect.php");
        $techId = $_SESSION["s_id"];
        $sql = "SELECT * FROM tbl_repairdetails WHERE `assigntech`='$techId' order by date desc";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
              <tr>
              <td scope='row'></th>
              <td scope='row'>" . $row['date'] . "</th>
              <td scope='row'>" . $row['repairtype'] . "</th>
              <td scope='row'>" . $row['brand'] . " " . $row['model'] . "</th>";
            if ($row['spare'] != 'Empty') {
              $fecthSpareName = "SELECT model FROM `tbl_spares` WHERE `id`=" . $row['spare'] . "";
              $fecthSpareNameResult = mysqli_query($conn, $fecthSpareName);
              if (mysqli_num_rows($fecthSpareNameResult) > 0) {
                while ($spareName = mysqli_fetch_assoc($fecthSpareNameResult)) {
                  echo "<td scope='row'>" . $spareName['model'] . "</td>";
                }
              }
            } else {
              echo "
              <td scope='row'>
              <form method='post' action='updatespare.php'>
                            <select class='custom-select' id='inputGroupSelect01' name='spareselect'>
                                <option selected>Choose...</option>";
              $repairType = $row['repairtype'];
              $fecthGradesql = "SELECT * FROM `tbl_spares` WHERE `category`='$repairType'";
              $fecthGradesqlResult = mysqli_query($conn, $fecthGradesql);
              if (mysqli_num_rows($fecthGradesqlResult) > 0) {
                while ($Typerow = mysqli_fetch_assoc($fecthGradesqlResult)) {

                  echo "<option value='" . $Typerow['id'] . "'>" . $Typerow['model'] . "</option>";
                }
              }
              echo "       </select>
                              <br><button class='btn btn-secondary' value='" . $row['id'] . "' name='updateSpareStatus'>Update</button>
                            </form>
              </td>";
            }

            echo "
              <td scope='row'>" . $row['imei'] . "</th>
              <td scope='row'>";
            if ($row['is_servicecharge_added'] == 0) {
              echo "<form method=post>
              <input class='w-50 form-control' type='number' min='0' name='rateval'></input>
              <button class='btn btn-secondary' value='" . $row['id'] . "' name=ratebtn>Update</button>
            </form>";
            } else {
              echo "Added";
            }

            echo "</td>
              <td scope='row'>";
            if ($row['rstate'] == 0) {
              echo "<p class='card-text'>PENDING</p>";
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
            echo "</th>
            <td scope='row'>" . $row['rate'] . "</th>";
            echo "<td> 
                            <form method=post>
                            <select class='custom-select' id='inputGroupSelect01' name='status'>
                                <option selected>Choose...</option>
                                <option value='0'>Pending</option>
                                <option value='1'>Recieved</option>
                                <option value='2'>Progress</option>
                                <option value='3'>Completed</option>
                                <option value='4'>Out for delivery</option>
                                <option value='5'>Waiting for pickup</option>
                                <option value='6'>Closed</option>
                              </select>
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
    $sql = "UPDATE `tbl_repairdetails` SET `rstate`= '$sval' WHERE id = $id";
    //echo $sql;

    $result = mysqli_query($conn, $sql);
    //echo "hai";
  }

  if (isset($_POST['ratebtn'])) {
    include "include/dbconnect.php";
    $id = $_POST['ratebtn'];
    $sval = $_POST['rateval'];
    $sql = "UPDATE `tbl_repairdetails` SET `rate`= `rate`+'$sval',`is_servicecharge_added`=1 WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    echo ("<script LANGUAGE='JavaScript'>
        window.location.href='technicianallocation.php';
      </script>");
  }
  ?>

  </body>

  </html>
<?php
}
?>