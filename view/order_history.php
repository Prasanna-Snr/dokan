<?php
include "../view/customer_navbar.php";
include "../model/dbcon.php"; 

if (!isset($_SESSION['user_login'])) {
    header("Location: login.php");
}

$customerId = (int)$_SESSION['user_login']; 
$query = "SELECT tbl_order.product_name, tbl_order.quantity, tbl_order.order_at, tbl_product.image_path 
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
                <li><a href="customer_dashboard.php">Your Order</a></li>
                <li><a href="order_history.php">History</a></li>
                <li><a href="order_status.php">Order Status</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Setting</a></li>
                <li><a href="../view/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- order list -->
    <div class="c-image-section">
    <p id="first-product">Order History</p>
    <div class="c-item-container">
     
                <table>
                   <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Order date</th>
                    </tr>
                   </thead>
                   <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $productName = $row['product_name'];
                            $productImage = $row['image_path'];
                            $quantity = $row['quantity'];
                            $orderDate = $row['order_at'];

                            // Display each product's data in a new row
                            echo '<tr>';
                            echo '<td><img src="' . $productImage . '" alt="Product Image" width="50" height="50"></td>';
                            echo '<td>' . $productName . '</td>';
                            echo '<td>' . $quantity . '</td>';
                            echo '<td>' . date('Y-m-d', strtotime($orderDate)) . '</td>'; // Format order date
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">No orders found.</td></tr>';
                    }
                    ?>
                   <thead>
                    <tr>
                        
                    </tr>
                   </thead>
                </table>
  
    </div>
</div>

</div>
</body>
</html>
