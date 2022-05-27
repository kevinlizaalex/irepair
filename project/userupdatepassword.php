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

                <a href="#" class="btn btn-primary" style="width: 100%;">Update password</a>
            </div>
        </div>
    </div>


    </body>

    </html>
<?php
}
?>