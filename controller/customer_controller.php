<?php
session_start();
include "../model/dbcon.php";
include "../model/customer_model.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $obj = new CustomerCrudImpl();
    $deleteCustomerResult = $obj->deleteCustomerById($id);

    if ($deleteCustomerResult) {
        header("Location: ../view/customer_list.php");
    }
}


if (isset($_POST['sign-up'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $obj = new CustomerCrudImpl();
    $add = $obj->addCustomer($fullname,$username,$email,$password);
    if($add){
        header("location: ../view/login.php");
    }else{
        header("location: ../view/signup.php");
    }
}


if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $obj = new CustomerCrudImpl();
    $loginResult = $obj->loginCustomer($email,$password);

    if ($loginResult) {
        header("Location: ../view/home.php");
        exit();
    } else {
        $_SESSION['error_msg'] = "Email or password is incorrect";
        header("Location: ../view/login.php");
        exit();
    }
}
?>
