<?php 
session_start();
include "../database/dbcon.php";
$id = $_GET['id'];
$sql = "DELETE FROM tbl_customer WHERE id=$id";
mysqli_query($conn, $sql);

$_SESSION['msg'] = "deleted successfully.";
header("Location: ../view/customer_list.php");
?>