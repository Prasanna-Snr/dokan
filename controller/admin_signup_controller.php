<?php
include "../model/dbcon.php";
include "../model/admin_model.php";

session_start();
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $obj = new AdminCrudImpl();
    $addAdmin = $obj->addAdmin($fullname,$username,$email,$password);
    if($addAdmin){
        header("location: ../view/login.php");
    }else{
        header("location: ../view/signup.php");
    }
        
    
}
?>