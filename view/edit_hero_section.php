<?php
include "admin_navbar.php";
include "../model/hero_model.php";



if (isset($_GET['id'])):
    $main_id = $_GET['id'];
    $sql = "SELECT * FROM hero_section WHERE id=$main_id";
    $res = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($res)): 
        $title = isset($row['main_title']) ? $row['main_title'] : '';
        $description = isset($row['description']) ? $row['description'] : '';
        $image_path = isset($row['image_path']) ? $row['image_path'] : '';
    ?>
        <div class="admin-product-form-container">
            <h1 class="admin-product-form-header">Edit Product</h1>
            <form class="admin-product-form" action="../controller/hero_section_controller.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $main_id; ?>">
            <input type="hidden" name="current_image" value="<?php echo $image_path; ?>">
                
                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Main title:</label>
                    <input type="text" name="m_title" id="name" value="<?php echo $title; ?>" class="admin-product-form-input">
                </div>

                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Description:</label>
                    <textarea name="description" id="description" class="admin-product-form-textarea" rows="4"><?php echo $description; ?></textarea>
                </div>
                
                
                <div class="admin-product-form-group">
                    <label class="admin-product-form-label">Image:</label>
                    <?php if ($image_path): ?>
                        <img src="<?php echo $image_path; ?>" alt="Product Image" class="product-image-preview" style="width: 200px; height: 200px; object-fit: cover;" />
                        <br>
                    <?php endif; ?>
                    <input type="file" name="image" id="image" class="admin-product-form-input-file" accept="image/*">
                    <small>Upload a new image to replace the current one.</small>
                </div>

                <div class="admin-product-form-group admin-product-form-buttons">
                    <button type="button" class="admin-product-form-button admin-product-form-previous" onclick="window.history.back()">Cancel</button>
                    <button type="submit" name="update" class="admin-product-form-button admin-product-form-submit">Update</button>
                </div>
            </form>
        </div>
    <?php endwhile;
else:
    header("location: edit_hero_section.php");
endif;
?>
