

<?php
include("includes/overheader.php");
include("Database/connection.php");
if(isset($_SESSION["id"])!=session_id())
{
  		echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login first');
        window.location.href='emplogin.php';
      	</script>");
  	}
	else
  	{
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  
<style>
body{

    background-color:#ADD8E6;

}


.search-container{
height:50px;
use float:right;
text-align: right;
}




</style>

<body>
    <br><br><br><br>
</body>

<?php

include("Database/connection.php");

if(isset($_POST['submit']))
		{
			$q=mysqli_query($con,"SELECT * from tbl_usereg where `consnumber` like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
                echo " <div class='row justify-content-md-center'>";
                echo"<div class='col col-lg-2'>";
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				
				echo "<th>"; echo "Name";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				echo "<th>"; echo "Consumer Number";  echo "</th>";
				echo "<th>"; echo "Phone";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr style='background-color: white'>";
				
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['consnumber']; echo "</td>";
				echo "<td>"; echo $row['phone']; echo "</td>";
				

				echo "</tr>";
			}
		echo "</table>";
			}
        }	

        ?>


<?php
      }
?>