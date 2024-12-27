<?php
include "../view/customer_navbar.php";
include "../model/dbcon.php"; 

if (!isset($_SESSION['user_login'])) {
    header("Location: login.php");
}

$customer_id = $_SESSION['user_login'];
$sql = "SELECT o.id, p.name AS product_name, o.quantity, o.status, o.order_at 
        FROM tbl_order o
        JOIN tbl_product p ON o.product_id = p.id
        WHERE o.customer_id = $customer_id";

$res = mysqli_query($conn, $sql);
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
    <h1>Your Order Status</h1>
    <div class="c-item-container">
    <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($res)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>
                            <?php
                            switch ($row['status']) {
                                case 'pending':
                                    echo '<span class="status-pending">Pending</span>';
                                    break;
                                case 'transporting':
                                    echo '<span class="status-transporting">Transporting</span>';
                                    break;
                                case 'delete':
                                    echo '<span class="status-canceled">Canceled</span>';
                                    break;
                                case 'completed':
                                    echo '<span class="status-completed">Completed</span>';
                                    break;
                                default:
                                    echo '<span class="status-unknown">Unknown</span>';
                            }
                            ?>
                        </td>
                        <td><?php echo date("d M Y, H:i", strtotime($row['order_at'])); ?></td>
                    </tr>
                <?php endwhile; ?>

                <!-- Display a message if there are no orders -->
                <?php if (mysqli_num_rows($res) === 0): ?>
                    <tr>
                        <td colspan="5">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
 
    </div>
</div>

</div>
</body>
</html>
