<?php
session_start();
include "../database/dbcon.php";
$sql = "SELECT product_id,name,image_path,price FROM tbl_product";
$res = mysqli_query($conn, $sql);

include "admin_navbar.php";?>
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
                    <li><a href="#">Product</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Order</a></li>
                    <li><a href="#">Setting</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
            </div>
        </div>


        <!-- add new product button -->
        <div class="admin-product-tbl-container">
        <div class="tbl-top-container">
        <div class="new-prodcut-contaier">
            <a href="add_new_product.php">Add new product</a>
            </div>
            <div class="all-products">
                All Products
            </div>
        </div>
<!-- scrollable tabel -->
            <div class="scrollable-table">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <div class="tbl-img-container">
                            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['name']; ?>">
                        </div>
                    </td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                        <a href="" id="product-edit">Edit</a>
                        <a href="/dokan/controller/delete_product_controller.php?id=<?php echo $row['product_id'];?>" id="product-delete">Delete</a>
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