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
  <div class="mt-5">
    <div class="card mx-auto text-center" style="width: 18rem;">
      <img src="https://i.pinimg.com/originals/41/ab/dd/41abdd25ff0b3d082581025c043967d5.jpg" class="card-img-top shadow mb-1 bg-dark rounded" alt="...">
      <div class="card-body">
        <?php
        include("include/dbconnect.php");
        $uid = $_SESSION["s_id"];
        $num = $_SESSION["s_name"];
        $sql = "SELECT * FROM tbl_user  where id = $uid";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<h5 class=card-title>" . $nam . "</h5>";
            echo "<p class=card-text>" . $row['email'] . "</p>";
            echo "<p class=card-text>" . $row['phone'] . "</p>";
          }
        }
        ?>
        <a class="btn btn-primary w-100" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Update password</a>

      </div>
    </div>
  </div>

  <?php
  if (isset($_POST["update"])) {
    $r_phone = $_SESSION["s_phone"];
    $r_cpass = md5($_POST["cpass"]);
    $r_npass = md5($_POST["npass"]);
    $r_nrpass = $_POST["nrpass"];
    $sql2 = "SELECT * FROM tbl_user WHERE  phone ='$r_phone' AND password='$r_cpass'";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {
      $sql = "UPDATE tbl_user SET password ='$r_npass' where phone='$r_phone'";
      $result1 = mysqli_query($conn, $sql);
      if ($result1) {
        echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Congratulations, Password update succesful.');
                    window.location.href='userpage.php';
                  </script>");
      } else {
        echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Incorrect current password!');
                    window.location.href='userpage.php';
                  </script>");
      }
    } else {
      echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Incorrect current password!');
                  </script>");
    }
  }
  ?>
  \
  <div class="collapse mt-3 mb-3 shadow-sm w-50 mx-auto" id="collapseExample">

    <div class="card card-body ">
      <form method="post">
        <div class="form-floating mb-3">

          <input class="form-control" name="cpass" type="text" placeholder="(123) 456-7890" id="phone" />
          <label for="phone">Current Password</label>
          <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
        </div>
        <div class="form-floating mb-3">
          <input class="form-control" name="npass" type="text" placeholder="(123) 456-7890" id="phone" />
          <label for="phone">New password</label>
          <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
        </div>
        <div class="form-floating mb-3">
          <input class="form-control" name="nrpass" type="text" placeholder="(123) 456-7890" id="phone" />
          <label for="phone">Re-enter new password</label>
          <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
        </div>
        <div class="d-grid">
          <input type="submit" name="update" class="btn btn-primary btn-lg w-25 mx-auto" value="UPDATE">
        </div>
      </form>
    </div>
  </div>


  </body>

  </html>
<?php
}
?>