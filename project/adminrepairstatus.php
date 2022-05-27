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
  <?php

  if (isset($_POST['selfAssignWorkSubmit'])) {
    $id = $_POST['selfAssignWorkSubmit'];
    $techId = $_SESSION["s_id"];
    $sql = "UPDATE `tbl_repairdetails` SET `assigntech`='$techId' WHERE `id`='$id'";    //echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo ('
      <div class="col-4 m-auto alert alert-warning alert-dismissible fade show" role="alert">
 <center>
 <strong>The job is yours.</strong> Manage your jobs at <a class="text-dark" href="technicianallocation.php"> My Jobs</a> 
 <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
 </center>
</div> <br>');
    } else {
      echo ("<script LANGUAGE='JavaScript'>
      window.location.href='adminrepairstatus.php';
    </script>");
    }
    //echo "hai";
  }
  ?>

  <div class="container mb-5">
    <table class="table table-bordered css-serial">
      <thead class="">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Repair</th>
          <th scope="col">Mobile</th>
          <th scope="col">IMEI</th>
          <th scope="col">Details</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include("include/dbconnect.php");
        $sql = "SELECT * FROM tbl_repairdetails where assigntech = 0 order by date desc";
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
            echo "<td scope='row'>" . $row['imei'] . "</th>";
            echo "<td scope='row'><a class='btn btn-light' name='mbtn' value='hai' href='adminuserdetail.php?id=" . $row['id'] . "'>Show</a></th>
            <td scope='row'>
            <form method='post' action='#'>
            <button class='btn btn-success' name='selfAssignWorkSubmit' value='" . $row['id'] . "'>Collect work</button>
            </form>
            </th>
            
            </tr>";
          }
        }
        ?>

      </tbody>
    </table>

  </div>

  <?php


  if (isset($_POST['rbtn'])) {
    $id = $_POST['rbtn'];
    $sval = $_POST['status'];
    $sql = "UPDATE `tbl_repairdetails` SET `rstate`= '$sval' WHERE id = $id";
    //echo $sql;

    $result = mysqli_query($conn, $sql);
    //echo "hai";
  }

  if (isset($_POST['ratebtn'])) {
    $id = $_POST['ratebtn'];
    $sval = $_POST['rateval'];
    $sql = "UPDATE `tbl_repairdetails` SET `rate`= '$sval' WHERE id = $id";
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