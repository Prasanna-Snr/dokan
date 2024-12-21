<?php 
session_start();
include "../model/dbcon.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   <!-- navbar -->
   <div class="nav-container">
    <div class="logo-img">
        <img src="/dokan/images/logo.png" alt="" width="150px">
    </div>
    
    <!-- <div class="user-name-img">
        <div class="user-img-container">
            <img src="/dokan/images/profile_user.jpg" alt="">
        </div> -->
        
        <?php
        if(isset($_SESSION['admin_login'])){
            $adminId = $_SESSION['admin_login'];
                $query = "SELECT username FROM tbl_admin WHERE id = $adminId";
                $result = mysqli_query($conn, $query);
                $adminName = ""; 
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        $adminName = $row['username'];
                    }
                }
                echo "<div id='admin-name'>Welcome: $adminName</div>";
        }
        ?>
    </div>
</div>   