<?php session_start();
if(isset($_POST['submit'])) {
    //print_r($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    //echo $uname; //testing data
    $hashPwd = sha1($password);

    //Get data from DB to compare with form_data to check existance of user
    include "../database/dbcon.php";
    $sql = "SELECT id, email, password FROM tbl_admin WHERE email='$email'";
    $res = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($res)) {
        if($email == $row['email'] && $hashPwd == $row['password']) {
            $_SESSION['user_login'] = $row['id'];
            header("location: ../view/admin_dashboard.php");
        } else {
            //$_SESSION['user_login'] = '';
            // session_destroy();
            header("location: ../view/login.php");
        }
    }
} else {
    
}