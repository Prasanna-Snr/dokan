<?php
session_start();
include "../model/dbcon.php";
include "../model/customer_model.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $obj = new CustomerCrudImpl();
    $deleteCustomerResult = $obj->deleteCustomerById($id);

    if ($deleteCustomerResult) {
        header("Location: ../view/customer_list.php");
    }
}
?>
