<?php
session_start();
if (isset($_POST['submit'])) {
    $c_name = $_POST['c_name'];

    $sql = "INSERT INTO tbl_categories (c_name) VALUES ('$c_name')";
    include "../database/dbcon.php";
    $result = mysqli_query($conn, $sql);
  
    header("Location: ../view/categories_list.php");
}
?>
