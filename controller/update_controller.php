<?php session_start();
include "../database/dbcon.php"; 
if(isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $categories = $_POST['categories'];
    $description  = $_POST['categories'];
    $price = $_POST['image_path'];
    $offer = $_POST['offer'];
    $discount = $_POST['discount'];
   
    
    
    $sql = "UPDATE tbl_product SET name='$name', categories='$categories', description='$description', price='$price',offer='$offer',discount='$discount' WHERE product_id=$procut_id";
    $res = mysqli_query($conn, $sql);
    if($res) $_SESSION['msg'] = "Data updated successfully.";
    else $_SESSION['msg'] = "Oops! Data updation failed.";
}
header("location: view/product_list.php");