<?php
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve POST data
    $name = $_POST['name'];
    $category = $_POST['categories'];
    $description = $_POST['description'];
    $price = $_POST['pric'];
    $offer = $_POST['offer'] ?? 0;
    $discount = $_POST['discount'] ?? 0;

    // Check for required fields
    if (empty($name) || empty($category) || empty($description) || empty($price)) {
        $_SESSION['msg'] = "Please fill in all required fields.";
        header("Location: ../view/add_new_product.php"); // Redirect back to the form
        exit();
    }

    // Handle file upload (image)
    $file_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $file = $_FILES['image'];
        $image_name = $file['name'];

        if ($file['size'] < 3000000) { // File size check (max 3MB)
            $allowed_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
            if (in_array($file['type'], $allowed_types)) {
                $target_dir = '../uploads/';
                $filename = uniqid('prod_'); // Unique filename
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

    // Database insertion
    include_once "../database/dbcon.php"; 

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO tbl_product (name, category, image_path, description, price, offer, discount) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssdis", $name, $category, $file_path, $description, $price, $offer, $discount);

    if ($stmt->execute()) {
        $_SESSION['msg'] = "Product added successfully!";
    } else {
        $_SESSION['msg'] = "Oops! There was an error adding the product.";
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the manage product page
    header("Location: ../view/product_list.php");
    exit();
}
?>
