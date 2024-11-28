<?php
session_start();
include "../database/dbcon.php";
$sql = "SELECT product_id,name,image_path,price FROM tbl_product";
$res = mysqli_query($conn, $sql);

include "admin_navbar.php";?>
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
                    <li><a href="#">Customer</a></li>
                    <li><a href="#">Product</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Order</a></li>
                    <li><a href="#">Setting</a></li>
                    <li><a href="#">Profile</a></li>

                </ul>
            </div>
        </div>

        <div class="image-section">
            <a href="add_new_product.php" class="new-product">
                <div class="new-prodcut-contaier">
                    Add new product
                </div>
            </a>
<!-- table of product -->
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

                <!-- body -->
               
                <tbody>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                    <pre><?php //print_r($row); ?></pre>
                <tr>
                    <td><?php echo $row['product_id'];?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['name']; ?>" style="width: 100px; height: auto;"></td>
                    <td><?php echo $row['price'];?></td>
                    <td>
                    <a href="" id="product-edit">Edit</a>
                    <a href="" id="product-delete">Delete</a>
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