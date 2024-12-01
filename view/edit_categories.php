<?php 
session_start();
include "admin_navbar.php";
include "../database/dbcon.php";

if (isset($_GET['id'])):
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_categories WHERE id = $id";
    $result = mysqli_query($conn, $query);

   while($record=mysqli_fetch_assoc($result)):
    $c_name = isset($record['c_name'])? $record['c_name']: '';
?>
    <div class="admin-product-form-container">
        <h1 class="admin-product-form-header">Edit Categories</h1>
        <form class="admin-product-form" action="../controller/update_categories_controller.php" method="POST">
            <input type="hidden" value="<?php echo htmlspecialchars($id); ?>" name="id">
            <div class="admin-product-form-group">
                <label class="admin-product-form-label">Categories Name:</label>
                <input type="text" name="c_name" id="c_name" class="admin-product-form-input" value="<?php echo $c_name; ?>">
            </div>
            <div class="admin-product-form-group admin-product-form-buttons">
                <button type="button" class="admin-product-form-button admin-product-form-previous" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="admin-product-form-button admin-product-form-submit" name="submit">Update Categories</button>
            </div>
        </form>
    </div>
    <?php endwhile;
   else:
    header("location: edit_categories.php");
   endif;
   ?>

