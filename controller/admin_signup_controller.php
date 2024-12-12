<?php
include "../model/dbcon.php";
include "../model/admin_model.php";

session_start();
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm'];

    if ($password != $confirm_password) {
        $_SESSION['msg'] = "Password does not match!";
    } else {
        $obj = new AdminCrudImpl($fullname,$username,$email,$password);
        $obj->addAdmin($fullname,$username,$email,$password);
        
        header("location: ../view/login.php");
    }
}
?>