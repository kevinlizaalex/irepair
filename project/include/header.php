<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iRepair - The total repair solution</title>
    <!--     <link href="css/styles.css" rel="stylesheet"/>
    <link href="css/customcss.css" rel="stylesheet"/> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="icon" href="assets/siteicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow static-top navmine">
        <div class="container">
            <a class="navbar-brand" href="index.php">iRepair</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li>
                        <?php
                        if (isset($_SESSION["id"]) == session_id()) {
                            $nam = $_SESSION["s_name"];
                            $status = $_SESSION["s_status"];

                            if ($_SESSION["s_status"] == 1) {
                                echo "<li class='nav-item active'><a class='nav-link' href='adminpage.php'>Account</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='adminshowusers.php'>Users</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='adminmanage.php'>Manage</a></li>";

                                echo "<div class='d-flex'>";
                                echo "<div class='dropdown mr-1'>";
                                echo "<div type='button' class='btn dropdown-toggle' id='dropdownMenuOffset' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-offset='10,20'>";
                                echo "$nam";
                                echo "</div>";
                                echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuOffset'>";
                                //echo "<a class=dropdown-item href=adminrepairapproval.php>Repair quotations</a>";
                                echo "<a class=dropdown-item href=logout.php>Logout</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            } else if ($_SESSION["s_status"] == 2) {
                                echo "<li class='nav-item active'><a class='nav-link' href='selectrepairtype.php'>Request</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='userpage.php'>Account</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='userdashboard.php'>Dashboard</a></li>";
                                echo "<div class='d-flex'>";
                                echo "<div class='dropdown mr-1'>";
                                echo "<div type='button' class='btn dropdown-toggle' id='dropdownMenuOffset' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-offset='10,20'>";
                                echo "$nam";
                                echo "</div>";
                                echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuOffset'>";
                                echo "<a class=dropdown-item href=logout.php>Logout</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            } else if ($_SESSION["s_status"] == 3) {
                                echo "<li class='nav-item active'><a class='nav-link' href='adminpage.php'>Account</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='adminshowusers.php'>Users</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='adminshowhistory.php'>History</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='technicianallocation.php'>My Jobs</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='adminrepairstatus.php'>Manage</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='adminspares.php'>Spare parts</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='inventorystocks.php'>Stocks</a></li>";
                                echo "<div class='d-flex'>";
                                echo "<div class='dropdown mr-1'>";
                                echo "<div type='button' class='btn dropdown-toggle' id='dropdownMenuOffset' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-offset='10,20'>";
                                echo "$nam";
                                echo "</div>";
                                echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuOffset'>";
                                //echo "<a class=dropdown-item href=adminrepairapproval.php>Repair quotations</a>";
                                echo "<a class=dropdown-item href=logout.php>Logout</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            } else {
                                echo "<li class='nav-item active'><a class='nav-link' href='adminpage.php'>Account</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='inventorymanage.php'>Manage</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='inventoryspares.php'>Spares</a></li>";
                                echo "<li class='nav-item active'><a class='nav-link' href='inventorystocks.php'>Stocks</a></li>";
                                echo "<div class='d-flex'>";
                                echo "<div class='dropdown mr-1'>";
                                echo "<div type='button' class='btn dropdown-toggle' id='dropdownMenuOffset' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-offset='10,20'>";
                                echo "$nam";
                                echo "</div>";
                                echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuOffset'>";
                                //echo "<a class=dropdown-item href=adminrepairapproval.php>Repair quotations</a>";
                                echo "<a class=dropdown-item href=logout.php>Logout</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>
                        <!-- <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>