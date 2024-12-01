<?php
include "../database/dbcon.php"; 
session_start();
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashPwd = sha1($password);

    $sql = "SELECT id, email, password FROM tbl_admin WHERE email='$email'";
    $res = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($res)) {
        if($email == $row['email'] && $hashPwd == $row['password']) {
            $_SESSION['user_login'] = $row['id'];
            header("location: ../view/admin_dashboard.php");
        } else {
            header("location: ../view/login.php");
        }
    }
}