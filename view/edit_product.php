<?php
session_start();
include "admin_navbar.php";
include "../database/dbcon.php";

if (isset($_GET['id'])):
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM tbl_product WHERE product_id=$product_id";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($res)): 
        $name = isset($row['name']) ? $row['name'] : '';
        $categories = isset($row['categories']) ? $row['categories'] : '';
        $image_path = isset($row['image_path']) ? $row['image_path'] : '';
        $description = isset($row['description']) ? $row['description'] : '';
        $price = isset($row['price']) ? $row['price'] : '';
        $offer = isset($row['offer']) ? $row['offer'] : '';
        $discount = isset($row['discount']) ? $row['discount'] : '';
    ?>
        <div class="admin-product-form-container">
            <h1 class="admin-product-form-header">Edit Product</h1>
            <form class="admin-product-form" action="../controller/update_controller.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $product_id; ?>" name="id">
                
                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Product Name:</label>
                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" class="admin-product-form-input" required>
                </div>
                
                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Categories:</label>
                    <select name="categories" id="categories" class="admin-product-form-select" required>
                        <option value="" disabled>Select a category</option>
                        <option value="electronics" <?php echo ($categories == 'electronics') ? 'selected' : ''; ?>>Electronics</option>
                        <option value="fashion" <?php echo ($categories == 'fashion') ? 'selected' : ''; ?>>Fashion</option>
                        <option value="home" <?php echo ($categories == 'home') ? 'selected' : ''; ?>>Home and Furniture</option>
                        <option value="beauty" <?php echo ($categories == 'beauty') ? 'selected' : ''; ?>>Beauty and Personal Care</option>
                        <option value="drones" <?php echo ($categories == 'drones') ? 'selected' : ''; ?>>Drones</option>
                    </select>
                </div>
                
                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Product Image:</label>
                    <?php if ($image_path): ?>
                        <!-- Display image with fixed dimensions -->
                        <img src="<?php echo $image_path; ?>" alt="Product Image" class="product-image-preview" style="width: 200px; height: 200px; object-fit: cover;" />
                        <br>
                    <?php endif; ?>
                    <input type="file" name="image" id="image" class="admin-product-form-input-file" accept="image/*">
                    <small>Upload a new image to replace the current one.</small>
                </div>
                
                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Description:</label>
                    <textarea name="description" id="description" class="admin-product-form-textarea" rows="4" required><?php echo $description; ?></textarea>
                </div>
                
                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Price:</label>
                    <input type="number" name="price-input" id="price-input" value="<?php echo $price; ?>" class="admin-product-form-input" required>
                </div>
                
                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Offer:</label>
                    <input type="text" name="offer" id="offer" value="<?php echo $offer; ?>" class="admin-product-form-input">
                </div>
                
                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Discount (%):</label>
                    <input type="number" name="discount" id="discount" value="<?php echo $discount; ?>" class="admin-product-form-input" min="0" max="100">
                </div>
                
                <div class="admin-product-form-group admin-product-form-buttons">
                    <button type="button" class="admin-product-form-button admin-product-form-previous" onclick="window.history.back()">Cancel</button>
                    <button type="submit" name="submit" class="admin-product-form-button admin-product-form-submit">Update Product</button>
                </div>
            </form>
        </div>
    <?php endwhile;
else:
    header("location: edit_product.php");
endif;
?>
