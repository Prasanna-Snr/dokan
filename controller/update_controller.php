<?php
session_start();
include "../database/dbcon.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $categories = $_POST['categories'];
    $description = $_POST['description'];
    $price = $_POST['price-input'];
    $offer = $_POST['offer'];
    $discount = $_POST['discount'];

    // File upload handling
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $upload_dir = "../uploads/"; 
        $new_image_path = $upload_dir . uniqid() . "_" . basename($image_name);

        if (move_uploaded_file($image_tmp_name, $new_image_path)) {
            $image_path = $new_image_path;
        }
    }

    $sql = "UPDATE tbl_product SET 
            name='$name', 
            category='$categories', 
            description='$description', 
            price='$price', 
            offer='$offer', 
            discount='$discount'";

    if ($image_path) {
        $sql .= ", image_path='$image_path'";
    }

    $sql .= " WHERE id='$product_id'";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['msg'] = "Product updated successfully.";
    } else {
        $_SESSION['msg'] = "Error updating product.";
    }
}

header("location: /dokan/view/product_list.php");
?>
