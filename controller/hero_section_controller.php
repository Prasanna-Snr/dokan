<?php
session_start();

include "../model/dbcon.php";
include "../model/hero_model.php";
if (isset($_POST['submit'])) {
    $main_title = $_POST['m_title'];
    $description = $_POST['description'];
   

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
                    header("Location: ../view/add_hero_section.php");
                    exit();
                }
            } else {
                $_SESSION['msg'] = "This file type is not supported.";
                header("Location: ../view/add_hero_section.php");
                exit();
            }
        } else {
            $_SESSION['msg'] = "File size must be less than 3MB.";
            header("Location: ../view/add_hero_section.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "Please choose your image to upload.";
        header("Location: ../view/add_hero_section.php");
        exit();
    }

    $obj=new HeroSectionCrudImpl();
    $addHeroResult = $obj->addHeroSection($main_title,$description,$file_path);
    if($addHeroResult){
        header("Location: ../view/hero_section.php");
    }

}



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $obj = new HeroSectionCrudImpl();
    $deleteResult = $obj->deleteHeroSection($id);

    if ($deleteResult) {
        header("Location: ../view/hero_section.php");
    } 
}



if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $main_title = $_POST['m_title'];
    $description = $_POST['description'];
  
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

    $obj = new HeroSectionCrudImpl();
    $updateResult = $obj->updateHeroSection($id,$main_title,$description,$file_path);
    if ($updateResult) {
        header("Location: ../view/hero_section.php");
    } else {
        header("Location: ../view/edit_hero_section.php?id=$id");
    }
}
?>