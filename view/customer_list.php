<?php
include "admin_navbar.php";
include "../model/admin_model.php";

if (!isset($_SESSION['admin_login'])) {
    header("Location: login_admin.php");
}

$sql = "SELECT id,fullname,username,email FROM tbl_customer";
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
                    <li><a href="#">Customer</a></li>
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
        <!-- <div class="new-prodcut-contaier">
            <a href="add_new_product.php">Add new product</a>
            </div> -->
            <div class="all-products">
                All Customer
            </div>
        </div>
<!-- scrollable tabel -->
            <div class="scrollable-table">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                        <a href="/dokan/controller/customer_controller.php?id=<?php echo $row['id'];?>" id="product-delete">Remove</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
        </div>

        
    </div>
    </div>
</body>

</html>