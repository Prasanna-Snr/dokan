<?php
include "../view/customer_navbar.php";
include "../model/dbcon.php"; 

if (!isset($_SESSION['user_login'])) {
    header("Location: login.php");
}

$customerId = (int)$_SESSION['user_login']; 
$query = "SELECT tbl_order.product_name, tbl_order.id, tbl_product.image_path 
          FROM tbl_order 
          JOIN tbl_product ON tbl_order.product_id = tbl_product.id 
          WHERE tbl_order.customer_id = $customerId";

$result = mysqli_query($conn, $query);
?>
<!-- items list container -->
<div class="c-body-container">
    <div class="c-categories-section">
        <div class="customer-list">
            <p id="heading-category">Dashboard</p>
            <hr class="custom-line">
            <ul>
                <li><a href="#">Your Order</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Order Status</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Setting</a></li>
                <li><a href="../view/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- order list -->
    <div class="c-image-section">
    <p id="first-product">The Items You Ordered</p>
    <div class="c-item-container">
        <?php 
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div>
                    <div class="c-img-container">
                        <img src="<?=$row['image_path']?>" alt="Product Image"> 
                    </div>
                    <span id="order-status">Order Item</span>
                </div>
            <?php 
            }
        } else { ?>
            <p>No orders found.</p>
        <?php } ?>
    </div>
</div>

</div>
</body>
</html>
