<?php
include "admin_navbar.php";
include "../model/admin_model.php";

if (!isset($_SESSION['admin_login'])) {
    header("Location: login_admin.php");
}

// Update the SQL query to include join
$sql = "SELECT o.id, c.fullname AS customer_name, p.name AS product_name, o.quantity, o.order_method, o.region, o.city, o.street, o.phone, o.status, o.order_at
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
                <li><a href="hero_section.php">Hero Section</a></li>
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
                        <th>Qty</th>
                        <th>Payment Method</th>
                        <th>Region</th>
                        <th>City</th>
                        <th>Street</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Change <br>Status</th>
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
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <form action="../controller/order_controller.php" method="POST">
                                <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                <select name="status" class="select-order-status">
                                    <option value="pending" <?php echo $row['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="transporting" <?php echo $row['status'] == 'transporting' ? 'selected' : ''; ?>>Transporting</option>
                                    <option value="delete" <?php echo $row['status'] == 'delete' ? 'selected' : ''; ?>>Delete</option>
                                    <option value="completed" <?php echo $row['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                </select>
                                <button type="submit" name="submit-status">Update</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
