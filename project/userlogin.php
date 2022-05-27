<?php
include("include/header.php");
include("include/dbconnect.php");
if (isset($_SESSION["id"]) == session_id()) {

  echo ("<script LANGUAGE='JavaScript'>
        window.alert('You have already logined.');
        window.location.href='selectrepairtype.php';
      </script>");
} else {
?>


  <div class="my-5">
    <div class="container my-5 px-5">
      <div class="text-center mb-5">
        <div class="bg-primary bg-gradient text-white rounded-3 mb-3" style="width: 4rem; height: 3rem; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-person-plus"></i></div>
        <h2 class="">LOGIN</h2>
        <p class="sectionheaddescription">Hey, login to see the progress</p>
      </div>
      <div class="row gx-5 justify-content-center">
        <div class="col-lg-6">
          <form id="contactForm" method="post" onsubmit="return vallogin()">
            <!-- Phone number input-->
            <div class="form-floating mb-3">
              <input class="form-control" name="phone" type="text" placeholder="(123) 456-7890" id="phone" />
              <label for="phone">Phone</label>
              <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
            </div>
            <!-- Name input-->
            <div class="form-floating mb-3">
              <input class="form-control" name="password" type="password" placeholder="Enter your password..." id="password" />
              <label for="name">Password</label>
              <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
              <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                To activate this form, sign up at
                <br />
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
              </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage">
              <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <!-- Submit Button-->
            <div class="d-grid">
              <input type="submit" name="login" class="btn btn-primary btn-lg" value="LOGIN">
            </div>
            <div class="d-grid" style="padding-top: 20px; text-align: center;">
              </a>
              <p class="sectionheaddescription">New here? <a href="userregistration.php" style="text-decoration: none;">Register</a> with us.</p>
            </div>

            <?php
            if (isset($_POST['login'])) {

              $l_phone = $_POST['phone'];
              $l_password = md5($_POST["password"]);

              $query = "SELECT * FROM tbl_user WHERE phone = '$l_phone' AND password = '$l_password'";
              $result = mysqli_query($conn, $query);


              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $dp = $row['phone'];
                  $dps = $row['password'];
                  $ds = $row['status'];
                  // echo $ds;


                  $_SESSION["id"] = session_id();
                  $_SESSION["s_id"] = $row['id'];
                  $_SESSION["s_name"] = $row['name'];
                  $_SESSION["s_email"] = $row['email'];
                  $_SESSION["s_phone"] = $row['phone'];
                  $_SESSION["s_password"] = $row['password'];
                  $_SESSION["s_status"] = $row['status'];
                }
                if ($ds == '1') {
                  echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='adminmanage.php';
                  </script>");
                } else if ($ds == '2') {
                  echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='userdashboard.php';
                  </script>");
                } else if ($ds == '3') {
                  echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='adminrepairstatus.php';
                  </script>");
                } else if ($ds == '4') {
                  echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='inventoryspares.php';
                  </script>");
                } else if ($ds == '0') {
                  echo ("<script LANGUAGE='JavaScript'>
                  window.alert('Login restricted. Kindly contact administrator!');
                  window.location.href='adminrepairstatus.php';
                </script>");
                } else {
                  session_destroy();
                  echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Incorrect username/password');
                    window.location.href='userlogin.php';
                    </script>");
                }
              } else {
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Invalid login.');</script>");
              }
            }
            ?>

          </form>
        </div>
      </div>
    </div>
  </div>
  </body>

  </html>
  <script type="text/javascript">
    function vallogin() {
      if (document.getElementById("phone").value.length == 0 || document.getElementById("password").value.length == 0) {
        alert("Fill all fields!");
        return false;
      } else {
        return true;
      }
    }
  </script>
  <script>
    $("#phone").focus();
  </script>
<?php
}
?>