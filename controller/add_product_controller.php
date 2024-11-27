<?php
session_start();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['categories'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $offer = $_POST['offer'] ?? 0;
    $discount = $_POST['discount'] ?? 0;

 
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $image_name = $_FILES['image']['name'];

        if ($file['error'] == 0) {
            if ($file['size'] < 3000000) { 
                $file_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                $file_ext = in_array($file['type'], $file_types);
                if ($file_ext) {
                    $target_dir = './uploads/';
                    $filename = uniqid('prod_'); 
                    $file_path = $target_dir . $filename . '.' . pathinfo($image_name, PATHINFO_EXTENSION);

                   
                    if (!file_exists($target_dir)) {
                        mkdir($target_dir, 0777, true);
                    }

                    
                    if (move_uploaded_file($file['tmp_name'], $file_path)) {
                        $confirmation_msg = "File uploaded successfully.";
                    } else {
                        $confirmation_msg = "File upload failed.";
                    }
                } else {
                    $confirmation_msg = "This file type is not supported.";
                }
            } else {
                $confirmation_msg = "File size must be less than 3MB.";
            }
        } else {
            $confirmation_msg = 'Please choose your image to upload.';
        }
    }

    // Validate required fields
    if (empty($name) || empty($category) || empty($description) || empty($price)) {
        $_SESSION['msg'] = "Please fill in all required fields.";
    } else {
        
        $hashPwd = sha1($price);

        
        include_once "database/dbcon.php"; 

        $sql = "INSERT INTO tbl_product (name, category, image_path, description, price, offer, discount) 
                VALUES ('$name', '$category', '$file_path', '$description', '$price', '$offer', '$discount')";

        $res = mysqli_query($conn, $sql);

        
        if ($res) {
            $_SESSION['msg'] = "Product added successfully!";
        } else {
            $_SESSION['msg'] = "Oops! There was an error adding the product.";
        }
    }
}

header("location: ./admin_product_manage.php");
exit();
?>
