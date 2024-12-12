<?php
include "../model/dbcon.php";
include "../model/admin_model.php";

session_start();

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $obj = new AdminCrudImpl($fullname, $username, $email, $password);
    $loginResult = $obj->loginAdmin($email, $password);

    if ($loginResult) {
        header("Location: ../view/admin_dashboard.php");
        exit();
    } else {
        header("Location: ../view/login.php");
        exit();
    }
}
?>
