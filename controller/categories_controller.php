<?php
session_start();
include "../model/dbcon.php";
include "../model/categories_model.php";
if (isset($_POST['submit'])) {
    $c_name = $_POST['c_name'];

    $obj = new categoryCrudImpl($c_name);
    $addCategoryResult = $obj->addCategories($c_name);
    
    if($addCategoryResult){
        header("Location: ../view/categories_list.php");
    }else{
        header("Location: ../view/add_new_categories.php");
    }

}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $obj = new categoryCrudImpl();
    $deleteCategoryResult = $obj->deleteCategories($id);

    if ($deleteCategoryResult) {
        header("Location: ../view/categories_list.php");
    } 
}
?>
