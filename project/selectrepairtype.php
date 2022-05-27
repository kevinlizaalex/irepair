<?php
include("include/header.php");
include("include/dbconnect.php");
if (isset($_SESSION["id"]) != session_id()) {

	echo ("<script LANGUAGE='JavaScript'>
        window.alert('Please login to continue!');
        window.location.href='userlogin.php';
      </script>");
} else {
?>
	<style>
		@media all and (min-width: 992px) {

			.navbar .nav-item .dropdown-menu {
				display: none;
			}

			/* .navbar .nav-item:hover .nav-link {} */

			.navbar .nav-item:hover .dropdown-menu {
				display: block;
			}

			.navbar .nav-item .dropdown-menu {
				margin-top: 0;
			}
		}
	</style>

	<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Hover me </a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
					<li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
					<li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
				</ul>
			</li>
		</ul>
	</nav> -->

	<?php
	if (isset($_POST["repair"])) {
		include "include/dbconnect.php";

		$sid = $_SESSION["s_id"];
		$sname = $_SESSION["s_name"];
		$semail = $_SESSION["s_email"];
		$sphone = $_SESSION["s_phone"];

		$r_repairtype = $_POST["repairtype"];
		$r_brand = $_POST["brand"];
		$r_model = $_POST["model"];
		$r_imei = $_POST["imei"];
		$r_ad1 = $_POST["ad1"];
		$r_city = $_POST["city"];
		$r_state = $_POST["state"];
		$r_zip = $_POST["zip"];
		$r_country = $_POST["country"];
		$sql = "INSERT INTO tbl_repairdetails (username, userphone, useremail, repairtype, brand, model, imei, addressline1, city, state, zip, country, date) VALUES ('$sname', '$sphone', '$semail', '$r_repairtype', '$r_brand', '$r_model', '$r_imei', '$r_ad1', '$r_city', '$r_state', '$r_zip', '$r_country', now())";
		// echo $sql;
		$res = mysqli_query($conn, $sql);
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Pickup registered succesfully.');
		window.location.href='userdashboard.php';
		</script>");
	}
	?>
	<script type="text/javascript">
		function valRegister() {
			if (document.getElementById('repairtype').value.length == 0 || document.getElementById('brand').value.length == 0 || document.getElementById('model').value.length == 0 || document.getElementById('imei').value.length == 0 || document.getElementById('price').value.length == 0 || document.getElementById('pickup').value.length == 0) {
				alert('Fill all the fields');
				return false;
			} else if (document.getElementById('imei').value.length > 15 || document.getElementById('imei').value.length < 15 || isNaN(document.getElementById('imei').value)) {
				alert("IMEI number should be a number of length 15!");
				return false
			} else {
				return true;
			}
		}
	</script>

	<div class="my-5">
		<div class="container my-5 px-5">
			<div class="text-center mb-5">
				<div class="bg-primary bg-gradient text-white rounded-3 mb-3" style="width: 4rem; height: 3rem; display: inline-flex; align-items: center; justify-content: center;"><i class="bi bi-gear"></i>
				</div>
				<h2 class="">REPAIR REQUEST</h2>
				<p class="sectionheaddescription">Please mention more about your device and service required</p>
			</div>
			<div class="row gx-5 justify-content-center">
				<div class="col-lg-6">
					<form id="contactForm" method="post" onsubmit="return valRegister()">

						<h5 class="text-center mb-4 mt-3">Repair Category</h5>

						<div class="form-group mb-3">
							<label class="mb-1" for="exampleFormControlInput1">Repair type</label>
							<select class="form-select" aria-label="Default select example" name="repairtype" id="repairtype" required />
							<option selected>Choose the type of repair</option>
							<option value="Display">Display</option>
							<option value="Battery">Battery</option>
							<option value="Board">Board</option>
							</select>
						</div>

						<h5 class=" text-center mb-4 mt-5">Mobile details</h5>

						<div class="form-group mb-3">
							<label class="mb-1" for="exampleFormControlInput1">Brand</label>
							<select class="form-select" aria-label="Default select example" name="brand" id="brand" onchange="selectmodel(this.id,'model')">
								<option selected>Choose your mobile brand</option>
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

						<div class="form-group mb-3">
							<label class="mb-1" for="exampleFormControlInput1">Model</label>
							<select class="form-select" aria-label="Default select example" name="model" id="model">
								<option selected>Choose your mobile model</option>
								<!-- <option value="iPhone 13 Pro">iPhone 13 Pro</option>
								<option value="Pixel 6">Pixel 6</option>
								<option value="Samsung S21">Samsung S21</option> -->
							</select>
						</div>

						<div class="form-group mb-3">
							<div class="form-group mb-4">
								<label for="usr" class="mb-1">IMEI</label>
								<input type="number" class="form-control" id="imei" name="imei" />
							</div>
						</div>

						<!-- <div class="d-grid text-center">
							<input type="button" name="checkimei" class="btn btn-primary w-25 btn-sm" id="checkimei" value="CHECK">
						</div> -->

						<?php
						if (array_key_exists('checkimei', $_POST)) {
							$r_imei = $_POST["imei"];
							$sql2 = "SELECT * FROM tbl_user WHERE  imei ='$r_imei'";
							$result = mysqli_query($conn, $sql2);
							if (mysqli_num_rows($result) > 0) {
								echo ("<script LANGUAGE='JavaScript'>
                    					window.alert('A repair already exist for this phone. Can not continue with request.');
                    					
                  						</script>");
							} else {
								echo ("<script LANGUAGE='JavaScript'>
                    					window.alert('Incorrect current password!');
                    					window.location.href='userpage.php';
                  						</script>");
							}
						}

						?>


						<h5 class="text-center mb-4 mt-5">Pickup details</h5>



						<div class="form-group mb-4" id="mm">
							<div class="form-group mb-4">
								<label for="usr" class="mb-1">Address Line 1</label>
								<input type="text" class="form-control" id="ad1" name="ad1">
							</div>
							<div class="form-group mb-4">
								<label for="usr" class="mb-1">City / Town</label>
								<input type="text" class="form-control" id="city" name="city">
							</div>
							<div class="form-group mb-4">
								<label for="usr" class="mb-1">State / Province / Region</label>
								<input type="text" class="form-control" id="state" name="state">
							</div>
							<div class="form-group mb-4">
								<label for="usr" class="mb-1">Zip / Postal Code</label>
								<input type="number" class="form-control" id="zip" name="zip">
							</div>
							<div class="form-group mb-4">
								<label for="usr" class="mb-1">Country</label>
								<input type="text" class="form-control" id="country" name="country">
							</div>

						</div>

						<div class="form-group mb-4" id="nn" style="display:none">
							<div class="form-group mb-4">
								<label for="usr" class="mb-1">Drop date</label>
								<input type="date" name="bod" id="cmbQua" min="<?php date_default_timezone_set('Asia/Kolkata');
																				$rrdate = date('dd-mm-yy');
																				echo $rrdate; ?>" max="2022-01-01" />
							</div>

						</div>

						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
						<script>
							function selectmodel(s1, s2) {
								var s1 = document.getElementById(s1);
								var s2 = document.getElementById(s2);
								s2.innerHTML = "";
								if (s1.value == "Apple") {
									var optionArray = ['iPhone 13 Pro Max|iPhone 13 Pro Max', 'iPhone 13 Pro|iPhone 13 Pro', 'iPhone 13|iPhone 13'];
									for (var option in optionArray) {
										var pair = optionArray[option].split("|");
										var newoption = document.createElement("option");
										newoption.value = pair[0];
										newoption.innerHTML = pair[1];
										s2.options.add(newoption);
									}
								} else if (s1.value == "Pixel") {
									var optionArray = ['Pixel 6 Pro|Pixel 6 Pro', 'Pixel 6|Pixel 6'];
									for (var option in optionArray) {
										var pair = optionArray[option].split("|");
										var newoption = document.createElement("option");
										newoption.value = pair[0];
										newoption.innerHTML = pair[1];
										s2.options.add(newoption);
									}
								} else if (s1.value == "Samsung") {
									var optionArray = ['Samsung S20 Ultra|Samsung S20 Ultra', 'Samsung S20+|Samsung S20+', 'Samsung S20|Samsung S20'];
									for (var option in optionArray) {
										var pair = optionArray[option].split("|");
										var newoption = document.createElement("option");
										newoption.value = pair[0];
										newoption.innerHTML = pair[1];
										s2.options.add(newoption);
									}
								}

							}

							function calPrice() {
								if (document.getElementById("repairtype").value == "Display" && document.getElementById("brand").value == "Apple") {
									document.getElementById("price").value = "9000";
								}
								if (document.getElementById("repairtype").value == "Display" && document.getElementById("brand").value == "Pixel") {
									document.getElementById("price").value = "8000";
								}
								if (document.getElementById("repairtype").value == "Display" && document.getElementById("brand").value == "Samsung") {
									document.getElementById("price").value = "7000";
								}
								if (document.getElementById("repairtype").value == "Display" && document.getElementById("brand").value == "Xiaomi") {
									document.getElementById("price").value = "7500";
								}
								if (document.getElementById("repairtype").value == "Display" && document.getElementById("brand").value == "Realme") {
									document.getElementById("price").value = "6000";
								}
								if (document.getElementById("repairtype").value == "Display" && document.getElementById("brand").value == "Vivo") {
									document.getElementById("price").value = "6500";
								}
								if (document.getElementById("repairtype").value == "Display" && document.getElementById("brand").value == "Oppo") {
									document.getElementById("price").value = "6500";
								}
								if (document.getElementById("repairtype").value == "Display" && document.getElementById("brand").value == "Honor") {
									document.getElementById("price").value = "5500";
								}
								if (document.getElementById("repairtype").value == "Battery" && document.getElementById("brand").value == "Apple") {
									document.getElementById("price").value = "9000";
								}
								if (document.getElementById("repairtype").value == "Battery" && document.getElementById("brand").value == "Pixel") {
									document.getElementById("price").value = "8000";
								}
								if (document.getElementById("repairtype").value == "Battery" && document.getElementById("brand").value == "Samsung") {
									document.getElementById("price").value = "7000";
								}
								if (document.getElementById("repairtype").value == "Battery" && document.getElementById("brand").value == "Xiaomi") {
									document.getElementById("price").value = "7500";
								}
								if (document.getElementById("repairtype").value == "Battery" && document.getElementById("brand").value == "Realme") {
									document.getElementById("price").value = "6000";
								}
								if (document.getElementById("repairtype").value == "Battery" && document.getElementById("brand").value == "Vivo") {
									document.getElementById("price").value = "6500";
								}
								if (document.getElementById("repairtype").value == "Battery" && document.getElementById("brand").value == "Oppo") {
									document.getElementById("price").value = "6500";
								}
								if (document.getElementById("repairtype").value == "Battery" && document.getElementById("brand").value == "Honor") {
									document.getElementById("price").value = "5500";
								}
								if (document.getElementById("repairtype").value == "Board" && document.getElementById("brand").value == "Apple") {
									document.getElementById("price").value = "5500";
								}
								if (document.getElementById("repairtype").value == "Board" && document.getElementById("brand").value == "Pixel") {
									document.getElementById("price").value = "5500";
								}
								if (document.getElementById("repairtype").value == "Board" && document.getElementById("brand").value == "Samsung") {
									document.getElementById("price").value = "5500";
								}
								if (document.getElementById("repairtype").value == "Board" && document.getElementById("brand").value == "Xiaomi") {
									document.getElementById("price").value = "5500";
								}
								if (document.getElementById("repairtype").value == "Board" && document.getElementById("brand").value == "Realme") {
									document.getElementById("price").value = "5500";
								}
								if (document.getElementById("repairtype").value == "Board" && document.getElementById("brand").value == "Vivo") {
									document.getElementById("price").value = "5500";
								}
								if (document.getElementById("repairtype").value == "Board" && document.getElementById("brand").value == "Oppo") {
									document.getElementById("price").value = "5500";
								}
								if (document.getElementById("repairtype").value == "Board" && document.getElementById("brand").value == "Honor") {
									document.getElementById("price").value = "5500";

								}
								// $aa = document.getElementById("brand").value;
								// alert($aa);
							}
						</script>

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
							<input type="submit" name="repair" class="btn btn-primary btn-lg" value="REPAIR">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	</body>

	</html>
	<script>
		$("#repairtype").focus();
	</script>
<?php
}
?>