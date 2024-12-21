<?php
session_start();
include "../model/dbcon.php";
include "../model/admin_model.php";

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $obj = new AdminCrudImpl();
    $loginResult = $obj->loginAdmin($email, $password);

    if ($loginResult) {
        header("Location: ../view/admin_dashboard.php");
        exit();
    } else {
        $_SESSION['error_msg'] = "Email or password is incorrect";
        header("Location: ../view/login_admin.php");
        exit();
    }
}



if (isset($_POST['signup'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $obj = new AdminCrudImpl();
    $addAdmin = $obj->addAdmin($fullname,$username,$email,$password);
    if($addAdmin){
        header("location: ../view/login_admin.php");
    }else{
        header("location: ../view/signup_admin.php");
    }
        
    
}
?>

