<?php
include "admin_navbar.php";
include "../model/hero_model.php";
$sql = "SELECT id,main_title,description,image_path FROM hero_section";
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
                    <li><a href="">Hero Section</a></li>
                    <li><a href="ad_logout.php">Logout</a></li>
                </ul>
            </div>
        </div>


        <!-- add new product button -->
        <div class="admin-product-tbl-container">
        <div class="tbl-top-container">
        <div class="new-prodcut-contaier">
            <a href="add_hero_section.php">Add main section</a>
            </div>
            <div class="all-products">
                Hero Section Content
            </div>
        </div>
<!-- scrollable tabel -->
            <div class="scrollable-table">
        <table>
            <thead>
                <tr>
                   
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                    <td><?php echo $row['main_title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <div class="tbl-img-container">
                            <img src="<?php echo $row['image_path']; ?>" alt="">
                        </div>
                    </td>
                    
                    <td id="action_col">
                        <a href="/dokan/view/edit_hero_section.php?id=<?php echo $row['id'];?>" id="product-edit">Edit</a>
                        <a href="/dokan/controller/hero_section_controller.php?id=<?php echo $row['id'];?>" id="product-delete">Delete</a>
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