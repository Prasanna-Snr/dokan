<?php
session_start();

include "../model/dbcon.php";
include "../model/product_model.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['categories'];
    $description = $_POST['description'];
    $price = $_POST['price-input'];
    $offer = $_POST['offer'] ?? 0;
    $discount = $_POST['discount'] ?? 0;
    $quantity = $_POST['quantity'];

    // Handle file upload (image)
    $file_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $file = $_FILES['image'];
        $image_name = $file['name'];

        if ($file['size'] < 3000000) {
            $allowed_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
            if (in_array($file['type'], $allowed_types)) {
                $target_dir = '../uploads/';
                $filename = uniqid('prod_'); 
                $file_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                $file_path = $target_dir . $filename . '.' . $file_extension;

                // Ensure the uploads folder exists
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                // Move the uploaded file
                if (!move_uploaded_file($file['tmp_name'], $file_path)) {
                    $_SESSION['msg'] = "File upload failed.";
                    header("Location: ../view/add_new_product.php");
                    exit();
                }
            } else {
                $_SESSION['msg'] = "This file type is not supported.";
                header("Location: ../view/add_new_product.php");
                exit();
            }
        } else {
            $_SESSION['msg'] = "File size must be less than 3MB.";
            header("Location: ../view/add_new_product.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "Please choose your image to upload.";
        header("Location: ../view/add_new_product.php");
        exit();
    }

    $obj=new ProductCrudImpl();
    $addProductResult = $obj->addProduct($name,$category,$file_path,$description,$price,$offer,$discount,$quantity);
    if($addProductResult){
        header("Location: ../view/product_list.php");
    }

}



if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['categories'];
    $description = $_POST['description'];
    $price = $_POST['price-input'];
    $offer = $_POST['offer'] ?? 0;
    $discount = $_POST['discount'] ?? 0;
    $quantity = $_POST['quantity'];

    // Handle file upload (optional image update)
    $file_path = $_POST['current_image']; 
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $file = $_FILES['image'];
        $image_name = $file['name'];

        if ($file['size'] < 3000000) {
            $allowed_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
            if (in_array($file['type'], $allowed_types)) {
                $target_dir = '../uploads/';
                $filename = uniqid('prod_');
                $file_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                $file_path = $target_dir . $filename . '.' . $file_extension;

                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                if (!move_uploaded_file($file['tmp_name'], $file_path)) {
                    $_SESSION['msg'] = "File upload failed.";
                    header("Location: ../view/edit_product.php?id=$id");
                    exit();
                }
            } else {
                $_SESSION['msg'] = "This file type is not supported.";
                header("Location: ../view/edit_product.php?id=$id");
                exit();
            }
        } else {
            $_SESSION['msg'] = "File size must be less than 3MB.";
            header("Location: ../view/edit_product.php?id=$id");
            exit();
        }
    }

    $obj = new ProductCrudImpl();
    $updateResult = $obj->updateProduct($id, $name, $category, $file_path, $description, $price, $offer, $discount,$quantity);
    if ($updateResult) {
        header("Location: ../view/product_list.php");
    } else {
        $_SESSION['msg'] = "Failed to update product.";
        header("Location: ../view/edit_product.php?id=$id");
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $obj = new ProductCrudImpl();
    $deleteProductResult = $obj->deleteProduct($id);

    if ($deleteProductResult) {
        header("Location: ../view/product_list.php");
    } 
}


?>