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

  </body>

  </html>
<?php
}
?>