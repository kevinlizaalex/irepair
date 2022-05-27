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
<?php
    if (isset($_POST["register"])) {
        include "include/dbconnect.php";

        $r_roletype = $_POST["roletype"];
        $r_brand = $_POST["brand"];
        $r_model = $_POST["model"];
        $r_price = $_POST["price"];
        $r_quantity = $_POST["quantity"];



        $sql = "INSERT INTO tbl_spares (category,brand,model,price,quantity) VALUES ('$r_roletype' , '$r_brand' , '$r_model' , '$r_price', '$r_quantity' )";
        // echo $sql;
        #$sql1 = "INSERT INTO tbl_login (phone,password) VALUES ('$r_phone' , '$r_password' )";
        $res = mysqli_query($conn, $sql);
        // $res1 = mysqli_query($conn, $sql1);
        echo ("<script LANGUAGE='JavaScript'>
              window.alert('Spare part added successfully.');
              window.location.href='inventoryspares.php';
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
            <h2 class="sectionhead">ADD NEW SPARE PARTS</h2>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <form id="contactForm" method="post" onsubmit="return valRegister()">

                    <!-- Name input-->
                    <div class="form-group mb-3">
                        <!-- <label class="mb-1" for="exampleFormControlInput1">Repair type</label> -->
                        <select class="form-select" aria-label="Default select example" name="roletype" id="roletype" required />
                        <option selected>Category</option>
                        <option value="Display">Display</option>
                        <option value="Battery">Battery</option>
                        <option value="Board">Board</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <!-- <label class="mb-1" for="exampleFormControlInput1">Repair type</label> -->
                        <select class="form-select" aria-label="Default select example" name="brand" id="brand" required />
                        <option selected>Brand</option>
                        <option value="Apple">Apple</option>
                        <option value="Pixel">Pixel</option>
                        <option value="Samsung">Samsung</option>
                        <option value="Xiaomi">Xiaomi</option>
                        <option value="Realme">Realme</option>
                        <option value="Vivo">Vivo</option>
                        <option value="Oppo">Oppo</option>
                        <option value="Honor">Honor</option>
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" name="model" id="model" type="text" placeholder=" " onblur="validate4()" required />
                        <label for="phone">Model</label>
                    </div>

                    <div class="form-floating">
                        <input class="form-control" name="price" id='price' type="text" placeholder="(123) 456-7890" onblur="validate4()" required />
                        <label for="phone">Price</label>
                    </div>

                    <div class="form-floating mt-sm-3 mb-1">
                        <input class="form-control" name="quantity" id='quantity' type="number" placeholder="Enter your password..." required />
                        <label for="name">Quantity</label>
                    </div>

                    <div class="d-grid mt-sm-3">
                        <input type="submit" name="register" class="btn btn-primary btn-lg" value="ADD">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>