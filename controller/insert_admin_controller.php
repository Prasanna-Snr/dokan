<?php
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
        $hash_psw = sha1($password);
        $sql = "INSERT INTO tbl_admin (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$hash_psw')";

        include_once "../database/dbcon.php";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['msg'] = "Admin registered successfully!";
        } else {
            $_SESSION['msg'] = "Oops! Data could not be inserted.";
        }
    }
}


header("location: ../view/login.php");
?>
