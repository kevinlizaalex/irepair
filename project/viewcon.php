
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
<center><H2>CONSUMERS</H2></center>


<div class="search-container">
    <form action="#" method="post">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

<HR>




<div class="container mb-4">
  
<table class="table table-bordered table-bordered">
                <thead class="thead-dark">
                    <tr>
                  
                    <th>Consumer Name</th>
                    <th>Consumer Number</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    
                    </tr>
                </thead>
                    <tbody>
                          <?php  
        
                          $result = mysqli_query($con,"SELECT * FROM `tbl_usereg` where `status`=1");
                          while($row = mysqli_fetch_array($result)){?> 
                          
                          <tr style="background-color: white">
                               
                               <td><?php echo $row["username"]; ?></td>  
                               <td><?php echo $row["consnumber"]; ?></td> 
                               <td><?php echo $row["email"]; ?></td> 
                               <td><?php echo $row["phone"]; ?></td> 
                              
                               
                          </tr>  
                          <?php  
                          }  
                          ?>  
                         </tbody>
                     </table>
                     </form>
                        
                         
                </div>  

 
        </div>
        </div>
      
    </div>
 
</body>
</center>                    
</html>



<?php
      }
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>