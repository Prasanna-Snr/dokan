<?php
include "admin_navbar.php";
include "../model/admin_model.php";

if (!isset($_SESSION['admin_login'])) {
    header("Location: login_admin.php");
}



$obj = new AdminCrudImpl();
$total_customer = $obj->getTotalCustomers();
$total = $obj->getTotalProducts();
$total_categories = $obj->getTotalCategories();
$order = $obj->getTotalOrder();
?>

<!-- items list container -->
<div class="body-container">
    <div class="categories-section">
        <div class="admin-list">
            <div id="admin-d">
            <a href="admin_dashboard.php">
            <p id="admin-heading">Dashboard</p>
            </a>
            </div>
            <hr class="custom-line">
            <ul>
                <li><a href="customer_list.php">Customer</a></li>
                <li><a href="product_list.php">Product</a></li>
                <li><a href="categories_list.php">Categories</a></li>
                <li><a href="order_list.php">Order</a></li>
                <li><a href="ad_profile.php">Profile</a></li>
                <li><a href="ad_logout.php">Logout</a></li>
              
            </ul>
        </div>
    </div>
    <div class="image-section">
        <div class="item-container">
            
            <a href="customer_list.php" class="admin-items">
                <div class="min-container">
                    <span id="no"><?php echo $total_customer?></span>
                    <p id="min-text">Manage Customer</p>
                </div>
            </a>

            <a href="product_list.php" class="admin-items">
                <div class="min-container">
                <span id="no"><?php echo $total; ?></span>
                    <p id="min-text">ManageProduct</p>
                </div>
            </a>

            <a href="categories_list.php" class="admin-items">
                <div class="min-container">
                    <span id="no"><?php echo $total_categories?></span>
                    <p id="min-text"> Manage Categories</p>
                </div>
            </a>

            <a href="order_list.php" class="admin-items">
                <div class="min-container">
                    <span id="no"><?php echo $order?></span>
                    <p id="min-text">Order Management</p>
                </div>
            </a>

            
        </div>


        <marquee behavior="scroll" direction="left" >
            Welcome to Dokan Admin Dashboard! Manage your drone and gadget store effortlessly. Empower your e-commerce business with ease!
            </marquee>
            

        </div>
    </div>
</div>
</body>
</html>