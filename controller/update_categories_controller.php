<?php
session_start();
include "../database/dbcon.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $c_name = $_POST['c_name'];
    
    $sql = "UPDATE tbl_categories SET c_name='$c_name' WHERE id = $id";
    $res = mysqli_query($conn, $sql);
}

header("location: ../view/categories_list.php");
?>
