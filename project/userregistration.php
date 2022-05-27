<?php
include "include/header.php";
$_SESSION['errorMessage'] = '';
?>
<?php
if (isset($_POST["register"])) {
    include "include/dbconnect.php";
    if ($_POST["name"]) {
        // code...
    }
    $r_name = $_POST["name"];
    $r_email = $_POST["email"];
    $r_phone = $_POST["phone"];
    $r_password = md5($_POST["password"]);


    $query = "SELECT phone FROM  tbl_user WHERE phone = '$r_phone' OR email = '$r_email'";
    $result1 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result1) > 0) {
        $_SESSION['errorMessage'] = 'Oops, seems like you are already registered! Please login.';
    } else {
        $sql = "INSERT INTO tbl_user (name,email,phone,password) VALUES ('$r_name' , '$r_email' , '$r_phone' , '$r_password' )";
        // echo $sql;
        #$sql1 = "INSERT INTO tbl_login (phone,password) VALUES ('$r_phone' , '$r_password' )";
        $res = mysqli_query($conn, $sql);
        // $res1 = mysqli_query($conn, $sql1);
        echo ("<script LANGUAGE='JavaScript'>
          window.alert('Registration successful, Redirecting to login page.');
          window.location.href='userlogin.php';
        </script>");
    }
}
?>
<script type="text/javascript">
    function valRegister() {
        var name = document.getElementById("name").value;
        var letters = /^[a-zA-Z\s]*$/;
        var pphone = document.getElementById("phone").value;
        var ph = /^(9|8|7|6)[0-9]{9}$/;
        var eemail = document.getElementById("email").value;
        var pat = /^[a-z.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (document.getElementById('name').value.length == 0 || document.getElementById('email').value.length == 0 || document.getElementById('phone').value.length == 0 || document.getElementById('password').value.length == 0 || document.getElementById('repassword').value.length == 0) {
            alert('Fill all the fields');
            return false;
        } else if (!name.match(letters)) {
            alert("Please enter name correctly without a number");
            return false;
        } else if (!eemail.match(pat)) {
            alert("Please enter valid email");
            return false;
        } else if (!pphone.match(ph)) {
            alert("enter valid phone number");
            return false;
        } else if (document.getElementById('password').value != document.getElementById('repassword').value) {
            alert('Password doesnt match');
            return false;
        } else {
            return true;
        }
    }
</script>
<div class="my-5">
    <div class="container my-5 px-5">
        <div class="text-center mb-5">
            <div class="bg-primary bg-gradient text-white rounded-3 mb-3" style="width: 4rem; height: 3rem; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-person-plus"></i></div>
            <h2 class="sectionhead">REGISTER</h2>
            <p class="sectionheaddescription">Join us and explore our services</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <form id="contactForm" method="post" onsubmit="return valRegister()">
                    <?php
                    if ($_SESSION['errorMessage'] != '') {
                        echo "<div style='color: red; padding-left: 10px; text-align: center;'>" . $_SESSION['errorMessage'] . "</div>";
                        $_SESSION['errorMessage'] = '';
                    }
                    ?>
                    <!-- Name input-->
                    <div class="form-floating mt-sm-3 mb-1">
                        <input class="form-control" name="name" id='name' type="text" placeholder="Enter your name..." onblur="validate()" required />
                        <label for="name">Name</label>
                        <span class="warBox"></span>
                    </div>
                    <div style="display:none; color: red; padding-left: 10px;">
                        * Name can only be alphabets!
                    </div>
                    <!-- Email input-->
                    <div class="form-floating mt-sm-3  mb-1 ">
                        <input class="form-control" name="email" id='email' type="text" placeholder="Enter your email..." onfocusout="validate9()" required />
                        <label for="name">Email</label>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mt-sm-3">
                        <input class="form-control" name="phone" id='phone' type="text" placeholder="(123) 456-7890" onblur="validate4()" required />
                        <label for="phone">Phone</label>
                    </div>
                    <!-- Password input-->
                    <div class="form-floating mt-sm-3 mb-1">
                        <input class="form-control" name="password" id='password' type="password" placeholder="Enter your password..." required />
                        <label for="name">Password</label>
                    </div>
                    <!-- Re-enter input-->
                    <div class="form-floating mt-sm-3">
                        <input class="form-control" name="repassword" id='repassword' type="password" placeholder="Re-enter your password..." onblur="checkPass()" required />
                        <label for="name">Re-enter password</label>
                    </div>
                    <!-- Submit Button-->
                    <div class="d-grid mt-sm-3">
                        <input type="submit" name="register" class="btn btn-primary btn-lg" value="REGISTER">
                    </div>
                    <div class="d-grid" style="padding-top: 20px; text-align: center;">
                        </a>
                        <p class="sectionheaddescription">Already registered? <a href="userlogin.php" style="text-decoration: none;">Login</a> here.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>