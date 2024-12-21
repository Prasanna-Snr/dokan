<?php
include "admin_navbar.php";
include "../model/admin_model.php";

if (!isset($_SESSION['admin_login'])) {
    header("Location: login_admin.php");
}

// Update the SQL query to include join
$sql = "SELECT o.id, c.fullname AS customer_name, p.name AS product_name, o.quantity, o.order_method, o.region, o.city, o.street, o.phone, o.order_at
        FROM tbl_order o
        JOIN tbl_customer c ON o.customer_id = c.id
        JOIN tbl_product p ON o.product_id = p.id";
$res = mysqli_query($conn, $sql);

?>
<!-- items list container -->
<div class="product-manage-container">
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

    <!-- add new product button -->
    <div class="admin-product-tbl-container">
        <div class="tbl-top-container">
            <div class="all-products">
                All Order List
            </div>
        </div>
        <!-- scrollable table -->
        <div class="scrollable-table">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Payment Method</th>
                        <th>Region</th>
                        <th>City</th>
                        <th>Street</th>
                        <th>Phone</th>
                        <th>Order Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($res)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['order_method']; ?></td>
                        <td><?php echo $row['region']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['street']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['order_at']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
