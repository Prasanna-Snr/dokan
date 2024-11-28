<?php 
session_start();
include "../database/dbcon.php";
$id = $_GET['id'];
$sql = "DELETE FROM tbl_product WHERE product_id=$id";
mysqli_query($conn, $sql);

$_SESSION['msg'] = "deleted successfully.";
header("Location: ../view/product_list.php");
?>