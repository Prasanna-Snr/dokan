<?php
session_start();

include "../model/dbcon.php";
include "../model/order_model.php";
if(isset($_POST['submit'])){
    $deliveryInfo = [
        'fullname' => $_POST['fullname'],
        'phone' => $_POST['phone'],
        'house' => $_POST['house'],
        'region' => $_POST['region'],
        'city' => $_POST['city'],
        'street' => $_POST['street']
    ];
    $_SESSION['deliveryInfo'] = $deliveryInfo;
 
    header("Location: ../view/payment.php");

}


if(isset($_POST['make-order'])){
    $pm = $_POST['p-method'];
    
    // delivery info
    $deliveryInfo = $_SESSION['deliveryInfo'];

    $fullname = $deliveryInfo['fullname'];
    $phone = $deliveryInfo['phone'];
    $house = $deliveryInfo['house'];
    $region = $deliveryInfo['region'];
    $city = $deliveryInfo['city'];
    $street = $deliveryInfo['street'];

    // cart info
    foreach ($_SESSION['cart'] as $item) {
        $productName = $item['product_name'];
        $image = $item['image'];
        $price = $item['price'];
        $quantity = $item['quantity'];

        $obj = new OrderCrudImpl();
        $makeOrderResult = $obj->makeOrder($productName, $quantity, $pm, $fullname, $phone, $house, $region, $city, $street);
    }

    unset($_SESSION['cart']);
    unset($_SESSION['deliveryInfo']);
    unset($_SESSION['pm']);

    header("Location: ../view/home.php");
}

?>